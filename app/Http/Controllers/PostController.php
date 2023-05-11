<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = post::all();
        if($posts != null){
            return response()->json(['message'=>'True','data'=>$posts],200);
        }
        return response()->json(['message'=>'No data in database'],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'title'=>'required|max:20',
            'description'=>'min:5',
            'user_id'=>'required',
        ]);
        if($validator->fails()){
            return $validator->errors();
        }
        $post=post::create($validator->Validated());
        return response()->json(['message'=>'create', 'post'=>$post],200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $post = User::find($id)->post;
        return response()->json(['message'=>'create', 'post'=>$post],200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
    }
}
