<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;

class localeController extends Controller
{
    public function getLang()
    {
        return view('home.arabic');
    }

    /**
     ** Get the lang choice from the form.
     ** set the app locale with the choice.
     ** redirect back to the same page.
     *
     * @return void
     */
    public function setLocale(Request $request)
    {
        $lang = $request->language;
        
        if ($lang == 'ar') {

            Lang::setLocale($lang);
            return view('home.arabic');
        
        }elseif ($lang == 'en') {

            Lang::setLocale($lang);
            return view('home.english');            
        }
    }
}
