<?php

namespace Database\Seeders;

use App\Models\Professor;
use Illuminate\Database\Seeder;

class ProfessorSeeder extends Seeder
{
    public function run()
    {
        $professors = [
            [
                'name' => 'Ahmed Benali',
                'email' => 'ahmed.benali@example.com',
                'phone' => '0612345678',
                'specialty' => 'Informatique',
                'type' => 'Permanent',
                'is_active' => true,
            ],
            [
                'name' => 'Sarah Moussaoui',
                'email' => 'sarah.moussaoui@example.com',
                'phone' => '0623456789',
                'specialty' => 'Mathématiques',
                'type' => 'Permanent',
                'is_active' => true,
            ],
            [
                'name' => 'Karim Idrissi',
                'email' => 'karim.idrissi@example.com',
                'phone' => '0634567890',
                'specialty' => 'Physique',
                'type' => 'Vacataire',
                'is_active' => true,
            ],
            [
                'name' => 'Fatima Zahra El Alami',
                'email' => 'fatima.elalami@example.com',
                'phone' => '0645678901',
                'specialty' => 'Chimie',
                'type' => 'Permanent',
                'is_active' => true,
            ],
            [
                'name' => 'Youssef Benjelloun',
                'email' => 'youssef.benjelloun@example.com',
                'phone' => '0656789012',
                'specialty' => 'Informatique',
                'type' => 'Vacataire',
                'is_active' => false,
            ],
        ];

        foreach ($professors as $professor) {
            Professor::create($professor);
        }
    }
} 