<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
Route::get('locale/{locale}', function ($locale){
  Session::put('locale', $locale);
  return redirect()->back();
});
Route::get('/pass', function(){
  dd(bcrypt('123'));
});
//Admin Auth Routes
Route::get('admin/enter', 'Admin\AuthController@showLoginForm')->name('admin.login');
Route::post('admin/enter', 'Admin\AuthController@login')->name('admin.login.submit');
Route::get('admin/exit', 'Admin\AuthController@logout')->name('admin.logout');
Route::post('admin/changePassword', 'Admin\AuthController@changePassword')->name('admin.password.change');

//Admin CRUD Routes
Route::get('/admin', function(){ return redirect(route('admin.slider.index'));})->name('admin.dashboard');
  
  //Slider Routes
Route::name('admin.')->group(function () {
  Route::resource('admin/slider', 'Admin\SliderController');
});

  //About Routes
Route::get('admin/about', 'Admin\AboutController@index')->name('admin.about.index');
Route::patch('admin/about', 'Admin\AboutController@update')->name('admin.about.update');

  //Info Routes
Route::get('admin/info', 'Admin\InfoController@index')->name('admin.info.index');
Route::patch('admin/info', 'Admin\InfoController@update')->name('admin.info.update');
  
  //Gallery Routes
Route::name('admin.')->group(function () {
  Route::resource('admin/gallery', 'Admin\GalleryController');
});

  //Event Routes
Route::name('admin.')->group(function () {
  Route::resource('admin/event', 'Admin\EventController');
});

  //News Routes
Route::name('admin.')->group(function () {
  Route::resource('admin/news', 'Admin\NewsController');
});

  //Training Routes
Route::name('admin.')->group(function () {
  Route::resource('admin/training', 'Admin\TrainingController');
});

  //Blog Routes
Route::name('admin.')->group(function () {
  Route::resource('admin/blog', 'Admin\BlogController');
});
  



  //Contact Routes
Route::get('/admin/contacts', 'Admin\ContactController@index')->name('admin.contact.index');
Route::delete('/admin/contact/{contact}', 'Admin\ContactController@destroy')->name('admin.contact.destroy');

  //subscriber Routes
Route::get('/admin/subscribers', 'Admin\ContactController@subscribers')->name('admin.subscribers');
Route::delete('/admin/subscriber/{subscriber}', 'Admin\ContactController@destroySubscriber')->name('admin.subscriber.destroy');

//Frontend Routes

  //Home Route
Route::get('/', 'Front\HomeController@index')->name('home');

  //Subscribe Route
Route::post('/subscribe', 'Admin\SubscriberController@store')->name('subscriber.store');

  //News Routes
Route::get('/news', 'Front\NewsController@index')->name('news.index');
Route::get('/news/{news}', 'Front\NewsController@show')->name('news.show');

  //Events Routes
Route::get('/events', 'Front\EventController@index')->name('event.index');
Route::get('/event/{event}', 'Front\EventController@show')->name('event.show');
  
  //Blog Routes
Route::get('/blog', 'Front\BlogController@index')->name('blog.index');
Route::get('/blog/{blog}', 'Front\BlogController@show')->name('blog.show');

  // Gallery Route
Route::get('/gallery', 'Front\GalleryController@index')->name('gallery.index');

  // Training Route
Route::get('/trainings', 'Front\TrainingController@index')->name('training.index');
Route::get('/training/{training}', 'Front\TrainingController@show')->name('training.show');

  //About Route
Route::get('/about', 'Front\AboutController@index')->name('about');

  //Contact Routes
Route::get('/contact', 'Front\ContactController@index')->name('contact.index');
Route::post('/contact', 'Front\ContactController@submit')->name('contact.submit');
