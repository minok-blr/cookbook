<?php

namespace App\Http\Controllers;

use App\Models\Ingredient;
use App\Models\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use function PHPUnit\Framework\exactly;

class PostsController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(){
        $data = request()->validate([
            'title' => 'required',
            'prep' => 'required',
            'image' => ['required', 'image'],
            'ing' => 'required',
            'units' => 'required'
        ]);


        //auth()->user()->posts()->create($data);
        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(800, 800);
        $image->save();

        $last_post_id = auth()->user()->posts()->create([
            'title' => $data['title'],
            'description' => $data['prep'],
            'image' => $imagePath
        ])->id;

        // go through list of ingredients
        // get their ids and save as array
        // indexes will match the quantity and units

        $ings = $data['ing'];
        $delimiter = ' ';
        $words = explode($delimiter, $ings);
        //dd($words);

        $units = $data['units'];
        // eg. 200 g, 300 g
        $words_quantity = explode($delimiter, $units);


        $post = Post::find($last_post_id);
        $ingsIDs = [];
        foreach ($words as $ing){
            $ingsIDs [] = Ingredient::where('name', '=', $ing)->first()->id;
        }

        //dd($ingsIDs);

        $i = 0;
        foreach ($ingsIDs as $id){
            $post->hasIngs()->attach($id, array('quantity'=>$words_quantity[$i], 'unit'=>$words_quantity[$i+1]));
            $i=$i+2;
        }
        return redirect('home');
    }

    public function myposts(){
        return view('posts.myposts', [
            'posts'=> \App\Models\Post::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get()
        ]);
    }

    public function show(\App\Models\Post $id){
        return view('posts.show', compact('id'));
    }

    public function delete($id){
        \App\Models\Post::find($id)->delete();
        /*return response()->json([
            'success'=>'Record deleted successfully'
        ]);*/
        return $this->myposts();
    }
}
