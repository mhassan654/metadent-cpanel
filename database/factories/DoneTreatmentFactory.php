<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DoneTreatmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $treatment_statuses = array('Planned', 'Monitored', 'Treat');
        $random_invoice_ids = range(1, 300);
        shuffle($random_invoice_ids);
        $random_doctors = range(3, 10);
        shuffle($random_doctors);
        return [
            'facility_id' => 1,
            'visit_id' => mt_rand(1, 300),
            'patient_id' => mt_rand(1, 20),
            'payment_status' => mt_rand(0, 1),
            'treatment_complete' => mt_rand(0, 1),
            'doctors' => json_encode(array_slice($random_doctors, 0, 2)),
            'treatment_status' => $treatment_statuses[array_rand($treatment_statuses)],
            'tooth_sections' => null,
            'invoice_ids' => json_encode(array_slice($random_invoice_ids, 0, 2))
        ];
    }
}