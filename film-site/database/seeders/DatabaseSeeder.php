<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();

        $this->call(ProductSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(ActorSeeder::class);
        $this->call(DirectorSeeder::class);
        $this->call(Actor_groupSeeder::class);
        $this->call(GenresSeeder::class);
        
    }

}
