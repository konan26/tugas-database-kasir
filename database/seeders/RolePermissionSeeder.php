<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Buat role
        $adminRole  = Role::create(['name' => 'admin']);
        $kasirRole  = Role::create(['name' => 'kasir']);

        // (Opsional) Buat beberapa permission dasar
        // Permission::create(['name' => 'manage products']);
        // Permission::create(['name' => 'manage sales']);
        // dst…

        // Buat user admin pertama (bisa login langsung)
        $admin = User::create([
            'name'     => 'Admin Kasir',
            'email'    => 'admin@kasir.com',
            'password' => Hash::make('password123'), // ganti kalau mau password lain
        ]);

        // Berikan role admin
        $admin->assignRole('admin');

        // (Opsional) Buat user kasir contoh
        $kasir = User::create([
            'name'     => 'Kasir 1',
            'email'    => 'kasir@kasir.com',
            'password' => Hash::make('password123'),
        ]);

        $kasir->assignRole('kasir');

        // Tampilkan pesan sukses di terminal (biar tahu berhasil)
        $this->command->info('Role & User berhasil dibuat!');
        $this->command->info('Login Admin  → email: admin@kasir.com  | pass: password123');
        $this->command->info('Login Kasir  → email: kasir@kasir.com  | pass: password123');
    }
}