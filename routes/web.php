<?php

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager as Ims;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $user = User::all();
    // return view('welcome')->withUsers($user);

    /**
     * Start with localization.
     */
    // Lang::setLocale(); /* applies it to another folder */
    // App::setLocale($locale);
    return view('welcome');
});

/**
 * Routes about setting localization up.
 */
Route::get('/localization', 'localeController@getLang');
Route::get('/set', 'localeController@setLocale')->name('set');






// For the image upload handling.
Route::post('/', function(Request $request) {

    $request->validate([
        # card.png = 151 kb
        # ashraf.png = 30 kb
        'img' => 'sometimes|image'
    ]);

    if ($request->hasFile('img')) {
        $image = $request->file('img');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);

        # compression.
        
        $img = Image::make($image);
        
        # add low quality to save method.
        $img->save($location, 10);

        $user = new User();
        $user->name = 'aabed';
        $user->image = $filename;
        $user->save();
    }
});

/**
         * In order to setup this, i would need to:
         * 1- Create a migration
         * 2- Create a model to it
         *  2-a: declare $translatedAttributes[] in this model.
         * 
         */

Route::get('create', function () {
    // $country = new Country();
    // $country->online = true;
    // $article->save();

    // foreach (['en', 'nl', 'fr', 'de'] as $locale) {
    //     $article->translateOrNew($locale)->name = "Title {$locale}";
    //     $article->translateOrNew($locale)->text = "Text {$locale}";
    // }

    // $article->save();

    // echo 'Created an article with some translations!';


        /**
         * First:
         *  1) create a country.
         *  2) set its local.
         *  3) start to add translation ot it.
         * 
         * Second:
         *  - learn how to deal with object of data.
         */

    $greece = Country::where('code', 'gr')->first();
    // echo $greece->translate('en')->name; // Greece

    $greece->translate('en')->name = 'abc';
    $greece->save();
    echo $greece->translate('en')->name;

    // $greece = Country::where('code', 'gr')->first();
    // echo $greece->translate('en')->name; // abc
});
