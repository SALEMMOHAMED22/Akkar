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
            ],
            [
                'plan_id' => 1,
                'name_ar' => 'عرض محدود 5 عفارات يوميا ',
                'name_en' => 'Limited display of 5 properties per day',
                'count' => 5,
            ],
            [
                'plan_id' => 1,
                'name_ar' => 'ارسال عدد محدود من الاستفسارات 3 اسبوعيا ',
                'name_en' => 'Send a limited number of contacts per week',
                'count' => 3,
            ],
            [
                'plan_id' => 1,
                'name_ar' => 'مشاهدة صور العفارات',
                'name_en' => 'View property images',
            ],

            [
                'plan_id' => 2,
                'name_ar' => 'جولتان افتراضيتان شهريا',
                'name_en' => 'Two VR tours per month',
                'count' => 2,

            ],
            [
                'plan_id' => 2,
                'name_ar' => 'فلتره متقدمه ( حسب مواصفات التشطيب - المساحات )',
                'name_en' => 'Advanced filter (by features - areas)',

            ],
            [
                'plan_id' => 2,
                'name_ar' =>    'اشعارات فورية عند اضافة عفارات جديده تناسب بحثك',
                'name_en' => 'Instant notifications when new properties match your search',
            ],
            [
                'plan_id' => 2,
                'name_ar' => 'حفظ عدد غير محدود من العقارات في المفضلة' ,
                'name_en' => 'Save unlimited properties to Favorites' ,
            ],
            [
                'plan_id' => 3,
                'name_ar' => 'جولات افتراضية غير محدوده ',
                'name_en' => ' Unlimited VR tours',
            ],
            [
                'plan_id' => 3,
                'name_ar' => 'اداة مقارنه متقدمه بين 5 عقارات في نفس الوقت',
                'name_en' => ' Advanced comparison tool between 5 properties at the same time',
            ],
            [
                'plan_id' => 3,
                'name_ar' => 'دعم فني مميز (رد خلال ساعه )',
                'name_en' => ' Special technical support (reply within an hour)',
            ],
            [
                'plan_id' => 3,
                'name_ar' => 'خصم 10',
                'name_en' => '',
            ],
            [
                'plan_id' => 3,
                'name_ar' => '',
                'name_en' => '',
            ],
            [
                'plan_id' => 3,
                'name_ar' => '',
                'name_en' => '',
            ],
        ];
    }
}
