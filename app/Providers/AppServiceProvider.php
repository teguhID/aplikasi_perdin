<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use DateTime;
use IntlDateFormatter;

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
        View::composer('*', function ($view) {
            $view->with('formatTanggalIndonesia', function ($tanggal) {
                $dateTime = DateTime::createFromFormat('Y-m-d', $tanggal);
                if (!$dateTime) {
                    return "Format tanggal tidak valid";
                }

                $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
                return $formatter->format($dateTime);
            });
        });
    }
}
