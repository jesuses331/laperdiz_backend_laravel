<?php

namespace Database\Seeders;

use App\Models\Denuncia;
use App\Models\Denuncias;
use App\Models\Etapa;
use App\Models\Mascota;
use App\Models\Noticia;
use App\Models\Noticias;
use App\Models\Talla;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        

        /*********TALLAS****/

        $talla1 = new Talla();
        $talla1->nombre = "pequeña";
        $talla1->save();

        $talla2 = new Talla();
        $talla2->nombre = "mediana";
        $talla2->save();

        $talla3 = new Talla();
        $talla3->nombre = "grande";
        $talla3->save();

        /************Razas*********** */

        \App\Models\Raza::factory(10)->create();

        /*************ETAPAS****** */

        $etapa1 = new Etapa();
        $etapa1->nombre = 'Cachorro Lactante' ;
        $etapa1->save();

        $etapa2 = new Etapa();
        $etapa2->nombre = 'Cachorro' ;
        $etapa2->save();

        $etapa3 = new Etapa();
        $etapa3->nombre = 'Cachorro Adolescente' ;
        $etapa3->save();

        $etapa4 = new Etapa();
        $etapa4->nombre = 'Perro Adulto' ;
        $etapa4->save();

        $etapa5 = new Etapa();
        $etapa5->nombre = 'Perro Senior' ;
        $etapa5->save();

        /*************MASCOTA*********** */
        Mascota::factory(10)->create();
        
        /***************Denuncias************ */
        Denuncia::factory(10)->create();

         /***************Noticias************ */
         Noticia::factory(10)->create();
    }
}
