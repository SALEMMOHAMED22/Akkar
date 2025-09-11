<?php

namespace App\Interfaces\Plans;

interface PlanRepositoryInterface
{
    public function getAddons();
    public function getPlanCategories();
    public function getPlans();
    public function getFeaturesByPlanId($planId);
    public function getPlansWithFeatures();
}
