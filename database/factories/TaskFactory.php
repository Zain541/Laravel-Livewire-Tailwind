<?php

namespace Database\Factories;

use App\Models\Company;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $company = Company::first();
        return [
            'name' => fake()->name(),
            'company_id' => Company::all()->random()->id,
            'priority' => rand(1,10),
            'due' => Carbon::now()->addDays(rand(2,10)),
        ];
    }
}
