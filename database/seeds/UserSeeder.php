<?php

use Illuminate\Database\Seeder;
use App\Article;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::create([
           'cuerpo' => 'Este es el cuerpo' 
        ]);
        
    }
}
