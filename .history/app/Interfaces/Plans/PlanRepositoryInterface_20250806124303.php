<?php

namespace App\Interfaces\Plans;

interface PlanRepositoryInterface
{
    public function getAddons();
    public function getPlansWithFeatures();
}
