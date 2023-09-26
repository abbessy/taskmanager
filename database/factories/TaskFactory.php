<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

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
    public function definition(): array
    {
        $statusArray = array(
            "to do",
            "in progress",
            "finished",
            "in problem"
        );

         $responsablesArray = array(
            "3",
            "8"
        );

         $agentsArray = array(
            "4",
            "5",
            "9"
        );

        // Generate a random index
        $randomIndex = array_rand($statusArray);

        $randomIndex2 = array_rand($responsablesArray);

        $randomIndex3 = array_rand($agentsArray);

        // Retrieve the random string
        $randomStatus = $statusArray[$randomIndex];

        $randomResponsable = $responsablesArray[$randomIndex2];

        $randomAgent = $agentsArray[$randomIndex3];

        return [
            'title' => fake()->text(15),
            'description' => fake()->text(50),
            'comment' => fake()->text(100),
            'status' => $randomStatus,
            'creation_time' => Carbon::now(),
            'limit_time' => "2023-10-10",
            'responsable_id' => $randomResponsable,
            'agent_id' => $randomAgent,
           
        ];
    }
}
