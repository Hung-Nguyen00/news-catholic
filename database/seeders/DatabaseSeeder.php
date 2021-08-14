<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Role;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Thành viên']);
        Role::create(['name' => 'Quản trị']);
         \App\Models\User::factory(10)->create();
            $this->call(CategorySeeder::class);
        $this->call(PostSeeder::class);
    }
}
