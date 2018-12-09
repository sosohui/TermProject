<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\animation_data;
use App\Character;
use Auth;

class CharacterController extends Controller
{
    //
    public function index(Request $request){
        $current_ani = $request->ani;
        $character = $request->char;
        $aniTitle = animation_data::distinct()->get(['ani']);
        $ani_characters = animation_data::where("ani",$current_ani)->get();
        $character_info = Character::where("name",$character)->get();

        return view('web.character')
            ->with('current_ani',$current_ani)
            ->with('aniTitle',$aniTitle)
            ->with('character',$character)
            ->with('ani_characters',$ani_characters)
            ->with('character_info',$character_info[0]);
    }
    
    //!!!!!!!!!!!검색값이 다를 경우 if,else 넣어주기!!
    public function search(Request $request){
        $search_character = $request->search_character;
        $character_info = Character::where("name",$search_character)->first();
        if($character_info){
            return redirect("animation/$character_info->animation/$character_info->name");
        }else{
            return back()->withInput();
        }
    }
}
