<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\TotalVisit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin(){
        $porto = Portfolio::all();

        return view('admin.dashboard',compact('porto'));
    }

    public function home(){
        return view('guest.home');
    }

    public function about(){
        return view('guest.about');
    }

    public function service(){
        return view('guest.service');
    }

    public function contact(){
        return view('guest.contact');
    }

    public function wa(){
        return redirect()->away('https://wa.me/+6281247681237');;
    }
}
