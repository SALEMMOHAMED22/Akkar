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
            'price'     => ((float)$this->price === 0.0) ? __('response.free') : number_format((float)$this->price, 2) . ' ' . __('response.pound'),
            'ads_limit'         => $this->ads_limit . ' ' . __('response.ads') ?? 0 ,
            'images_limit'             => $imagesText,
            'video'           => $this->video ? '✅' : '✖',
            'vr_tours'          => (int) $this->vr_tours . ' ' . __('response.tours'),
             'search_priority'  => $searchMap[$this->search_priority] ?? $this->search_priority,
            'reports'          => $reportsMap[$this->reports] ?? $this->reports,
            'team_members'        => $this->team_members ? __('response.yes') : __('response.no'),
        ];
    }
}
