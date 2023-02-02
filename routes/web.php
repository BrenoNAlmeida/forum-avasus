<?php
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Route;
use Mockery\Generator\Parameter;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubForumController;
use App\Http\Controllers\AlunoSubforumController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RespostaController;
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

    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('dashboard');
});

Route::get ('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Rotas de dashboard de acordo com o tipo de usuário logado
Route::get('/dashboard-aluno', [DashboardController::class, 'aluno'])->name('dashboard-aluno')->middleware('auth');
Route::get('/dashboard-professor', [DashboardController::class, 'professor'])->name('dashboard-professor')->middleware('auth');
Route::get('/dashboard-superuser', [DashboardController::class, 'superuser'])->name('dashboard-superuser')->middleware('auth');


//Rotas de subforum
Route::get('/{subforum}/subforum', [subforumController::class, 'show'])->name('subforum');
Route::get('/{subforum}/detalhes-subforum', [subforumController::class, 'detalhar'])->name('detalhes-subforum')->middleware('professor-autenticado');
Route::post('/cadastrar-subforum', [SubForumController::class, 'criar'])->name('cadastrar-subforum')->middleware('professor-autenticado');
Route::post('/apagar-subforum/{id}', [SubForumController::class, 'apagar'])->name('apagar-subforum')->middleware('superuser-autenticado');


//Rotas de vinculação de alunos com subforum
Route::get('/{subforum}/vincular', [AlunoSubforumController::class, 'show'])->name('vincular-alunos')->middleware('professor-autenticado');
Route::post('/vincular', [AlunoSubforumController::class, 'vincular'])->name('vincular')->middleware('professor-autenticado');
Route::post('/desvincular', [AlunoSubforumController::class, 'desvincular'])->name('desvincular')->middleware('professor-autenticado');

//Rotas de post
Route::put('/trancar/{id}', [PostController::class, 'trancar'])->name('trancar')->middleware('professor-autenticado');
Route::put('/destrancar/{id}', [PostController::class, 'destrancar'])->name('destrancar')->middleware('professor-autenticado');
Route::post('/criar-post', [PostController::class, 'criar_post'])->name('criar-post')->middleware('auth');
Route::post('/cadastrar-resposta', [PostController::class, 'criarResposta'])->name('cadastrar-resposta')->middleware('auth');

//Rotas das respostas
Route::get('/{post}/responder-topico', [RespostaController::class, 'show'])->name('responder-topico')->middleware('auth');
Route::post('/cadastrar-resposta', [RespostaController::class, 'store'])->name('cadastrar-resposta')->middleware('auth');

require __DIR__.'/auth.php';