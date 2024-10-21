<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\TotalVisit;
use Carbon\Carbon;

class TrackTotalVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $today = Carbon::today();

        // Cek apakah entri untuk hari ini sudah ada
        $pageVisit = TotalVisit::where('visit_date', $today)->first();

        if ($pageVisit) {
            // Jika sudah ada, tambahkan jumlah kunjungan
            $pageVisit->visit_count += 1;
            $pageVisit->save();
        } else {
            // Jika belum ada, buat entri baru
            TotalVisit::create([
                'visit_date' => $today,
                'visit_count' => 1
            ]);
        }
         return $next($request);
    }
}
