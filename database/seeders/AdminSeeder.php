<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * The panel has a single fixed operator. updateOrCreate keeps this
     * seeder safe to re-run without duplicating the account.
     *
     * The Admin model casts 'password' => 'hashed', so the value below is
     * bcrypt-hashed on assignment and never stored in plain text.
     */
    public function run(): void
    {
        Admin::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Administrator',
                'password' => 'admin123',
            ]
        );
    }
}
