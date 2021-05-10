<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert(array(
            'nombre'    => 'CacaoGT',
            'email'     => 'CacaoGt.com',
            'logo'      => 'Cacao',
            'website'   => 'Cacao.gt',
            'direccion'   => 'Quetzaltenango, Guatemala',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ));
    }
}
