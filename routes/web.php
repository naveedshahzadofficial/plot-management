<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ {
    HomeController,
    UsersController,
    RoleController,
    JobController,
    SpecialEconomicZoneController,
    SezRateController
};

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth'] ] ,function() {

Route::resource('users', UsersController::class);
Route::resource('roles', RoleController::class);
Route::resource('jobs', JobController::class);
Route::resource('special-economic-zones', SpecialEconomicZoneController::class);
Route::resource('special-economic-zones.sez-rates', SezRateController::class);


Route::resource('special_zones', App\Http\Controllers\SpecialAreaZoneController::class);

Route::get('zones', [App\Http\Controllers\SpecialAreaZoneController::class, 'zones'])->name('zones');
Route::delete('zone/delete/{id}', [App\Http\Controllers\SpecialAreaZoneController::class, 'zonesDelete'])->name('zone.delete');
Route::get('zone/create', [App\Http\Controllers\SpecialAreaZoneController::class, 'zoneCreate'])->name('zone.create');
Route::post('zone/store', [App\Http\Controllers\SpecialAreaZoneController::class, 'zoneStore'])->name('zone.store');
Route::get('zone/edit/{id}', [App\Http\Controllers\SpecialAreaZoneController::class, 'zoneEdit'])->name('zone.edit');
Route::put('zone/update/{id}', [App\Http\Controllers\SpecialAreaZoneController::class, 'zoneUpdate'])->name('zone.update');


Route::resource('plots', App\Http\Controllers\PlotsController::class);


Route::get('profile', [App\Http\Controllers\UsersController::class, 'profile'])->name('profile');
Route::post('profile/update', [App\Http\Controllers\UsersController::class, 'profileUpdate'])->name('profile.update');

Route::get('change_password', [App\Http\Controllers\UsersController::class, 'changePassword'])->name('change_password');
Route::post('update_password', [App\Http\Controllers\UsersController::class, 'passwordUpdate'])->name('new_password.update');
Route::get('/job/retry/{id}', function ($id) {

    Artisan::call('config:cache');
    Artisan::queue('queue:restart');

    sleep(2);
    $exitCode = Artisan::call('queue:retry', [
      'id' => $id
  ]);
   return redirect('jobs');
});
});




