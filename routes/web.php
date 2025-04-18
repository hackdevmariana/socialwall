<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request; // Importamos Request
use Inertia\Inertia;
use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Tag;

// Ruta para listar los posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

Route::get('/api/suggestions', function (Request $request) {
    $query = $request->query('query');
    $tags = $query ? Tag::where('name', 'LIKE', "%$query%")->pluck('name') : Tag::pluck('name');
    return response()->json($tags->toArray());
});

// Ruta para crear una nueva etiqueta
Route::post('/api/add-suggestion', function (Request $request) {
    $name = $request->json('name');

    if (!Tag::where('name', $name)->exists()) {
        Tag::create(['name' => $name]);
    }

    return response()->json(['status' => 'success', 'message' => 'Etiqueta creada']);
});

// Página de inicio
Route::get('/', function () {
    return view('home');
})->name('home');

// Dashboard del usuario con autenticación
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Grupo de rutas para usuarios autenticados
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Autenticación
require __DIR__ . '/auth.php';
