<?php

namespace Database\Seeders;

use App\Models\Usuari;
use Illuminate\Database\Seeder;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 3; $i++) {
            $usuari = new Usuari();
            $usuari->login = "usuari" . $i;
            $usuari->password = bcrypt("usuari" . $i);
            $usuari->save();
        }
    }
}
