<?php

namespace App\Http\Controllers;

use App\Models\PostClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postsClient = PostClient::latest()->get();
        return view("postsClient.index", compact("postsClient"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("postsClient.edit");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'bail|required|string|max:255',
            "picture" => 'bail|required|image|max:1024',
            "content" => 'bail|required',
        ]);
    
         $chemin_image = $request->picture->store("postsClient");
    
         $postClient = new PostClient([
            "title" => $request->title,
            "picture" => $chemin_image,
            "content" => $request->content,
        ]);
    
        $postClient->user_id = auth()->id();
        
        $postClient->save();
    
        return redirect(route("postsClient.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostClient  $postClient
     * @return \Illuminate\Http\Response
     */
    public function show(PostClient $postClient)
    {
        return view("postsClient.show", compact("postC"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostClient  $postClient
     * @return \Illuminate\Http\Response
     */
    public function edit(PostClient $postClient)
    {
        return view("posts.edit", compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostClient  $postClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostClient $postClient)
    {
        $rules = [
            'title' => 'bail|required|string|max:255',
            "content" => 'bail|required',
        ];

    
        if ($request->has("picture")) {
          
            $rules["picture"] = 'bail|required|image|max:1024';
        }

        $this->validate($request, $rules);

        // 2. On upload l'image dans "/storage/app/public/posts"
        if ($request->has("picture")) {

            //On supprime l'ancienne image
            Storage::delete($postClient->picture);

            $chemin_image = $request->picture->store("posts");
        }

        // 3. On met à jour les informations du Post
        $postClientC->update([
            "title" => $request->title,
            "picture" => isset($chemin_image) ? $chemin_image : $postClient->picture,
            "content" => $request->content
        ]);

        // 4. On affiche le Post modifié : route("posts.show")
        return redirect(route("posts.show", $postClient));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostClient  $postClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostClient $postClient)
    {
        Storage::delete($postClient->picture);
        $postClient->delete();
        return redirect(route('posts.index'));
    }
}
