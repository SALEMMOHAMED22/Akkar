<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $planFeatures = [
            [
                'plan_id' => 1,
                'name_ar' => 'امكانية البحث الاساسي حسب (المكان - النطاق السعري )',
                'name_en' => 'Basic search by (location - price range)',
            ]  ,
            [
                'plan_id' => 1,
                'name_ar' => 'عرض محدود 5 عفارات يوميا ' ,
                'name_en' => 'Limited display of 5 properties per day',
                'count' => 5,
            ],
            [
                'plan_id' => 1,
                'name_ar' => 'ارسال عدد محدود من الاستفسارات 3 اسبوعيا ' ,
                'name_en' => 'Send a limited number of contacts per week',
                'count' => 3,
            ],
            [
                'plan_id' => 1,
                'name_ar' => 'مشاهدة صور العفارات'  ,
                'name_en' => 'View property ',
            ],
        ];
    }
}
