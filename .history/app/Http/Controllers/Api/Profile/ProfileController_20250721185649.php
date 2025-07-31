<?php

namespace App\Http\Controllers\Api\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Interfaces\Profile\ProfileInterface;

class ProfileController extends Controller
{
    protected $profileRepo ;

    public function __construct(ProfileInterface $profileRepo)
    {
        $this->profileRepo = $profileRepo;
    }


    public function profileStore()
}
