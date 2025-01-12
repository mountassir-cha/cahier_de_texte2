<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run()
    {
        $courses = [
            [
                'title' => 'Mathématiques Fondamentales',
                'professor_id' => 2, // Sarah Moussaoui
                'subject_id' => 1,   // Mathématiques
                'class_id' => 1,     // Changed from classe_id to class_id
                'semester' => 1,
                'hours' => 48,
                'is_active' => true,
            ],
            [
                'title' => 'Physique Générale',
                'professor_id' => 3, // Karim Idrissi
                'subject_id' => 2,   // Physique
                'class_id' => 1,     // Changed from classe_id to class_id
                'semester' => 1,
                'hours' => 48,
                'is_active' => true,
            ],
            [
                'title' => 'Programmation C++',
                'professor_id' => 1, // Ahmed Benali
                'subject_id' => 3,   // Informatique
                'class_id' => 2,     // Changed from classe_id to class_id
                'semester' => 1,
                'hours' => 36,
                'is_active' => true,
            ],
            [
                'title' => 'Chimie Organique',
                'professor_id' => 4, // Fatima Zahra El Alami
                'subject_id' => 4,   // Chimie
                'class_id' => 3,     // Changed from classe_id to class_id
                'semester' => 2,
                'hours' => 48,
                'is_active' => true,
            ],
            [
                'title' => 'Technical English',
                'professor_id' => 5, // Youssef Benjelloun
                'subject_id' => 5,   // Anglais
                'class_id' => 4,     // Changed from classe_id to class_id
                'semester' => 2,
                'hours' => 24,
                'is_active' => true,
            ],
        ];

        foreach ($courses as $course) {
            Course::create($course);
        }
    }
} 