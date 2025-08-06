<?php

namespace App\Interfaces\Plans;

interface PlanRepositoryInterface
{
    public function getAddons();
    public function getPlanCategories();
    public function getPlans($catId);
    public function getFeaturesByPlanId($id)

    public function getPlansWithFeatures();
}
