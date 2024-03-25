<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    public function index()
    {
        //
        $all_posts = $this->post->latest()->get();
        return view('post.index')
                ->with('all_posts',$all_posts);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $this->post->title = $request->title;
        $this->post->description = $request->description;
        $this->post->image  = $this->saveImage($request);
        $this->post->user_id = Auth::user()->id;
        $this->post->save();

        return redirect()->route('index');
    }

    public function saveImage($request){
        #chnage the name of the image
        $image_name = time().".".$request->image->extension();
        #1711109761.jpeg
        #upload the image
        $request->image->storeAs('public/images/',$image_name);
        #public/images/1711109761.jpeg

        #return the image name

        return $image_name;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $post = $this->post->findOrFail($id);

        return view('post.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //shows the page
        #UI for edit page is the same as create page

        $post = $this->post->findOrFail($id);

        return view('post.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $post = $this->post->findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        if($request->image){
            $post->image = $this->saveImage($request);
        }
        $post->save();

        return redirect()->route('post.show',$post->id);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $this->post->destroy($id);

        return redirect()->back();
    }
}
