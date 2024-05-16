<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Mail\BlogPosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (!Auth::check()) {
            return redirect('login');
        }

        return view('blog.index', [
            'blogs' => Blog::all(),
            'title' => 'Home'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create', [
            'title' => 'Buat Postingan'
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
        if (!Auth::check()) {
            return redirect('login');
        }

        $data = $request->validate([
            'title' => 'required|unique:blogs,title',
            'slug' => ['required', 'unique:blogs,slug', 'regex:/^[^\s]+$/'],
            'author' => 'required',
            'content' => 'required'
        ]);

        $data['title'] = ucwords($data['title']);
        $data['author'] = ucwords($data['author']);
        $blog = Blog::create($data);

        $email = Mail::to('Admin@gmail.com')->send(new BlogPosted);
        return redirect('blog');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $comment = $blog->comment()->get();
        $total_comment = $blog->total_comments();
        return view('blog.show', [
            'blog' => $blog,
            'comment' => $comment,
            'total_comment' => $total_comment,
            'title' => 'Blog'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('blog.edit', [
            'blog' => $blog,
            'title' => 'Edit Post'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title' => 'required',
            'slug' => ['required', 'regex:/^[^\s]+$/'],
            'author' => 'required',
            'content' => 'required'
        ]);

        $data['title'] = ucwords($data['title']);
        $data['author'] = ucwords($data['author']);

        $blog->update($data);

        return redirect('blog');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        Blog::destroy('id', $blog->id);

        return redirect('blog');
    }
}
