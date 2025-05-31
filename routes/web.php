<?php



use App\Http\Controllers\FormBuilderController;
use App\Http\Controllers\FormsController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Artisan;

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;


// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/', [App\Http\Controllers\FormBuilderController::class, 'index'])->name('home');








// Start Form Builder===============================================================
// Step 1
Route::get('form-builder', [FormBuilderController::class, 'index']);
Route::get('form-builder-create', [FormBuilderController::class, 'createForm']);
// Step 2
Route::view('formbuilder', 'FormBuilder.create');
// Step 3
Route::post('save-form-builder', [FormBuilderController::class, 'create']);
// Step 4
Route::delete('form-delete/{id}', [FormBuilderController::class, 'destroy']);

// Step 5
Route::view('edit-form-builder/{id}', 'FormBuilder.edit');
Route::get('get-form-builder-edit', [FormBuilderController::class, 'editData']);
Route::post('update-form-builder', [FormBuilderController::class, 'update']);

// Step 6
Route::view('read-form-builder/{id}', 'FormBuilder.read');
Route::get('get-form-builder', [FormsController::class, 'read']);
Route::post('save-form-transaction', [FormsController::class, 'create']);
