<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\mitra;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;

class MitraBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $mitra = mitra::where('user_id',auth()->user()->id)->first();
        $id = $mitra->id;
        return view('mitra.blog.blogs', [
            "title" => "Blog Saya",
            'posts' => blog::where('user_id', $id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mitra.blog.create', [
            "title" => "Blog Saya",
            'posts' => blog::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
 
        
        $validatedData = $request->validate([
            'judul' => 'required|max:255',
            'slug' => 'required|unique:blogs',
            'image' => 'image|file|max:5024',
            'body' => 'required',
        ]);
        // $validatedData['image'] =$request->file('image')->store('post-images');
        // $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = Str::limit(strip_tags($request->body, 200));
        // $addData = [
        //     'user_id' => auth()->user()->id,
        //     'judul' => $request->judul,
        //     'slug' => $request->slug,
        //     'excerpt' => Str::limit(strip_tags($request->body, 200)),
        //     'body' => $request->body
        // ];
            $user = mitra::where('user_id', auth()->user()->id)->first();
        blog::create([
            'user_id' => $user->id,
            'judul' => $request->judul,
            'slug' => $request->slug,
            'excerpt' => Str::limit(strip_tags($request->body, 200)),
            'image' => $request->file('image')->store('post-image'),
            'body' => strip_tags($request->body)
        ]);

        return redirect('/m/blog')->with('success', 'Berhasil menambahkan blog!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        return view('mitra.blog.show', [
            'post' => $blog,
            'title' => $blog->judul,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog)
    {
        return view('mitra.blog.edit', [
            'title' => $blog->judul,
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, blog $blog)
    {
        $rules = [
            'judul' => 'required|max:255',
            'image' => 'image|file|max:5024',
            'body' => 'required',
        ];

        if ($request->slug != $blog->slug) {
            $rules['slug'] = 'required|unique:blogs';
        }
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            
            $user = mitra::where('user_id', auth()->user()->id)->first();
        }
        if($request->file('image')){
        }
        $validatedData = $request->validate($rules);
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('post-image');
        }
        $validatedData['user_id'] = $user->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body, 200));
        blog::Where('id', $blog->id)
            ->update($validatedData);;

        return redirect('/m/blog')->with('success', 'Berhasil mengedit blog!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog)
    {
        if($blog->image){
            Storage::delete($blog->image);
        }
        blog::destroy($blog->id);

        return redirect('/m/blog')->with('success', 'Berhasil menghapus blog!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(blog::class, 'slug', $request->title);

        return response()->json(['slug' => $slug]);
    }
}
