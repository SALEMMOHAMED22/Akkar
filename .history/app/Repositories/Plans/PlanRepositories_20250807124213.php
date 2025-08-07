<?php

namespace App\Repositories\Plans;

use App\Models\Plan;
use App\Models\Addon;
use App\Models\PlanLimit;
use App\Models\PlanFeature;
use App\Models\PlanCategory;
use App\Interfaces\Plans\PlanRepositoryInterface;

class PlanRepositories implements PlanRepositoryInterface
{

    public function getAddons()
    {

        $plansAddons = Addon::get();
        if (!$plansAddons) {
            return false;
        }
        return $plansAddons;
    }

    public function getPlanCategories()
    {

        $planCategories = PlanCategory::get();
        if (!$planCategories) {
            return false;
        }
        return $planCategories;
    }
    public function getPlans($catId)
    {

        $plans = Plan::where('plan_category_id', $catId)->get();
        if (!$plans) {
            return false;
        }
        return $plans;
    }

    public function getFeaturesByPlanId($planId)
    {
        $features = Plan::
        $limits = PlanLimit::where('plan_id', $planId)->get();
        if ($features->isEmpty() && $limits->isEmpty()) {
            return false;
        }
        return ['features' => $features, 'limits' => $limits];
    }
    public function getPlansWithFeatures()
    {
        $plansWithFeatures = PlanCategory::with('plans.features', 'plans.limits')->get();

        if (!$plansWithFeatures) {
            return false;
        }
        return $plansWithFeatures;
    }
}
