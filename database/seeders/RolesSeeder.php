<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = new Role();
        $user->role = 'Administrador';
        $user->save();
        $user = new Role();
        $user->role = 'Estudiantes';
        $user->save();

    }
}
