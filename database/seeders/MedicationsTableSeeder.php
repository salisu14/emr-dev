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
                'id'    => 1,
                'name' => 'Aspirin',
                'description' => 'Used as a pain reliever, anti-inflammatory, and to reduce fever.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 2,
                'name' => 'Ibuprofen',
                'description' => 'An over-the-counter nonsteroidal anti-inflammatory drug (NSAID) used to relieve pain, reduce inflammation, and lower fever.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 3,
                'name' => 'Acetaminophen (Paracetamol)',
                'description' => 'A common pain reliever and fever reducer.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 4,
                'name' => 'Amoxicillin',
                'description' => 'An antibiotic used to treat bacterial infections.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 5,
                'name' => 'Lisinopril',
                'description' => 'An angiotensin-converting enzyme (ACE) inhibitor used to treat high blood pressure and heart failure.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 6,
                'name' => 'Lipitor (Atorvastatin)',
                'description' => 'A statin drug used to lower cholesterol levels.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 7,
                'name' => 'Metformin',
                'description' => 'An oral antidiabetic medication used to manage type 2 diabetes.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 8,
                'name' => 'Albuterol',
                'description' => 'A bronchodilator used to relieve bronchospasms in conditions like asthma and chronic obstructive pulmonary disease (COPD).',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 9,
                'name' => 'Omeprazole',
                'description' => 'A proton pump inhibitor (PPI) used to reduce stomach acid production, often prescribed for acid reflux and peptic ulcers.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 10,
                'name' => 'Levothyroxine',
                'description' => 'A synthetic thyroid hormone used to treat hypothyroidism.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 11,
                'name' => 'Prednisone',
                'description' => 'A corticosteroid used to reduce inflammation and suppress the immune system in various conditions.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 12,
                'name' => 'Warfarin',
                'description' => 'An anticoagulant (blood thinner) used to prevent blood clots and strokes.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 13,
                'name' => 'Hydrochlorothiazide',
                'description' => 'A diuretic often used to treat high blood pressure and edema.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 14,
                'name' => 'Prozac (Fluoxetine)',
                'description' => 'An antidepressant in the selective serotonin reuptake inhibitor (SSRI) class.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id'    => 15,
                'name' => 'Vitamin D',
                'description' => 'A supplement used to maintain healthy bones and aid in the absorption of calcium.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        Medication::insert($medications);
    }
}