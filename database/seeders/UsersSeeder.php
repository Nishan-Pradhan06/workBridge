<?php

namespace Database\Seeders;

use App\Models\JobPost;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $users= new User();
        // $users->name = 'admin';
        // $users->email ='admin@gmail.com';
        // $users->password = bcrypt('admin123');
        // $users->phone = '1234567890';
        // $users->role = 'admin';
        // $users->save();

        //<----------------ADMIN SEEDER--------------->

        // $faker = Faker::create();
        // for ($i = 1; $i <= 100; $i++) {
        //     $users = new User();
        //     $users->name = $faker->name;
        //     $users->email = $faker->email;
        //     $users->password  = bcrypt($faker->password);
        //     $users->phone = $faker->phoneNumber;
        //     $users->role = 'freelancer';
        //     $users->save();
        // }

        // php artisan db:seed   

        //<----------------JOB POST SEEDER--------------->
        // $faker = Faker::create();

        // // Generate 100 job posts
        // for ($i = 1; $i <= 10; $i++) {
        //     // Get a random user ID for the client (ensuring clients exist)
        //     $user = User::where('role', 'client')->inRandomOrder()->first();

        //     JobPost::create([
        //         'client_id' => $user ? $user->id : 1, // Default to client 1 if no users found
        //         'title' => $faker->sentence,
        //         'description' => $faker->paragraph,
        //         'budget' => $faker->randomFloat(2, 50, 5000),
        //         'skills' => implode(', ', $faker->words(3)), // Random skills, can be adjusted as needed
        //         'deadline' => $faker->date,
        //     ]);
        // }

        //<----------------USER SEEDER--------------->
        // $faker = Faker::create();
        // for ($i = 1; $i <= 10; $i++) {
        //     $users = new User();
        //     $users->name = $faker->name;
        //     $users->email = $faker->email;
        //     $users->password  = bcrypt($faker->password);
        //     $users->phone = $faker->phoneNumber;
        //     $users->role = 'freelancer';
        //     $users->save();
        // }
    }
}
