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
Route::get('/', 'CatalogoController@home')
    ->name('home');

Route::get('/catalog', 'CatalogoController@catalogo_senza_filtri')
    ->name('catalog');

Route::view('/faq', 'views_html/faq')
    ->name('faq');

Route::view('/contact', 'views_html/contact')
    ->name('contact');

Route::get('/dettagliannuncio/{id_annuncio}', 'CatalogoController@dettagli_annuncio')
        ->name('dettagli_annuncio');

Route::post('/admin/newproduct', 'AdminController@storeProduct')
        ->name('newproduct.store');

Route::get('/admin', 'AdminController@index')
        ->name('admin');

Route::get('/user', 'UserController@index')
        ->name('user')->middleware('can:isUser');

// Rotte per l'autenticazione
Route::view('login', 'views_html/signin')
        ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');

// Rotte per la registrazione
Route::view('register', 'views_html/register')
        ->name('register');

Route::post('register', 'Auth\RegisterController@register');



// Rotte inserite dal comando artisan "ui vue --auth"
// Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');
