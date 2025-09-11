<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubscriptionLimit extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscription_id',
        // snapshot
        'ads_limit','images_limit','video_enabled','vr_tours_limit','team_enabled',
        // usage
        'ads_used','vr_tours_used',
    ];

    protected $casts = [
        'video_enabled' => 'boolean',
        'team_enabled'  => 'boolean',
    ];

    public function subscription()
    {
        return $this->belongsTo(Subscription::class);
    }

    // Helpers
    public function hasAdsCapacity(): bool
    {
        return is_null($this->ads_limit) || $this->ads_used < $this->ads_limit;
    }

    public function hasVrCapacity(int $want = 1): bool
    {
        return ($this->vr_tours_used + $want) <= $this->vr_tours_limit;
    }
}
