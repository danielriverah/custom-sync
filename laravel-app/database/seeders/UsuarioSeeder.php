<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password_hash' => 'password',
            'rol' => 'admin',
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);
    }
}
