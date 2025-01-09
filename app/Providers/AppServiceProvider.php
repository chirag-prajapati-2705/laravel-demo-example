<?php

namespace App\Providers;

use App\Greeting\Custom;
use App\Greeting\CustomLogger;
use App\Greeting\Greeting;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\UserRepository;
use App\Test\Test;
use App\Test\TestFacade;
use App\View\Components\Alert;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Lang;
use Money\Money;
use Illuminate\Support\Pluralizer;

 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        // $this->app->bind('test',function(){
        //     return new Test();
        // });
       // require_once app_path() . '/helpers.php';

        $this->app->bind('greeting',function(){
            return new CustomLogger();
       });


       //Blade::component('package-alert', Alert::class);

       $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
       $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);

       
    //    $this->app->bind('custom',function(){
    //     return new Custom();
    // });

    
    // $this->app->bind('new',function(){
    //     return new CustomLogger();
    // });
  

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //

        // Lang::stringable(function (Money $money) {
        //     return $money->formatTo('en_GB');
        // });
        Pluralizer::useLanguage('spanish');

    
    }
}
