<?php 

namespace App\Greeting;

use Illuminate\Support\Facades\Facade;

class CustomFacade extends Facade{

    protected static function getFacadeAccessor()
    {
         return 'custom';
    }


}