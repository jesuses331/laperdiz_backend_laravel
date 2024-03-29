<?php

namespace Database\Factories;

use App\Models\Noticia;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoticiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Noticia::class;

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
            'descripcion' =>$this->faker->text(),
            'autor' =>$this->faker->name()
        ];
    }
}
