<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'social_link' => 'nullable|url',
            'content' => 'nullable|string',
            'categories' => 'nullable|string',
            'tags' => 'nullable|string',
            'publish_date' => 'nullable|date',
            'status' => 'required|in:draft,scheduled,published',
        ]);

        // Guardar el post
        $post = Post::create([
            'title' => $validatedData['title'],
            'social_link' => $validatedData['social_link'],
            'content' => $validatedData['content'],
            'status' => $validatedData['status'],
        ]);

        // Guardar categorías
        if (!empty($validatedData['categories'])) {
            $categories = explode(',', $validatedData['categories']); // Separar por comas
            foreach ($categories as $categoryName) {
                $category = Category::firstOrCreate(['name' => trim($categoryName)]);
                $category->posts()->save($post);
            }
        }

        // Guardar etiquetas
        if (!empty($validatedData['tags'])) {
            $tags = explode(',', $validatedData['tags']); // Separar por comas
            foreach ($tags as $tagName) {
                Tag::firstOrCreate(['name' => trim($tagName)]);
            }
        }

        // Guardar imágenes
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('images', 'public'); // Almacena la imagen en el sistema de archivos
                $post->images()->create(['path' => $path]);
            }
        }

        return redirect()->route('posts.index')->with('success', 'Post guardado exitosamente.');
    }

    public function index()
    {
        $posts = Post::all(); // Obtén todos los posts
        return view('posts.index', compact('posts')); // Retorna una vista
    }
}
