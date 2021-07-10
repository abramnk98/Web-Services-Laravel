<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $users = \App\Models\Employee::select('id')->get()->toArray();
        static $counter = 0;

        return [
            'facebook_url' => 'facebook/id/' . $this->faker->randomNumber(9),
            'twitter_url' => 'twitter/id/' . $this->faker->randomNumber(9),
            'instagram_url' => 'instagram/id/' . $this->faker->randomNumber(9),
            'employee_id' => $users[$counter++]['id'],
        ];
    }
}
