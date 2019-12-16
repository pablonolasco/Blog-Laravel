<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
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
Route::view('/','welcome')->name('principal');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','ForumsController@index')->name('foro');
Route::get('/forums/{slug}', 'ForumsController@show')->name('detalle-foro');
Route::post('/forums','ForumsController@store')->name('save-post');
Route::get('/posts/{post}','PostsController@show')->name('post-detalle');
Route::post('/posts/save','PostsController@store');
Route::post('/respuesta/save','RepliesController@store');

Route::get('/images/{path}/{attachment}',function($path,$attachment){
    //===================devolvera la respuesta con la imagen
        $storagePath=Storage::disk($path)->getDriver()->getAdapter()->getPathPrefix();
        $imageFilePath=$storagePath.$attachment;
        if(File::exists($imageFilePath)){
            dd($imageFilePath);
            return Image::make($imageFilePath)->response();
        }
});
