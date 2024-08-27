<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Post;
use Inertia\Inertia;

class PostVueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $posts;
    private $user_name;

    public function __construct()
    {
        // 投稿一覧に表示するデータを設定
        $this->posts = Auth::user()->posts()->orderBy('created_at', 'desc')->get();
        $this->user_name = Auth::user()->name;
    }

    public function index()
    {
        return Inertia::render('Posts/Index', [
            'user_name' => $this->user_name,
            'posts' => $this->posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Posts/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->user_id = Auth::id();
        // $post->save();

        return Inertia::render('Posts/Index', [
            'flash_message' => '投稿が完了しました。',
            'user_name' => $this->user_name,
            'posts' => $this->posts,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return Inertia::render('Posts/Show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return Inertia::render('Posts/Index', [
                'error_message' => '不正なアクセスです。',
                'user_name' => $this->user_name,
                'posts' => $this->posts,
            ]);
        }

        return Inertia::render('Posts/Edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return Inertia::render('Posts/Index', [
                'error_message' => '不正なアクセスです。',
                'user_name' => $this->user_name,
                'posts' => $this->posts,
            ]);
        }

        $post->title = $request->input('title');
        $post->content = $request->input('content');
        // $post->save();
        
        return Inertia::render('Posts/Index', [
            'flash_message' => '投稿を編集しました。',
            'user_name' => $this->user_name,
            'posts' => $this->posts,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return Inertia::render('Posts/Index', [
                'error_message' => '不正なアクセスです。',
                'user_name' => $this->user_name,
                'posts' => $this->posts,
            ]);
        }

        // $post->delete();
        
        return Inertia::render('Posts/Index', [
            'flash_message' => '投稿を削除しました。',
            'user_name' => $this->user_name,
            'posts' => $this->posts,
        ]);
    }
}
