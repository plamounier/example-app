<?php

use Illuminate\Support\Facades\Route;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PdfController;


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

Route::get('/home', function () {
    return view('home');
});

// Rota de criação de produto
Route::post('/cadastrar-produto', function(Request $request) {

    //Criando produto no BD
    Produto::create([
        'nome' => $request->name
    ]);

    echo "Produto criado com sucesso!";
});

//Rota de leitura de produto
Route::get('/listar-produto/{id}', function($id) {
    $produto = Produto::find($id);
    return view('listar-produto'. ['produto'=> $produto]);
});

//Rota de edição de produto
Route::post('/editar-produto/{id}', function(Request $request, $id) {

    $produto = Produto::find($id);
    //Editando produto no BD
    $produto->update([
        'nome' => $request->name
    ]);
    echo "Produto editado com sucesso!";
});

//Rota de exclusão de produto
Route::get('/excluir-produto/{id}', function($id) {

    $produto = Produto::find($id);
    $produto->delete;
    
    echo "Produto excluído com sucesso!";
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('pdf', [App\Http\Controllers\PdfController::class, 'geraPdf'])->name('pdf');


Route::resources([
    'products'=>ProductController::class,
    'tags'=>TagController::class,
]);

