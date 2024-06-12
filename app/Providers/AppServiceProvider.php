<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        //
        Blade::directive('money', function ($amount) {
            // $amount = round(intval($amount),2);
            // $amount =number_format($amount,2,'.','');
            return "<?php echo '$' . number_format($amount,2,'.',','); ?>";
        });

        Blade::directive('dateformat', function ($expression) {
            return "<?php echo (\Carbon\Carbon::parse($expression))->format('jS F Y'); ?>";
        });
    }
}
