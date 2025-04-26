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
        // dd($request->all());
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

        $validatedData['publish_date'] = $request->publish_date ? Carbon::parse($request->publish_date)->format('Y-m-d H:i:s') : Carbon::now()->format('Y-m-d H:i:s');



        // Crear el post con la fecha de publicación
        $post = Post::create([
            'title' => $validatedData['title'],
            'social_link' => $validatedData['social_link'],
            'content' => $validatedData['content'],
            'publication_date' => $validatedData['publish_date'],
            'status' => $validatedData['status'],
            'user_id' => auth()->id(),
        ]);


        if (!empty($validatedData['categories_tags'])) {
            $terms = explode(',', $validatedData['categories_tags']); // Separar por comas
            foreach ($terms as $term) {
                $trimmedTerm = trim($term);

                // Revisar si la etiqueta ya existe
                $tag = Tag::firstOrCreate(['name' => $trimmedTerm]);

                // Asociar la etiqueta al post
                $post->tags()->attach($tag->id);
            }
        }




        // Guardar imágenes asociadas al post
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageFile) {
                $path = $imageFile->store('images', 'public');

                // Asegurarse de que la tabla `images` tenga una columna `post_id`
                $post->images()->create([
                    'path' => $path,
                    'post_id' => $post->id,
                ]);
            }
        }


        return redirect()->route('posts.index')->with('success', 'Post guardado exitosamente.');
    }



    public function index()
    {
        $posts = Post::whereNull('publication_date')
            ->orWhere('publication_date', '<=', now())
            ->latest()
            ->take(5)
            ->get();

        return view('posts.index', compact('posts'));
    }


    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }
}
