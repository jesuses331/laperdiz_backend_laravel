<?php

namespace Database\Factories;

use App\Models\Denuncia;
use Illuminate\Database\Eloquent\Factories\Factory;

class DenunciaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Denuncia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fecha'=>$this->faker->date(),
            'titulo'=> $this->faker->title(),
            'ciudad'=>$this->faker->city(),
            'descripcion' =>$this->faker->text()
        ];
    }
}
