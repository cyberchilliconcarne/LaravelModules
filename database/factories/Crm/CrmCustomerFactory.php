<?php

namespace Database\Factories\Crm;

use App\Models\Crm\CrmCustomer;
use App\Models\Crm\CrmStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class CrmCustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CrmCustomer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'skype' => $this->faker->email,
            'website' => $this->faker->domainName,
            'description' => $this->faker->paragraph,
            'status_id' => CrmStatus::all()->random() ?? CrmStatus::factory()->create(),
        ];
    }
}
