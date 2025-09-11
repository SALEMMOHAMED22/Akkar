<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
          // خرائط نصوص الجدول
        $searchMap = [
            'normal'      => __('response.normal_appearance'),
            'highlighted' => __('response.distinctive_appearance'),
            'top'         => __('response.')',
        ];

        $reportsMap = [
            'none'     => 'لا يوجد',
            'basic'    => 'تقارير أساسية',
            'advanced' => 'تقارير متقدّمة (AI)',
        ];

        
        $imagesText = ($this->images_limit === null || $this->images_limit >= 100000)
            ? 'عدد غير محدود ✅'
            : (string) $this->images_limit;

        return [
            'الباقة'            => app()->getLocale() == 'ar' ? $this->name_ar : $this->name_en,
            'السعر الشهري'      => number_format((float)$this->price, 2) . ' جنيه',
            'عدد الإعلانات'     => $this->ads_limit ?? 0,
            'الصور'             => $imagesText,
            'الفيديو'           => $this->video ? '✅' : '✖',
            'جولات VR'          => (int) $this->vr_tours,
            'الظهور في البحث'   => $searchMap[$this->search_priority] ?? $this->search_priority,
            'التقارير'          => $reportsMap[$this->reports] ?? $this->reports,
            'إدارة فريق'        => $this->team_members > 0 ? ('حتى ' . $this->team_members . ' مستخدم') : 'لا',
        ];
    }
}
