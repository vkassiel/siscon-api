<?php

namespace Database\Factories;

use Illuminate\Support\Str;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = array('Masculino', 'Feminino', 'Não especificado');
        $status = array('Ativa', 'Inativa');
        
        $schooling = array(
            'Ensino Fundamental Incompleto',
            'Ensino Fundamental Completo',
            'Ensino Médio Incompleto',
            'Ensino Médio Completo',
            'Ensino Superior Incompleto',
            'Ensino Superior Completo',
            'Pós-graduado'
        );

        $profession = array('Atendente', 'Médico', 'Zelador');
        
        
        return [
            'name' => $this->faker->name,
            'cpf' => rand(11111111111, 99999999999),
            'birthDate' => $this->faker->dateTime($max = 'now', $timezone = null),
            'nationality' => $this->faker->country,
            'schooling' => $schooling[array_rand($schooling)],
            'profession' => $profession[array_rand($profession)],
            'gender' => $gender[array_rand($gender)],
            'status' => $status[array_rand($status)],
            'phone' => $this->faker->e164PhoneNumber,
            'email' => $this->faker->unique()->safeEmail,

            'cep' => $this->faker->postcode,
            'street' => $this->faker->streetName,
            'number' => $this->faker->buildingNumber,
            'district' => $this->faker->citySuffix,
            'country' => $this->faker->state,
            'city' => $this->faker->city,
            'complement' => $this->faker->streetSuffix,

        ];
    }
}
