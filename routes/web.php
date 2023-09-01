<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProdutosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// Exemplo http://localhost:8989/produtos
Route::prefix('produtos')->group( function() {
    Route::get('/', [ProdutosController::class, 'index'])->name('produto.index');
    Route::delete('/delete/{id}', [ProdutosController::class, 'delete'])->name('produto.delete');
    //Cadastro create
    Route::get('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    //Cadastro create
    Route::get('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    Route::put('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');

});

Route::prefix('clientes')->group( function() {
    Route::get('/', [ClientesController::class, 'index'])->name('cliente.index');
    Route::delete('/delete/{id}', [ClientesController::class, 'delete'])->name('cliente.delete');
    //Cadastro create
    Route::get('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    Route::post('/cadastrarCliente', [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    //Cadastro create
    Route::get('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    Route::put('/atualizarCliente/{id}', [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
});

Route::prefix('vendas')->group( function() {
    Route::get('/', [VendasController::class, 'index'])->name('venda.index');
    // Route::delete('/delete/{id}', [VendasController::class, 'delete'])->name('venda.delete');
    // Cadastro create
    Route::get('/cadastrarCliente', [VendasController::class, 'cadastrarVenda'])->name('cadastrar.venda');
    Route::post('/cadastrarCliente', [VendasController::class, 'cadastrarVenda'])->name('cadastrar.venda');
    // Cadastro atualizar
    // Route::get('/atualizarCliente/{id}', [VendasController::class, 'atualizarVenda'])->name('atualizar.venda');
    // Route::put('/atualizarCliente/{id}', [VendasController::class, 'atualizarVenda'])->name('atualizar.venda');
});

