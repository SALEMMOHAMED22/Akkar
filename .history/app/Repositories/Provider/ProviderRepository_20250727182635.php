<?php

namespace App\Repositories\Provider;

use App\Interfaces\Provider\ProviderRepositoryInterface;

class ProviderRepository implements ProviderRepositoryInterface
{
    
    public function getProviderProfile($id){

       
    }


    public function getProviderData($id){
        $user = User::where('id', $id)->first();
        
    }
}
