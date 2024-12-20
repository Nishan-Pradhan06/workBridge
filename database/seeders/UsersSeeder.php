<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users= new User();
        $users->name = 'admin';
        $users->email ='admin@gmail.com';
        $users->password = bcrypt('admin123');
        $users->phone = '1234567890';
        $users->role = 'admin';
        $users->save();
    }
}
