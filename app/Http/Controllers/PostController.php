<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;


class PostController extends Controller
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'social_link' => 'nullable|url',
            'content' => 'nullable|string',
            'categories_tags' => 'nullable|string',
            'publish_date' => 'nullable|date',
            'status' => 'required|in:draft,scheduled,published',
            'images' => 'nullable|array',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $validatedData['content'] = $validatedData['content'] ?? ' ';
        $validatedData['publish_date'] = $validatedData['publish_date'] ?? Carbon::now()->format('Y-m-d H:i:s');



        // Crear el post con la fecha de publicación
        $post = Post::create([
            'title' => $validatedData['title'],
            'social_link' => $validatedData['social_link'],
            'content' => $validatedData['content'],
            'publish_date' => $validatedData['publish_date'],
            'status' => $validatedData['status'],
            'user_id' => auth()->id(),
        ]);

        if (!empty($validatedData['categories_tags'])) {
            $terms = explode(',', $validatedData['categories_tags']); // Separar por comas
            foreach ($terms as $term) {
                $trimmedTerm = trim($term);

                // Crear categoría solo si existe en la base de datos
                $category = Category::where('name', $trimmedTerm)->first();
                if ($category) {
                    $post->categories()->attach($category->id);
                } else {
                    // Si no es categoría, la tratamos como etiqueta
                    $tag = Tag::firstOrCreate(['name' => $trimmedTerm]);
                    $post->tags()->attach($tag->id);
                }
            }
        }



        // Guardar imágenes asociadas al post
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('images', 'public');
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
