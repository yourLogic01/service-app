<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title'=> 'required|max:255',
            'slug'=> 'required|unique:posts',
            'body'=> 'required',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg',
        ], [
            'title.required' => 'Judul harus diisi',
            'body.required' => 'Deskripsi harus diisi',
            'thumbnail.required' => 'Thumbnail harus diisi',
            'thumbnail.image' => 'File harus berupa gambar',
            'thumbnail.mimes' => 'File harus berupa jpeg, png, atau jpg',
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);
        $validatedData['thumbnail'] = $request->file('thumbnail')->store('thumbnail-posts', 'public');

        Post::create($validatedData);

        session()->flash('success', 'Post berhasil ditambahkan');
        return redirect()->route('admin.postIndex');
    }

    /**
     * Display the specified resource.
     */
    public function show($id, Comment $comment)
    {
        $post = Post::find($id);

        if (!$post || $post->user_id != auth()->user()->id) {
            return view('admin.404');
        }
        
        return view('dashboard.posts.detail', [
            "comments" => $comment->where('post_id', $post->id)->orderBy('created_at', 'asc')->get(),
        ], compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::find($id);

        if (!$post || $post->user_id != auth()->user()->id) {
            return view('admin.404');
        }

        return view('dashboard.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'title' => 'required',
            'body' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg',
        ];
        
        $customMessages = [
            'title.required' => 'Judul harus diisi',
            'body.required' => 'Deskripsi harus diisi',
            'thumbnail.image' => 'File harus berupa gambar',
            'thumbnail.mimes' => 'File harus berupa jpeg, png, atau jpg',
        ];
        
        $request->validate($rules, $customMessages);
        
        $post = Post::find($id);
        
        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
            $request->validate(['slug' => 'required|unique:posts'], ['slug.required' => 'Slug harus diisi']);
        }
        

        if ($request->hasFile('thumbnail')) {
            // Hapus gambar lama dari sistem penyimpanan
            if ($post->thumbnail) {
                Storage::disk('public')->delete($post->thumbnail);
            }

            // Simpan gambar baru dan dapatkan path-nya
            $thumbnailPath = $request->file('thumbnail')->store('thumbnail-posts', 'public');
            $post->thumbnail = $thumbnailPath;
        }


        $post->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body,
            'user_id' => $request->user_id,
        ]);

        session()->flash('success', 'Data postingan berhasil diperbarui');
        return redirect()->route('admin.postIndex');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (!$post) {
            session()->flash('error', 'Postingan tidak ditemukan');
            return redirect()->back();
        }

        // Hapus file gambar dari penyimpanan
        if ($post->thumbnail != null) {
            Storage::disk('public')->delete($post->thumbnail);
        }

        $post->delete();
        session()->flash('success', 'Data postingan berhasil dihapus');
        return redirect()->route('admin.postIndex');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
