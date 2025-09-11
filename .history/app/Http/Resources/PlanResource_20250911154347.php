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
            'top'         => __('response.top_appearance'),
        ];

        $reportsMap = [
            'none'     => __('response.no_reports'),
            'basic'    => __('response.basic_reports'),
            'advanced' => __('response.advanced_reports'),
        ];

        
        $imagesText = ($this->images_limit === null || $this->images_limit >= 100000)
            ? __('response.unlimited')
            : (string) $this->images_limit;

        return [
            'plan_name'            => app()->getLocale() == 'ar' ? $this->name_ar : $this->name_en,
            'price'     => number_format((float)$this->price, 2) . ' جنيه',
            'ads_limit'         => $this->ads_limit ?? 0,
            'image'             => $imagesText,
            'الفيديو'           => $this->video ? '✅' : '✖',
            'جولات VR'          => (int) $this->vr_tours,
            'الظهور في البحث'   => $searchMap[$this->search_priority] ?? $this->search_priority,
            'التقارير'          => $reportsMap[$this->reports] ?? $this->reports,
            'إدارة فريق'        => $this->team_members > 0 ? ('حتى ' . $this->team_members . ' مستخدم') : 'لا',
        ];
    }
}
