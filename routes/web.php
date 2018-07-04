<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});
Route::get('contact',[
   'uses' => 'TestController@index',
]);

Route::get('limon', function () {
    $bits=['so','much','errors'];
    return view('limon',['bits'=>$bits]);
});
*/
Route::resource('/', 'toDoController');
Route::resource('/lost', 'lostController');
Route::resource('/found', 'foundController');
Route::resource('/profile', 'profileController');
//Route::get('/profile/destroy', 'profileController@destroy');
Route::get('/foundProducts', 'toDoController@foundProducts');
Route::get('/lostProducts', 'toDoController@lostProducts');

Route::get('storage/{filename}', function ($filename)
{
    $path = storage_path('app/public/uploads/' . $filename);

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
