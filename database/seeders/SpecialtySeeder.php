<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialtySeeder extends Seeder
{
    public function run(): void
    {
        $specialties = [
            ['name_ar' => 'طب عام', 'name_en' => 'General Practice', 'name_fr' => 'Médecine générale'],
            ['name_ar' => 'طب الأطفال', 'name_en' => 'Pediatrics', 'name_fr' => 'Pédiatrie'],
            ['name_ar' => 'طب النساء والتوليد', 'name_en' => 'Gynecology', 'name_fr' => 'Gynécologie'],
            ['name_ar' => 'طب القلب', 'name_en' => 'Cardiology', 'name_fr' => 'Cardiologie'],
            ['name_ar' => 'جراحة عامة', 'name_en' => 'General Surgery', 'name_fr' => 'Chirurgie générale'],
            ['name_ar' => 'طب العيون', 'name_en' => 'Ophthalmology', 'name_fr' => 'Ophtalmologie'],
            ['name_ar' => 'طب الجلدية', 'name_en' => 'Dermatology', 'name_fr' => 'Dermatologie'],
            ['name_ar' => 'طب الأعصاب', 'name_en' => 'Neurology', 'name_fr' => 'Neurologie'],
            ['name_ar' => 'طب النفس', 'name_en' => 'Psychiatry', 'name_fr' => 'Psychiatrie'],
            ['name_ar' => 'طب العظام', 'name_en' => 'Orthopedics', 'name_fr' => 'Orthopédie'],
            ['name_ar' => 'طب الأنف والأذن والحنجرة', 'name_en' => 'ENT', 'name_fr' => 'ORL'],
            ['name_ar' => 'طب المسالك البولية', 'name_en' => 'Urology', 'name_fr' => 'Urologie'],
            ['name_ar' => 'طب الجهاز الهضمي', 'name_en' => 'Gastroenterology', 'name_fr' => 'Gastro-entérologie'],
            ['name_ar' => 'طب الغدد الصماء', 'name_en' => 'Endocrinology', 'name_fr' => 'Endocrinologie'],
            ['name_ar' => 'طب الروماتيزم', 'name_en' => 'Rheumatology', 'name_fr' => 'Rhumatologie'],
        ];

        foreach ($specialties as $spec) {
            DB::table('specialties')->insertOrIgnore($spec);
        }
    }
}
