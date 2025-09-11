<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
         return [
            'id'               => $this->id,
            'category'         => $this->category,
            'unit_type'        => $this->unit_type,
            'title'            => $this->title,
            'rooms'            => $this->rooms,
            'floor'            => $this->floor,
            'area_sqm'         => $this->area_sqm,
            'finishing_status' => $this->finishing_status,
            'furniture_status' => $this->furniture_status,
            'payment_method'   => $this->payment_method,
            'price'            => $this->price,
            'deposit_amount'   => $this->deposit_amount,
            'address_line'     => $this->address_line,
            'address_details'  => $this->address_details,
            'latitude'         => $this->latitude,
            'longitude'        => $this->longitude,
            'ar_link'          => $this->ar_link,
            'vr_link'          => $this->vr_link,
            'status'           => $this->status,

            'user' => [
                'id'    => $this->user?->id,
                'name'  => $this->user?->name,
                'phone' => $this->user?->phone,
            ],

            'images' => $this->images->map(fn($img) => [
                'id'   => $img->id,
                'url'  => $img->image ? asset($img->image) : null,

            ]),

            'files' => $this->files->map(fn($f) => [
                'id'    => $f->id,
                'url'   => $f->file ? asset($f->file) : null,
            ]),

            'created_at' => $this->created_at?->format('Y-m-d H:i'),
        ];
    }
}
