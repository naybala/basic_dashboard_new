<?php

use App\Http\Controllers\LangController;
use BasicDashboard\Web\Auth\Controllers\AuthController;
use BasicDashboard\Web\Dashboard\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

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

require __DIR__ . "/Guest/guestRoute.php";
require __DIR__ . "/Localization/localizationRoute.php";
Route::group(['middleware' => ['auth']], function () {
   Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
   Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
   require __DIR__ . "/User/userRoute.php";
});