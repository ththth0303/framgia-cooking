<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UnitRequest;
use App\User;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Cooking;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user =  User::paginate(1);
        // return response()->json($user);
        // dd($user);
        $response = [
            'pagination' => [
                'total'        => $user->total(),
                'per_page'     => $user->perPage(),
                'current_page' => $user->currentPage(),
                'last_page'    => $user->lastPage(),
                'from'         => $user->firstItem(),
                'to'           => $user->lastItem()
            ],
            'data' => $user
        ];
        // return response()->json($response);
        $cmt = Comment::find(2);
        // dd($cmt);
        // dd($cmt->commentTable);
         $post = Post::where('id', 1)->with('comments')->get();
        // dd($post);
       dd($post);
        return view('index');
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function relation()
    {
        $post = Post::find(1);
        // dd($post);
        dd ($post->comments);
    }
}
