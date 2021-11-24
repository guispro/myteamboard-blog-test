<?php

namespace App\Http\Controllers;

use App\Models\Post;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Support\Facades\Http;

class PostController extends Controller
{
    public function index() {

        $user = $id = auth()->user();
        $posts = Post::where('published_by', $user->id)->with('user')->orderBy('published_date','desc')->paginate(10);

        return view('dashboard', compact('posts'));
    }

    public function create() {
        return view('posts');
    }

    public function storage(CreatePostRequest $request) {
        $post = new Post();

        $post->title = $request->title;
        $post->description = $request->description;
        $post->published_by = auth()->user()->id;
        $post->published_date = date('Y-m-d H:i:s');

        $post->save();

        return redirect()->route('dashboard')->with('Post Created!!');
    }

    public function createPostByExternalURL() {
        // $client = new Client();
        // $res = $client->get('https://sq1-api-test.herokuapp.com/posts',[]);

        // $result= $res->getBody();

        $response = Http::get('https://sq1-api-test.herokuapp.com/posts');

        $result = json_decode($response->getBody()->getContents());

        foreach ($result->data as $item) {
            $post = new Post();

            $post->title = $item->title;
            $post->description = $item->description;
            $post->published_by = auth()->user()->id;
            $post->published_date = date('Y-m-d H:i:s',strtotime($item->publication_date));

            $post->save();

        }

        return redirect()->route('dashboard')->with('Post Created!!');
    }

    public function all() {
        $posts = Post::with('user')->orderBy('published_date', 'desc')->paginate(10);
        return view('welcome', compact('posts'));
    }
}
