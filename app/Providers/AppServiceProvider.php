<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\TotalVisit;
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
        //
        // Mengirimkan jumlah pengunjung ke partial footer di setiap halaman
        View::composer('guest.layouts.footer', function ($view) {
            $today = Carbon::today();
            $visitorsToday = TotalVisit::where('visit_date', $today)->value('visit_count') ?? 0;

            $yesterday = Carbon::yesterday();
            $visitorsYesterday = TotalVisit::where('visit_date', $yesterday)->value('visit_count') ?? 0;

            $totalVisitors = TotalVisit::sum('visit_count');

            $view->with(compact('visitorsToday', 'visitorsYesterday', 'totalVisitors'));
        });
    }
}
