<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        // \App\Models\User::factory(10)->create();

        User::factory()->create( [
            'name'     => 'Super Admin',
            'email'    => 'admin@retinasoft.com',
            'salary'   => fake()->numberBetween( 20000, 50000 ),
            'address'  => fake()->address(),
            'phone'    => fake()->phoneNumber(),
            'password' => bcrypt( 'password' ),
            'photo'    => 'undraw_profile.svg',
            'status'   => 1,
            'is_admin' => 1,
        ] );
    }
}
