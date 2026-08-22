<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Branch;
use App\Models\BranchSignboard;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    protected Admin $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->admin = Admin::create([
            'name' => 'Admin User',
            'email' => 'admin@saurashtranagrik.test',
            'password' => 'secret123',
        ]);
    }

    public function test_admin_login_page_renders_alerts_and_auto_dismiss_script(): void
    {
        $response = $this->withSession(['error' => 'Invalid attempt'])
            ->get(route('admin.login'));

        $response->assertStatus(200);
        $response->assertSee('alert alert-err');
        $response->assertSee('Invalid attempt');
        $response->assertSee('setTimeout(function () {', false);
        $response->assertSee('5000', false);
    }

    public function test_admin_layout_renders_flash_messages_and_auto_dismiss_script(): void
    {
        $response = $this->actingAs($this->admin, 'admin')
            ->withSession(['status' => 'Operation successful!'])
            ->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertSee('alert alert-ok');
        $response->assertSee('Operation successful!');
        $response->assertSee('setTimeout(function () {', false);
        $response->assertSee('5000', false);
    }

    public function test_branch_signboard_form_renders_small_building_photo_field_and_preview_elements(): void
    {
        $branch = Branch::create([
            'name' => 'Amreli Branch',
            'slug' => 'amreli-branch',
            'color_class' => 'c1',
            'sort_order' => 1,
            'is_active' => true,
        ]);

        $response = $this->actingAs($this->admin, 'admin')
            ->get(route('admin.branch-signboards.create'));

        $response->assertStatus(200);
        $response->assertSee('Building photo');
        $response->assertSee('field-small');
        $response->assertSee('input-small');
        $response->assertSee('previewUploadImage', false);
        $response->assertSee('name="building_photo"', false);
    }

    public function test_branch_signboard_can_be_created_and_updated(): void
    {
        $branch = Branch::create([
            'name' => 'Rajkot Branch',
            'slug' => 'rajkot-branch',
            'color_class' => 'c2',
            'sort_order' => 2,
            'is_active' => true,
        ]);

        $createResponse = $this->actingAs($this->admin, 'admin')
            ->post(route('admin.branch-signboards.store'), [
                'branch_id' => $branch->id,
                'established_year' => '2010',
                'about_text' => "Line 1\nLine 2",
                'is_active' => '1',
            ]);

        $createResponse->assertRedirect(route('admin.branch-signboards.index'));
        $createResponse->assertSessionHas('status', 'Branch signboard created.');

        $signboard = BranchSignboard::where('branch_id', $branch->id)->first();
        $this->assertNotNull($signboard);
        $this->assertSame('2010', $signboard->established_year);
    }

    public function test_updating_branch_signboard_image_deletes_old_file(): void
    {
        $branch = Branch::create([
            'name' => 'Bhavnagar Branch',
            'slug' => 'bhavnagar-branch',
            'color_class' => 'c3',
            'sort_order' => 3,
            'is_active' => true,
        ]);

        $firstImage = UploadedFile::fake()->image('old_building.jpg', 600, 400);

        $this->actingAs($this->admin, 'admin')
            ->post(route('admin.branch-signboards.store'), [
                'branch_id' => $branch->id,
                'established_year' => '2015',
                'building_photo' => $firstImage,
                'is_active' => '1',
            ]);

        $signboard = BranchSignboard::where('branch_id', $branch->id)->first();
        $this->assertNotNull($signboard);
        $oldFilePath = public_path($signboard->building_photo);
        $this->assertFileExists($oldFilePath);

        // Update with new image
        $newImage = UploadedFile::fake()->image('new_building.jpg', 600, 400);

        $this->actingAs($this->admin, 'admin')
            ->put(route('admin.branch-signboards.update', $signboard->id), [
                'branch_id' => $branch->id,
                'established_year' => '2015',
                'building_photo' => $newImage,
                'is_active' => '1',
            ]);

        $signboard->refresh();
        $newFilePath = public_path($signboard->building_photo);

        // Old file should be deleted, new file should exist
        $this->assertFileDoesNotExist($oldFilePath);
        $this->assertFileExists($newFilePath);

        // Delete signboard -> new file should be deleted too
        $this->actingAs($this->admin, 'admin')
            ->delete(route('admin.branch-signboards.destroy', $signboard->id));

        $this->assertFileDoesNotExist($newFilePath);
    }

    public function test_dashboard_renders_hero_stats_and_modules_properly(): void
    {
        $response = $this->actingAs($this->admin, 'admin')
            ->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertSee('Hero Gallery');
        $response->assertSee('Branch Signboards');
        $response->assertSee('Board of Directors');
        $response->assertSee('Module Status &amp; Recent Activity', false);
    }
}
