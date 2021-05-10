<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empleados')->insert(array(
            'nombre'        => 'Cristian Josué',
            'apellido'      => 'Chávez Villagrán',
            'empresa_id'    => '1',
            'email'         => 'admin@admin.com',
            'telefono'       => '58438895',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s')
        ));
    }
}
