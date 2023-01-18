<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Player;
use App\Models\Position;
use App\Models\Sport;
use App\Models\Team;
use App\Models\Trainer;
use App\Models\User;
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

      $this->call([
        RoleSeeder::class,
        AdminSeeder::class,
      ]);

      User::factory(10)->create()->each(function ($user) {
        $user->assignRole('trainer');
      });
      Sport::factory(3)->create();
      Position::factory(3)->create();
      Trainer::factory(3)->create();
      Team::factory(3)->create();
      Player::factory(3)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
