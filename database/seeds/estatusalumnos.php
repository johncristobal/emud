<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\estatusalumnos;

class estatusalumnos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*estatusalumnos::create([
            'valor' =>	'A',
            'descripcion'=>'Alumno activo',
        ]);*/
        
        DB::table('estatusalumnos')->insert([
            'valor' => 'A',
            'descripcion'=>'Alumno activo'
        ]);
    }
}
