<?php

namespace Database\Factories;

use App\Models\Etapa;
use App\Models\Mascota;
use App\Models\Raza;
use App\Models\Talla;
use Illuminate\Database\Eloquent\Factories\Factory;

class MascotaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mascota::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->name(),
            'detalle'=> $this->faker->text(),
            'etapa_id'=>Etapa::all()->random()->id,
            'raza_id' =>Raza::all()->random()->id
        ];
    }
}
