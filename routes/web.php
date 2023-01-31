<?php
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Route;
use Mockery\Generator\Parameter;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubForumController;

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
    return view('dashboard');
});

Route::get ('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard-aluno', [DashboardController::class, 'aluno'])->name('dashboard-aluno');
Route::get('/dashboard-professor', [DashboardController::class, 'professor'])->name('dashboard-professor');
Route::get('/dashboard-superuser', [DashboardController::class, 'superuser'])->name('dashboard-superuser');
Route::get('/{subforum}/subforum', [subforumController::class, 'store'])->name('subforum');


require __DIR__.'/auth.php';
