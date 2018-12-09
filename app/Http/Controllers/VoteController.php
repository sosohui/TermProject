<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\animation_data;
use App\animation_vote;
use Auth;
class VoteController extends Controller
{
    //투표페이지 출력
    function index(Request $request){
        $current_ani = $request->ani;
        $character = animation_data::where('ani',$current_ani)->get();
        $aniTitle = animation_data::distinct()->get(['ani']);
        $checked = animation_vote::where('id',Auth::user()['id'])->where('animation',$current_ani)->get();

        
        return view("web.animation")
            ->with('character',$character)
            ->with('aniTitle',$aniTitle)
            ->with('checked',$checked)
            ->with('current_ani',$current_ani);
    }


    //투표 내용 db에 저장
    function vote(Request $request){
        $current_ani = $request->ani;
        $checked = animation_vote::where('id',Auth::user()['id']);
        if($checked){
            $checked->where('animation',$current_ani);
        }else{
            $checked = [];
        }
        if(count($checked->get()) < 1){
            $vote = new animation_vote;
            $vote->id = Auth::user()['id'];
            $vote->animation = $request->ani;
            $vote->vote = $request->selectedName;
            $vote->save();
        }else{}
        return redirect("/animation/$request->ani");
    }

    //득표 수 출력
    // function rank(){
    //     $ranking = 
    // }
}
