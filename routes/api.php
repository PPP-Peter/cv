<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\v1'], function () {

    // SKILLS
    Route::group(['prefix' => 'skill'], function () {
            Route::get('/index', 'SkillController@index')->name('skillIndex');
            Route::get('/{slug}', 'SkillController@show')->name('skillShow');
    });

    // TOOLS
    Route::group(['prefix' => 'tool'], function () {
        Route::get('/index', 'ToolController@index')->name('toolIndex');
        Route::get('/{slug}', 'ToolController@show')->name('toolShow');
    });

    // JOBS
    Route::group(['prefix' => 'job'], function () {
        Route::get('/index', 'JobController@index')->name('jobIndex');
        Route::get('/{slug}', 'JobController@show')->name('jobShow');
    });

    // CERTIFICATE
    Route::group(['prefix' => 'certificate'], function () {
        Route::get('/index', 'CertificateController@index')->name('certificateIndex');
        Route::get('/{slug}', 'CertificateController@show')->name('certificateShow');
    });

    // PROFIL
    Route::group(['prefix' => 'profil'], function () {
        Route::get('/index', 'ProfilController@index')->name('profilIndex');
        Route::get('/{slug}', 'ProfilController@show')->name('profilShow');
    });

});

//Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\v1'], function (): void {
//    Route::group(['prefix' => 'skill'], function () {
//        Route::get('/index', [\App\Http\Controllers\PositionController::class, 'indexNotLogged'])->name('positionIndex');
////        Route::get('/company/{companyId}/address', 'CompanyController@getAddressByCompanyId');
////        Route::get('/customer/{customerId}/address/main', 'CustomerController@getCustomerMainAddress');
//    });
//});
