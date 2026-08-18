<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * One optional signboard per branch: the poster-style "about / financial
     * summary / board / management / staff" block shown on that branch's
     * detail page. A branch with no row here just shows the generic
     * loan/deposit rate sections instead.
     */
    public function up(): void
    {
        Schema::create('branch_signboards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->unique()->constrained()->cascadeOnDelete();
            $table->string('established_year')->nullable();
            $table->string('building_photo')->nullable();
            $table->json('financial_summary')->nullable();
            $table->json('about')->nullable();
            $table->json('board_members')->nullable();
            $table->json('management')->nullable();
            $table->json('supporting_employees')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->index(['is_active', 'sort_order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('branch_signboards');
    }
};
