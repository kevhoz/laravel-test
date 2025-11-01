<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Super Admin
        User::create([
            'name' => 'Super Admin',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('1234'), // GANTI PASSWORD INI
            'role' => 'admin'
        ]);

        // 2. (Opsional) Buat user manager
        User::create([
            'name' => 'Manager A',
            'username' => 'manager.a',
            'email' => 'manager@example.com',
            'password' => Hash::make('manager123'),
            'role' => 'manager'
        ]);

        // 3. (Opsional) Buat user staff
        User::create([
            'name' => 'Staff B',
            'username' => 'staff.b',
            'email' => 'staff@example.com',
            'password' => Hash::make('staff123'),
            'role' => 'staff'
        ]);
    }
}
