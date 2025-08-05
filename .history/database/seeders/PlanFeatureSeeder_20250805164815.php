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
                'name_ar' => 'خصم 10% علي جميع الخدمات الاضافية',
                'name_en' => '10% discount on all additional services',
            ],
            [
                'plan_id' => 3,
                'name_ar' => 'تقارير استثمارية عن المناطق العقارية',
                'name_en' => ' Investment reports on real estate areas',
            ],
            [
                'plan_id' => 3,
                'name_ar' => 'وصول مبكر للعروض الحصريه قبل المشتركين',
                'name_en' => ' Early access to exclusive offers before subscribers',
            ],
            [
                'plan_id' => 4 ,
                'name_ar' => 'ادراج 5 عقارات بحد اقصي',
                'name_en' => ' Add 5 properties at the maximum',
                'count' => 5,
            ],
            [
                'plan_id' => 4 ,
                'name_ar' => '10 صور لكل عقار (بحد اقصي 2 ميجا للصوره )',
                'name_en' => ' 10 images for each property (maximum 2 MB for each image)',
            ],
            [
                'plan_id' => 4 ,
                'name_ar' => 'ظهور في نتائج البحث الاساسية حسب التصنيف',
                'name_en' => ' Display in search results based on classification',
            ],
            [
                'plan_id' => 4 ,
                'name_ar' => 'ادارة اساسية للعقارات ( اضافة - تعديل - حذف )',
                'name_en' => ' Basic management of properties (add - edit - delete)',
            ],
            [
                'plan_id' => 4 ,
                'name_ar' => 'احصاءات اساسية (عدد المشاهدات )',
                'name_en' => ' Basic statistics (number of views)',
            ],
            [
                'plan_id' => 5 ,
                'name_ar' => 'ادراج 15 عقار',
                'name_en' => ' Add 15 properties',
                'count'  => 15,

            ],
            [
                'plan_id' => 5 ,
                'name_ar' => 'جولة افتراضية واحدة مجانية لكل عقار',
                'name_en' => ' Free VR tour for each property',
            ],
            [
                'plan_id' => 5 ,
                'name_ar' => 'اعلان مميز للعقار في الصقحة الرئيسية لمدة 3 ايام شهريا',
                'name_en' => ' Special advertisement for a property in the main page for 3 days monthly',
            ],
            [
                'plan_id' => 5 ,
                'name_ar' => 'تقارير أداء متقدمة (معدل المشاهدات - عدد الاتصالات )',
                'name_en' => ' Advanced performance reports (view rate - number of calls)',
            ],
            [
                'plan_id' => 5 ,
                'name_ar' => 'اداة جدولة مواعيد الزيارات',
                'name_en' => ' Appointment scheduling tool',
            ],
            [
                'plan_id' => 5 ,
                'name_ar' => 'شهادة وسيط موثوقه من المنصه',
                'name_en' => ' Verified certificate from the platform',
            ],
            [
                'plan_id' => 6 ,
                'name_ar' => 'ادراج عدد غير محدود من العقارات',
                'name_en' => ' Add an unlimited number of properties',
            ],
            [
                'plan_id' => 6 ,
                'name_ar' => 'جولات افتراضية غير محدوده ',
                'name_en' => ' Unlimited VR tours',
            ],
            [
                'plan_id' => 6 ,
                'name_ar' => 'ظهور دائم في القسم المميز بالموقع',
                'name_en' => ' Continuous display in the special section of the website',
            ],
            [
                'plan_id' => 6 ,
                'name_ar' => 'لوحة تحكم متكاملة مع تحليلات أداء تفصيلية',
                'name_en' => ' Complete control panel with detailed performance analysis',
            ],
            [
                'plan_id' => 6 ,
                'name_ar' => 'دعم فني مخصص (مدير حساب شخصي)',
                'name_en' => ' Special technical support (personal account manager)',
            ],
            [
                'plan_id' => 6 ,
                'name_ar' => 'امكانية التكامل مع انظمة ادارة العلاقات ',
                'name_en' => ' Ability to integrate with relationship management systems',
            ],
            [
                'plan_id' => 6 ,
                'name_ar' => 'شهادة مصدقة من المنصة',
                'name_en' => ' Verified certificate from the platform',
            ],
            [
                'plan_id' => 7 ,
                'name_ar' => 'بروفايل خاص',
                'name_en' => ' Private profile',
            ],
            [
                'plan_id' => 7 ,
                'name_ar' => 'ادراج 50 وحدة عقارية',
                'name_en' => ' Add 50 properties',
                'count'  => 50,
            ],
            [
                'plan_id' => 7 ,
                'name_ar' => '5 جولات افتراضية شهريا',
                'name_en' => ' 5 VR tours per month',
                'count'  => 5,
            ],
            [
                'plan_id' => 7 ,
                'name_ar' => 'شعار الشركه في جميع اعلاناتها',
                'name_en' => ' Company logo on all advertisements',

            ],
            [
                'plan_id' => 7 ,
                'name_ar' => 'تقارير أداء شهرية ' , 
                'name_en' => ' Monthly performance reports',
            ],
            [
                'plan_id' => 7 ,
                'name_ar' => 'دعم  فني عبر البريد الالكتروني' ,
                'name_en' => ' Technical support via email',
            ],
            [
                'plan_id' => 8 ,
                'name_ar' => 'ادراج غير محدود لجميع مشاريع الشركة' ,
                'name_en' => ' Add an unlimited number of properties for all company projects',
            ],
            [
                'plan_id' => 8 ,
                'name_ar' => 'جولات افتراضية غير محدوده بجوده عالية' ,
                'name_en' => ' Unlimited VR tours with high quality',
            ],
            [
                'plan_id' => 8 ,
                'name_ar' => 'اعلان دائم في القسم المميز بالصفحة الرئيسية' ,
                'name_en' => ' Continuous display in the special section of the homepage',
            ],
            [
                'plan_id' => 8 ,
                'name_ar' => 'دعم  فني عبر البريد الالكتروني' ,
                'name_en' => ' Technical support via email',
            ],
            [
                'plan_id' => 8 ,
                'name_ar' => 'دعم  فني عبر البريد الالكتروني' ,
                'name_en' => ' Technical support via email',
            ],
            [
                'plan_id' => 8 ,
                'name_ar' => 'دعم  فني عبر البريد الالكتروني' ,
                'name_en' => ' Technical support via email',
            ],
            [
                'plan_id' => 8 ,
                'name_ar' => 'دعم  فني عبر البريد الالكتروني' ,
                'name_en' => ' Technical support via email',
            ],
            [
                'plan_id' => 8 ,
                'name_ar' => 'دعم  فني عبر البريد الالكتروني' ,
                'name_en' => ' Technical support via email',
            ],
            [
                'plan_id' => 8 ,
                'name_ar' => 'دعم  فني عبر البريد الالكتروني' ,
                'name_en' => ' Technical support via email',
            ],
        ];
    }
}
