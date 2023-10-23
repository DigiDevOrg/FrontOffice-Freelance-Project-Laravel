<?php

namespace App\Http\Controllers;

    use App\Models\Review;
    use Illuminate\Http\Request;

    class ReviewController extends Controller
    {
        public function index()
        {
            $reviews = Review::latest()->get();
            return view("reviews.index", compact("reviews"));  
        }

        public function read()
        {
            $reviews = Review::latest()->get();
            return view("reviews.read", compact("reviews"));  
        }
        
        public function create()
        {
            return view("reviews.edit");
        }

    
        public function store(Request $request)
        {
            /// 1. La validation
            $this->validate($request, [
                'rating' => 'bail|required|int|max:255',
                "comment" => 'bail|required',
            ]);
        
        
            // 3. On enregistre les informations du Post
            $review = new Review([
                "rating" => $request->rating,
                "comment" => $request->comment,
            ]);
        
            // Associate the post with the currently authenticated user
            $review->author_id = auth()->id();
            $review->setAttribute('freelancerId', 2);
            $review->save();
        
            // 4. On retourne vers tous les posts : route("posts.index")
            return redirect(route("reviews.index"));
        }

    
        public function show(Review $review)
        {
            return view("reviews.show", compact("review"));
        }

        public function edit(Review $review)
        {
            return view("reviews.edit", compact("review"));
        }

    
        public function update(Request $request, Review $review)
        {
            // 1. La validation

            // Les règles de validation pour "title" et "content"
            $rules = [
                'rating' => 'bail|required|int|max:255',
                "comment" => 'bail|required',
            ];

            $this->validate($request, $rules);
            // 3. On met à jour les informations du Post
            $review->update([
                "rating" => $request->rating,
                "comment" => $request->comment
            ]);

            // 4. On affiche le Post modifié : route("posts.show")
            return redirect(route("reviews.show", $review));
    
        }

        
        public function destroy(Review $review)
        {
        
            // On les informations du $post de la table "posts"
            $review->delete();

            // Redirection route "posts.index"
            return redirect(route('reviews.index'));
        }
    }
