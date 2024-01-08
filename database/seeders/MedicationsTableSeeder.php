<?php

namespace Database\Seeders;

use App\Models\Medication;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class MedicationsTableSeeder extends Seeder
{
    public function run()
    {
        $medications = [
            [
                'id'            => 1,
                'name'          => 'Aspirin',
                'description'   => 'Used as a pain reliever, anti-inflammatory, and to reduce fever.',
                'dosage'        => '81mg, 325mg',
                'frequency'     => 'Once daily',
                'instructions'  => 'Take with food.',
                'user_id'       => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'id'            => 2,
                'name'          => 'Ibuprofen',
                'description'   => 'An over-the-counter nonsteroidal anti-inflammatory drug (NSAID) used to relieve pain, reduce inflammation, and lower fever.',
                'dosage'        => '200mg, 400mg, 600mg, 800mg',
                'frequency'     => 'Every 4 to 6 hours as needed',
                'instructions'  => 'Take with a full glass of water.',
                'user_id'       => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'id'            => 3,
                'name'          => 'Acetaminophen (Paracetamol)',
                'description'   => 'A common pain reliever and fever reducer.',
                'dosage'        => '500mg, 650mg, 1000mg',
                'frequency'     => 'Every 4 to 6 hours as needed',
                'instructions'  => 'Do not exceed recommended dosage. Avoid alcohol.',
                'user_id'       => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'id'            => 4,
                'name'          => 'Amoxicillin',
                'description'   => 'An antibiotic used to treat bacterial infections.',
                'dosage'        => '250mg, 500mg, 875mg',
                'frequency'     => 'Every 8 or 12 hours',
                'instructions'  => 'Take with a full glass of water. Complete the full course as prescribed.',
                'user_id'       => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'id'            => 5,
                'name'          => 'Lisinopril',
                'description'   => 'An angiotensin-converting enzyme (ACE) inhibitor used to treat high blood pressure and heart failure.',
                'dosage'        => '2.5mg, 5mg, 10mg, 20mg, 40mg',
                'frequency'     => 'Once daily',
                'instructions'  => 'Take as directed by your healthcare provider.',
                'user_id'       => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'id'            => 6,
                'name'          => 'Lipitor (Atorvastatin)',
                'description'   => 'A statin drug used to lower cholesterol levels.',
                'dosage'        => '10mg, 20mg, 40mg, 80mg',
                'frequency'     => 'Once daily',
                'instructions'  => 'Take in the evening. Follow a cholesterol-lowering diet.',
                'user_id'       => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'id'            => 7,
                'name'          => 'Metformin',
                'description'   => 'An oral antidiabetic medication used to manage type 2 diabetes.',
                'dosage'        => '500mg, 850mg, 1000mg',
                'frequency'     => 'Twice daily with meals',
                'instructions'  => 'Take with food to reduce stomach upset.',
                'user_id'       => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'id'            => 8,
                'name'          => 'Albuterol',
                'description'   => 'A bronchodilator used to relieve bronchospasms in conditions like asthma and chronic obstructive pulmonary disease (COPD).',
                'dosage'        => '90mcg, 120mcg',
                'frequency'     => 'Every 4 to 6 hours as needed',
                'instructions'  => 'Use as directed for acute bronchospasm. Follow a maintenance schedule for chronic conditions.',
                'user_id'       => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'id'            => 9,
                'name'          => 'Omeprazole',
                'description'   => 'A proton pump inhibitor (PPI) used to reduce stomach acid production, often prescribed for acid reflux and peptic ulcers.',
                'dosage'        => '20mg, 40mg',
                'frequency'     => 'Once daily before a meal',
                'instructions'  => 'Swallow whole with a glass of water. Do not crush or chew.',
                'user_id'       => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'id'            => 10,
                'name'          => 'Levothyroxine',
                'description'   => 'A synthetic thyroid hormone used to treat hypothyroidism.',
                'dosage'        => '25mcg, 50mcg, 75mcg, 100mcg, 125mcg, 150mcg',
                'frequency'     => 'Once daily on an empty stomach',
                'instructions'  => 'Take in the morning at least 30 minutes before eating.',
                'user_id'       => 1,
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ];

        Medication::insert($medications);
    }
}