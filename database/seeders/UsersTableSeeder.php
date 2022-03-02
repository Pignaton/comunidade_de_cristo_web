<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acesso')->insert([
            'cod_integrante' => 1,
            'nome' => 'Kaleb Pignaton',
            'usuario' => 'kpignaton',
            'email' => 'admin@material.com',
            'senha' => Hash::make('123'),
            'nivel' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
