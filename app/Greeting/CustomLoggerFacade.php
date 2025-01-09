<?php 

namespace App\Greeting;

use Illuminate\Support\Facades\Facade;

class CustomLoggerFacade extends Facade{

    protected static function getFacadeAccessor()
    {
         return 'test';
    }


}