<?php

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
    $user = User::all();
    return view('welcome')->withUsers($user);
});


// For the image upload handling.
Route::post('/', function(Request $request) {
    if ($request->hasFile('img')) {
        $image = $request->file('img');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $location = public_path('images/' . $filename);
        Image::make($image)->resize(80, 72)->save($location);

        $user = new User();
        $user->name = 'aabed';
        $user->image = $filename;
        $user->save();
    }
});
