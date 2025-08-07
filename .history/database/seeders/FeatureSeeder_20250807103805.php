<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $features = [
            [
                'name_ar' =>  'امكانية البحث الاساسي حسب (المكان - النطاق السعري )',
                'name_en' => 'Basic search by (location - price range)',
                'has_count' => false,
            ],
            [
                'name_ar' => 'عرض عقارات يوميا',
                'name_en' => 'display properties per day',
                'has_count' => true,
            ],
            [
                'name_ar' => 'ارسال عدد محدود من الاستفسارات اسبوعيا',
                'name_en' => 'Send a limited number of contacts per week',
                'has_count' => true,
            ],
            [
                'name_ar' => 'مشاهدة صور العقارات',
                'name_en' => 'View property images',
                'has_count' => false,
            ],
            [
                'name_ar' => 'جولات افتراضيه شهريا',
                'name_en' => 'VR tours per month',
                'has_count' => true,
            ],
            [
                'name_ar' => 'فلترة متقدمه ( حسب مواصفات التشطيب - المساحات )',
                'name_en' => 'Advanced filter (by features - areas)',
                'has_count' => false,
            ],
            [
                'name_ar' =>  'اشعارات فورية عند اضافة عفارات جديده تناسب بحثك',
                'name_en' => 'Instant notifications when new properties match your search',
                'has_count' => false,
            ],
            [
                'name_ar' =>  'حفظ عدد غير محدود من العقارات في المفضلة',
                'name_en' => 'Save unlimited properties to Favorites',
                'has_count' => false,
            ],
            [
                'name_ar' => 'اداة مقارنه متقدمه بين عقارات في نفس الوقت',
                'name_en' => 'Advanced comparison tool between properties at the same time',
                'has_count' => true,
            ],
            [
                'name_ar' => 'دعم فني مميز (رد خلال ساعه)',
                'name_en' => '',
                'has_count' => false,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'has_count' => false,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'has_count' => false,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'has_count' => false,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'has_count' => false,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'has_count' => false,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'has_count' => false,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'has_count' => false,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'has_count' => false,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'has_count' => false,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'has_count' => false,
            ],
            [
                'name_ar' => '',
                'name_en' => '',
                'has_count' => false,
            ],
        ];
    }
}
