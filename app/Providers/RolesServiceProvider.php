<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;


class RolesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      \Blade::directive('role', function($roles) {
            return "<?php if(auth()->user()->hasRole($roles)) { ?>";
      });

      \Blade::directive('endrole', function() {
          return "<?php } ?>";
        });

    }
}
