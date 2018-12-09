<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\animation_data;
use App\Board;
use Auth;

class BoardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $page = $request->get('page');
        $msgs = Board::orderBy('id','desc')->paginate(10);
        $aniTitle = animation_data::distinct()->get(['ani']);
        return view('web.board')
            ->with('aniTitle',$aniTitle)
            ->with('msgs',$msgs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $aniTitle = animation_data::distinct()->get(['ani']);
        return view('web.write')
            ->with('aniTitle',$aniTitle);
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
        $title = $request->title;
        $writer = Auth::user()['name'];
        $content = $request->content;

        Board::create([
            'title'=>$title,
            'writer'=>$writer,
            'content'=>$content,
        ]);

        return redirect('/board');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $aniTitle = animation_data::distinct()->get(['ani']);
        $id = $request->board;
        $msg = Board::find($id);
        
        $msg->update([
            'hits'=>$msg->hits+1
        ]);

        return view('web.view')
            ->with('msg',$msg)
            ->with('aniTitle',$aniTitle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
        $aniTitle = animation_data::distinct()->get(['ani']);
        $id = $request->board;
        $row = Board::find($id);

        return view('web.modify')
            ->with('aniTitle',$aniTitle)
            ->with('row',$row);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $id = $request->board;
        $title = $request->title;
        $writer = $request->writer;
        $content = $request->content;

        $msg = Board::find($id);
        $msg->update([
            'title' => $title,
            'writer' => $writer,
            'content' => $content,
        ]);

        return redirect()->route('board.store',['id'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->board;
        $msg = Board::find($id);
        $msg->delete();

        return redirect('/board');
    }
}
