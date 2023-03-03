<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'patient_id' => rand(1,10),
            'doctor_id' => rand(3,4),
            'status'=> rand(0,1),
            'invoice_type' => rand(0,1),
            'prices' => '35.5,56.9,100.5',
            'facility_id'=> 1,
            'balance_due' => 100.5,
            'paidamount' => 66.9,
            'service_type' => rand(1,3),
            'vat' => 18,
            'total_with_vat'=> 789.6,
            'services' => [78,78,90]
        ];
    }
}
