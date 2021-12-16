<?php

use App\Http\Controllers\EventsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

//بستخدم هاد الكود لو بدي احفظ اخر لغة كان فاتحها الشخص
    Auth::routes();



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){ //...

    Route::group(['middleware'=>['guest']],function (){
        Route::get('/', function()
        {
            return view('auth.login');
        });
    });

    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::resource('slider', '\App\Http\Controllers\SliderController');
    Route::resource('pages', '\App\Http\Controllers\PagesController');
    Route::get('/edit_page/{id}', '\App\Http\Controllers\PagesController@edit');
    Route::resource('/update_page', '\App\Http\Controllers\PagesController');

    Route::resource('SEO-Page', '\App\Http\Controllers\SeoController');
    Route::resource('SEO-Page', '\App\Http\Controllers\SeoController');
    Route::resource('Halls-menu', '\App\Http\Controllers\SeoController');
    Route::resource('socialmedia', '\App\Http\Controllers\SocialmediaController');
    Route::resource('widgets', '\App\Http\Controllers\WidgetsTableController');
    Route::resource('getNotification', '\App\Http\Controllers\GetNotificatiosController');

    Route::get('export_getNotification', 'GetNotificatiosController@export');

    Route::get('/changeStatus', '\App\Http\Controllers\SliderController@changeSliderStatus')->name('changeStatus');

    Route::get('/changePageStatus', '\App\Http\Controllers\PagesController@changePageStatus')->name('changePageStatus');

    Route::get('pdf_getNotification', 'GetNotificatiosController@pdf');

    Route::group(['middleware' => ['auth']], function() {

        Route::resource('roles','RoleController');

        Route::resource('users','UserController');

    });

    //TODO :: Moomen Route

    Route::get('/home', function () {
        return view('moom.home');
    });


    Route::prefix('events')->group(function () {
        Route::get('/', [EventsController::class, 'index'])->name('events');
        Route::get('/fetch', [EventsController::class, 'fetch'])->name('events.fetch');
        Route::post('/create', [EventsController::class, 'create'])->name('events.create');
        Route::post('/update/{id}', [EventsController::class, 'update'])->name('events.update');
        Route::get('/users/{id}', [EventsController::class, 'eventUsers'])->name('events.users');
        Route::get('/show/{id}', [EventsController::class, 'show'])->name('events.show');
    });

    Route::prefix('halls')->group(function () {
        Route::get('/', [EventsController::class, 'index'])->name('halls');
    });

    Route::prefix('agents')->group(function () {
        Route::get('/', [EventsController::class, 'index'])->name('agents');
    });

    Route::prefix('partners')->group(function () {
        Route::get('/', [EventsController::class, 'index'])->name('partners');
    });

    Route::prefix('managers')->group(function () {
        Route::get('/', [EventsController::class, 'index'])->name('managers');
    });

    Route::prefix('providers')->group(function () {
        Route::get('/', [EventsController::class, 'index'])->name('providers');
    });







});




/*
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{*/

    /*Route::get('/', function()
    {
        return view('dashboard');
    });*/
    /*Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


    Route::resource('slider', '\App\Http\Controllers\SliderController');
    Route::resource('pages', '\App\Http\Controllers\PagesController');
    Route::resource('SEO-Page', '\App\Http\Controllers\SeoController');


});

Auth::routes();*/



