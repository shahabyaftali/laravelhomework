<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Models\Info;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{


  public function register()
  {
      //
  }

  public function boot()
  {
      if(!Session::has('locale')) {
        Session::put('locale', 'en');
      }
      $info = Info::where('id', 1)->first();
      Schema::defaultStringLength(191);
      view()->share('info', $info);

  }
}
