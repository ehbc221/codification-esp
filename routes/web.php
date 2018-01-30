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

Route::get('/accueil', function () {
    return view('welcome');
})->name('accueil');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Student Routes
 */
Route::group(['prefix' => 'etudiant', 'as' => 'student.', 'namespace' => 'Student', 'middleware' => ['role:student']], function () {

    // Dashboard
    Route::get('/', 'DashboardController');
    Route::get('dashboard', 'DashboardController')->name('dashboard');

    Route::resource('codifications', 'CodificationController');
    Route::resource('echanges', 'ExchangeController');
    Route::resource('profil', 'ProfileController', ['only' => ['show', 'edit', 'update']]);
    Route::resource('reservations', 'ReservationController');

});

/**
 * Admin Routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['role:admin']], function () {

    // Dashboard
    Route::get('/', 'DashboardController');
    Route::get('dashboard', 'DashboardController')->name('dashboard');

    Route::resource('admins', 'AdminController', ['except' => 'edit', 'update', 'destroy']);
    Route::resource('batiments', 'BlockController');
    Route::resource('directeurs-batiment', 'BlockDirectorController');
    Route::resource('codifications', 'CodificationController');
    Route::resource('periodes-codifications', 'CodificationPeriodeController');
    Route::resource('concierges-batiments', 'ConciergeBlockController');
    Route::resource('concierges', 'ConciergeController');
    Route::resource('contraintes', 'ConstraintController');
    Route::resource('departements', 'DepartmentController');
    Route::resource('echanges', 'ExchangeController');
    Route::resource('etages', 'FloorController');
    Route::resource('formations', 'FormationController');
    Route::resource('niveaux', 'GradeController');
    Route::resource('couloirs', 'LaneController');
    Route::resource('positions', 'PositionController');
    Route::resource('profil', 'ProfileController', ['only' => ['show', 'edit', 'update']]);
    Route::resource('reservations', 'ReservationController');
    Route::resource('chambres', 'RoomController');
    Route::resource('etudiants', 'StudentController', ['only' => ['index', 'show']]);
});
