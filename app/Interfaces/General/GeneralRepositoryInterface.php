<?php

namespace App\Interfaces\General;

interface GeneralRepositoryInterface
{
    public function getJobTitles();
    public function getCompanyTypes();
    public function getAboutUs();
    public function getHowItWorks();
    public function getSettings();
    public function getPrivacyPolicy();
    public function getTermsAndConditions();
}
