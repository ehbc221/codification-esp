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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**
 * Admin Routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'milldeware' => 'admin'], function () {
    Route::resource('batiments', 'BlockController', ['as' => 'blocks.']);
    Route::resource('directeurs-batiment', 'BlockDirectorController', ['as' => 'block-directors.']);
    Route::resource('codifications', 'CodificationController', ['as' => 'codifications.']);
    Route::resource('codifications', 'CodificationPeriodeController', ['as' => 'codifications-periodes.']);
    Route::resource('concierges-batiments', 'ConciergeBlockController', ['as' => 'concierges-blocks.']);
    Route::resource('concierges', 'ConciergeController', ['as' => 'concierges.']);
    Route::resource('contraintes', 'ConstraintController', ['as' => 'constraints.']);
    Route::resource('departements', 'DepartmentController', ['as' => 'departments.']);
    Route::resource('echanges', 'ExchangeController', ['as' => 'exchanges.']);
    Route::resource('etages', 'FloorController', ['as' => 'floors.']);
    Route::resource('formations', 'FormationController', ['as' => 'formations.']);
    Route::resource('niveaux', 'GradeController', ['as' => 'grades.']);
    Route::resource('couloirs', 'LaneController', ['as' => 'lanes.']);
    Route::resource('positions', 'PositionController', ['as' => 'positions.']);
    Route::resource('reservations', 'ReservationController', ['as' => 'reservations.']);
    Route::resource('chambres', 'RoomController', ['as' => 'rooms.']);
    Route::resource('etudiants', 'StudentController', ['as' => 'students.']);
    Route::resource('utilisateurs', 'UserController', ['as' => 'users.']);
});
