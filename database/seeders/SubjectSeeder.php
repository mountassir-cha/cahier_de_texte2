<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run()
    {
        $subjects = [
            [
                'name' => 'Mathématiques',
                'code' => 'MATH101',
                'description' => 'Cours de mathématiques fondamentales',
                'credits' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Physique',
                'code' => 'PHY101',
                'description' => 'Physique générale et mécanique',
                'credits' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Informatique',
                'code' => 'INFO101',
                'description' => 'Introduction à la programmation',
                'credits' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Chimie',
                'code' => 'CHIM101',
                'description' => 'Chimie générale et organique',
                'credits' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Anglais',
                'code' => 'ANG101',
                'description' => 'Anglais technique',
                'credits' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($subjects as $subject) {
            Subject::create($subject);
        }
    }
} 