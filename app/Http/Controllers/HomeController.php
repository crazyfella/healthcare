<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\DB;
use App\Models\Gallery;
use App\Models\Setting;
Use App\Models\Employee;

class HomeController extends Controller
{
    public function home(){
      $page = $user = DB::table('pages')->find(1);
      $images = Gallery::inRandomOrder()->limit(4)->get();
      $setting = Setting::find(1);
      return view('welcome')->with(compact('page','images','setting'));
    }

    public function about(){
      $page = $user = DB::table('pages')->find(2);
      $setting = Setting::find(1);
      $employee = Employee::all();
      return view('about')->with(compact('page','setting','employee'));
   }

    public function services(){
       $page = $user = DB::table('pages')->find(3);
       $setting = Setting::find(1);
       return view('services')->with(compact('page','setting'));
    }

    

    public function contact(){
       $page = $user = DB::table('pages')->find(4);
       $setting = Setting::find(1);
       return view('contact-us')->with(compact('page','setting'));
    }

    public function privacy_policy(){
      $page = $user = DB::table('pages')->find(5);
      $setting = Setting::find(1);
      return view('privacy-policy')->with(compact('page','setting'));
   }

   public function galleries(){
      $images = Gallery::all();
      $setting = Setting::find(1);
      return view('gallery')->with(compact('images','setting'));
   }
}
