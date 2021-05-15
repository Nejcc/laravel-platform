<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    use SEOToolsTrait;

    private $perPage = 25;
    private $cacheSeconds = 5;

    public function index()
    {
        $posts = cache()->remember('posts', $this->cacheSeconds, function () {
            return Post::query()->with('user')->orderByDesc('views')->paginate($this->perPage);
        });

        SEOMeta::setTitle('Posts');
        SEOMeta::setDescription('show all posts of laravel-platform');
        SEOMeta::addMeta('article:published_time', $posts[0]->created_at->toW3CString(), 'property');
//    hidden    SEOMeta::addMeta('article:section', $post->category, 'property');
        SEOMeta::addKeyword(['posts', 'post', 'laravel-platform']);
        $this->seo()->jsonLd()->setType('Posts');

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post, Request $request)
    {
//        After 30 second the view count increment on the user
        cache()->remember('posts.' . $post->slug . '-' . bcrypt($request->ip()), 30, function () use ($post) {
            $post->views = $post->views + 1;
            return $post->save();
        });

        SEOMeta::setTitle($post->name);
        SEOMeta::setDescription(shorten($post->description, 100));
        SEOMeta::addMeta('article:published_time', $post->created_at->toW3CString(), 'property');
//  hidden      SEOMeta::addMeta('article:section', $post->category, 'property');
        SEOMeta::addKeyword(explode('-', $post->slug));
        $this->seo()->jsonLd()->setType('post');

        return view('posts.show', compact('post'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|min:5|max:150|string',
            'content' => 'required|min:5|max:255|string',
            'publish_at' => 'nullable|date',
        ]);

        $post = auth()->user()->posts()->create([
            'name' => $request->input('title'),
            'slug' => Str::slug($request->title),
            'description' => $request->input('content'),
        ]);

        return redirect()->route('posts.show', $post->slug);
    }
}
