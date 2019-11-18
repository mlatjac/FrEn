<?php

namespace Mlatjac\FrEn\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Routing\Controller as BaseController;


class LanguageController extends BaseController
{
    public function switchLang($lang)
    {
        // Switch language
        Session::put('applocale', $lang);

        // return back to same page
        return back();
    }


    public function redirectToLanguageExplicitUrl()
    {
        // Add _en to current route name and redirect
        return redirect(route(Route::currentRouteName() . '_en'), 301);
    }
}
