<?php

namespace App\Repositories\Plans;

use App\Models\Plan;
use App\Models\PlanCategory;
use App\Interfaces\Plans\PlanRepositoryInterface;
use App\Models\Addon;

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
        $plan = Plan::find($planId)->with();
        if (!$features) {
            return false;
        }
        return $features;
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
