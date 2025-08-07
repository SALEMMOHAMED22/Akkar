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
                'name_ar' => 'دعم فني مميز ',
                'name_en' => 'Special technical support',
                'has_count' => false,
            ],
            [
                'name_ar' => 'خصم 10% علي جميع الخدمات الاضافية',
                'name_en' => '10% discount on all additional services',
                'has_count' => false,
            ],
            [
                'name_ar' => 'تقارير استثمارية عن المناطق العقارية',
                'name_en' => 'Investment reports on real estate areas',
                'has_count' => false,
            ],
            [
                'name_ar' => 'وصول مبكر للعروض الحصريه قبل المشتركين',
                'name_en' => 'Early access to exclusive offers before subscribers',
                'has_count' => false,
            ],
            [
                'name_ar' => 'بروفايل خاص',
                'name_en' => 'Private profile',
                'has_count' => false,
            ],
            [
                'name_ar' => 'شعار الشركه  في جميع اعلاناتها',
                'name_en' => 'Company logo on all advertisements',
                'has_count' => false,
            ],
            [
                'name_ar' => 'حضور فعاليات حصرية',
                'name_en' => ' Special events',
                'has_count' => false,
            ],
            [
                'name_ar' => 'ادراج في دليل المطورين المعتمدين',
                'name_en' => 'Add to the developer directory',
                'has_count' => false,
            ],
            [
                'name_ar' => 'امكانية تخصيص واجهة الادارة',
                'name_en' => 'Ability to customize the management interface',
                'has_count' => false,
            ],
            [
                'name_ar' => 'ادراج عقارات بحد اقصي',
                'name_en' => 'Add properties at the maximum',
                'has_count' => true,
            ],
            [
                'name_ar' => 'صور لكل عقار حد اقصي',
                'name_en' => 'images for each property (maximum 2 MB for each image)' ,
                'has_count' => true,
            ],
            [
                'name_ar' =>  'ظهور في نتائج البحث الاساسية حسب التصنيف'',
                'name_en' => '',
                'has_count' => false,
            ],
        ];
    }
}
