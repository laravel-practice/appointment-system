<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AppointmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Appointment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $startDate = now()->startOfYear();
        $endDate = now()->endOfYear();
        $randomDate = $this->faker->dateTimeBetween($startDate, $endDate);
        return [
            'title' => $this->faker->sentence,
            'user_id' => \App\Models\User::factory(),
            'appointment_date' => $randomDate,
            'appointment_time' => $this->faker->time('H:i'),
            'description' => $this->faker->paragraph,
        ];
    }
}
