<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

/*start route - home page */
class HomeController extends Controller
{
    public function home() {
        if(substr($_SERVER["HTTP_ACCEPT_LANGUAGE"], 0, 2) === "it")
            App::setLocale('it');
            else
                App::setLocale('en');

        return view('home');
    }
}
