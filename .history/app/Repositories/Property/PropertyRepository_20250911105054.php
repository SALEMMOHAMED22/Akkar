<?php

namespace App\Repositories\Property;

use App\Models\Property;
use App\Utils\ImageManger;
use Illuminate\Support\Facades\DB;
use App\Interfaces\Property\PropertyRepositoryInterface;

class PropertyRepository implements PropertyRepositoryInterface
{

    public function store(array $data)
    {
        try {
            $user = auth('sanctum')->user();
            if (!$user) {
                return __('response.unauthenticated');
            }


            return DB::transaction(function () use ($user, $data) {
            
                $property = Property::create([
                    'user_id'          => $user->id,
                    'category'         => $data['category']         ?? null,
                    'unit_type'        => $data['unit_type']        ?? null,
                    'title'            => $data['title']            ?? null,
                    'rooms'            => $data['rooms']            ?? null,
                    'floor'            => $data['floor']            ?? null,
                    'area_sqm'         => $data['area_sqm']         ?? null,
                    'finishing_status' => $data['finishing_status'] ?? null,
                    'furniture_status' => $data['furniture_status'] ?? null,
                    'payment_method'   => $data['payment_method']   ?? null,
                    'price'            => $data['price']            ?? null,
                    'deposit_amount'   => $data['deposit_amount']   ?? null,
                    'address_details'  => $data['address_details']  ?? null,
                    'latitude'         => $data['latitude']         ?? null,
                    'longitude'        => $data['longitude']        ?? null,
                    'ar_link'          => $data['ar_link']          ?? null,
                    'vr_link'          => $data['vr_link']          ?? null,
                    'status'           => 'pending', 
                ]);


                // رفع الصور (images[])
                if (!empty($data['images'])) {
                    $uploadedImages = ImageManger::uploadMultiImage('/storage/properties', $data['images']);
                    foreach ((array) $uploadedImages as $image) {
                        $property->images()->create(['image' => $image]);
                    }
                }
 
                // رفع المرفقات (attachments[])
                if (!empty($data['files'])) {
                    $uploadedImages = ImageManger::uploadMultiFile('/storage/properties', $data['files']);
                    foreach ((array) $uploadedImages as $image) {
                        $property->files()->create(['file' => $image]);
                    }
                }

                dd($property);

                return $property;

            });
        } catch (\Throwable $e) {
            logger()->error('Property store error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return __('response.unexpected_error');
        }
    }
}
