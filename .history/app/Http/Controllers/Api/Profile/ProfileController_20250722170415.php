<?php

namespace App\Http\Controllers\Api\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Http\Resources\UserResource;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\UserIdentityRequest;
use App\Interfaces\Profile\ProfileInterface;
use PHPUnit\Framework\MockObject\Builder\Identity;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    protected $profileRepo ;

    public function __construct(ProfileInterface $profileRepo)
    {
        $this->profileRepo = $profileRepo;
    }


    public function profileUpdate(ProfileRequest $request){

        $user = $this->profileRepo->updateProfile($request->all());

        return apiResponse(200 , 'Profile updated successfully' , [
            'user' => new UserResource($user),
        ]);




    }


    public function emailNotification(Request $request){

        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $user = $this->profileRepo->emailNotification($request->email);

        return apiResponse(200 , 'Email notification updated successfully' , [
            'user' => new UserResource($user),
        ]);
    }

    public function identifiesStore(UserIdentityRequest $request){
       
        this

    }
}
