<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Board;
use App\Models\Category;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 카테고리 name
        $CateGoryName = DB::table('categories')
        ->select('name', 'id')
        ->orderBy('id','asc')
        ->get();

        // 카테고리 네임 + 보드 정보
        for ($i = 0; $i < count($CateGoryName); $i++) {
            $list = DB::table('categories')
            ->select('name','id')
            ->orderBy('id','asc')
            ->where('categories.no', '=', $i)
            ->get();

            $board = DB::table('boards')
            ->select('boards.title', 'boards.content', 'categories.name', 'boards.hits')
            ->join('categories', 'categories.no', 'boards.categories_no')
            ->where('categories.no', '=', $i)
            ->limit(5)
            ->get();
            
            $result[$i][0]=$list;
            $result[$i][1]=$board;
        }

    return view('list')->with('data', $result);
    }

    public function showTopic($id) {

    $id = Category::find($id);


    // 카테고리 name
    $CateGoryName = DB::table('categories')
    ->select('name', 'id')
    ->orderBy('id','asc')
    ->get();

     // 카테고리 네임 + 보드 정보
    for ($i = 0; $i < count($CateGoryName); $i++) {
        $list = DB::table('categories')
        ->select('name','id','no')
        ->orderBy('id','asc')
        ->where('categories.no', '=', $i)
        ->get();

        $board = DB::table('boards')
        ->select('boards.title', 'boards.content', 'categories.name', 'boards.hits')
        ->join('categories', 'categories.no', 'boards.categories_no')
        ->where('categories.no', '=', $i)
        ->limit(5)
        ->get();
        
        $result[$i][0]=$list;
        $result[$i][1]=$board;
    }

    return view('topic')->with('data', $result)->with('id', $id);
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
}
