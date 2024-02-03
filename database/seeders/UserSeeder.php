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
        $role_su = Role::create(['name' => 'su']);
        $role_admin = Role::create(['name' => 'admin']);
        $role_user = Role::create(['name' => 'user']);
        $super_admin = User::create([
            'name' => 'Anu',
            'email' => 'anu@email.com',
            'pengguna' => 'su',
            'password' => Hash::make('1234')
        ]);
        $super_admin->assignRole($role_su);
        $admin = User::create([
            'name' => 'Putri Yuli Armiyanti',
            'email' => 'putri@email.com',
            'pengguna' => 'admin',
            'password' => Hash::make('1234')
        ]);
        $admin->assignRole($role_admin);
        $user = User::create([
            'name' => 'Alyona Putri Bupar',
            'email' => 'alyona@email.com',
            'pengguna' => 'user',
            'password' => Hash::make('1234')
        ]);
        $user->assignRole($role_user);
    }
}
