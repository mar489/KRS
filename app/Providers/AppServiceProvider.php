<?php

namespace App\Providers;

use App\Http\Resources\PersonResource;
use App\Person;
use App\Supercategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {

            $supercategories = Supercategory::all();

            if (Auth::check()) {

                $id = Auth::user()->id;

                $user_data = new PersonResource(Person::find($id));

                return $view->with([
                    'user_data' => $user_data,
                    'supercategories' => $supercategories,
                ]);
            }
            return $view->with([
                'supercategories' => $supercategories,
            ]);

        });
    }
}
