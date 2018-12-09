<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\animation_data;
use App\animation_vote;
use Illuminate\Support\Facades\DB;
class IndexController extends Controller
{
    public function index(Request $request){
        $aniTitle = animation_data::distinct()->get(['ani']);
        $voted_character = [];

        return view('web.index')
            ->with('aniTitle',$aniTitle)
            ->with('voted_character',$voted_character);
    }

    public function rank(Request $request){
        $aniTitle = animation_data::distinct()->get(['ani']);
        $current_ani = $request->ani;
        // $voted_character = animation_vote::where('animation',$current_ani)
        //     ->select('vote',animation_vote::raw('count(*) as total'))
        //     ->groupBy('vote')
        //     ->get();
        $voted_character = DB::table('animation_votes')
            ->where('animation',$current_ani)
            ->select('vote',DB::raw('count(*) as total'))
            ->groupBy('vote')
            ->orderBy('total','desc')
            ->limit(3)
            ->get();
        
        return view("web.index")
            ->with('voted_character',$voted_character)
            ->with('aniTitle',$aniTitle)
            ->with('current_ani',$current_ani);
        
    }
}
