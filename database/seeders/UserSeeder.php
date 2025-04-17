<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

use Spatie\Permission\Models\Role;




class UserSeeder extends Seeder
{
    public function run()
    {

        Role::create(['name' => 'admin']);


        $user = User::find(1);
        $user->assignRole('admin');
    }
}
