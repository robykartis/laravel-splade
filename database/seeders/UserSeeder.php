<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(150)->create();
        $role = Role::create(['name' => 'su']);
        $super_admin = User::create([
            'name' => 'Anu',
            'email' => 'anu@email.com',
            'password' => Hash::make('1234')
        ]);
        $super_admin->assignRole($role);
    }
}
