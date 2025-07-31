<?php

namespace App\Repositories\Provider;

use App\Models\User;
use App\Interfaces\Provider\ProviderRepositoryInterface;

class ProviderRepository implements ProviderRepositoryInterface
{
    
    public function getProviderProfile($id){

        $user ;
       
    }


    public function getProviderData($id){
        $user = User::where('id', $id)->first();

        if($user){
            return $user;
        }

        return $user;
        
    }
}
