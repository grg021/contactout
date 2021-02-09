<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create([
             'password' => bcrypt('Asdf123$')
         ]);
         \App\Models\Product::factory(10)->create();
    }
}
