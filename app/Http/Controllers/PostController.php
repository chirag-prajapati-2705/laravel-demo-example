<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostForm;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Category;
use App\Models\Images;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    const CREATE_SUCCESS = 'Post has been successfully created!';
    const UPDATE_SUCCESS = 'Post has been successfully updated!';

    protected $user_repo;
    protected $category_repo;

    public function __construct(UserRepositoryInterface $user_repo,CategoryRepositoryInterface $category_repo)
    {
        $this->user_repo = $user_repo;
        $this->category_repo  = $category_repo;
    }

    public function index()
    {

        // $image = Images::with('imageable')->get();
        // dd($image);
        $categories = $this->category_repo->all();
        $relationship = ['image'];
        $posts =Post::with($relationship)->paginate(10);
        return view('post.index',compact('categories'))->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$messages = Session::get('messages', []);
        $categories = $this->category_repo ->all();
        return view('post.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostForm $request)
    {
        $validated = $request->validated();

        $file = $request->file('post_image');
        Storage::disk('local')->put($file->getClientOriginalName(),file_get_contents($file));
        $post_data = $request->except(['_token']);
        $post = app()->make(Post::class);
        $post->user_id = 1;
        $post->title = $request->input('title');
        $post->slug = $request->input('slug').rand();
        $post->content = $request->input('content');
        $post->is_active = 0;
        //$post->saveQuietly();
        $post->save();
        $post->categories()->attach($request->get('categories'));
        // $image = app()->make(Images::class);
        // $image->url= $file->getClientOriginalName();
        $post->image()->create(['url'=> $file->getClientOriginalName()]);

        return redirect()->back()->with('success', self::CREATE_SUCCESS);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('post.show');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('post.edit')->with('categories',$categories)->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::where('id', $id)->delete();
        return redirect()->back();
    }
}
