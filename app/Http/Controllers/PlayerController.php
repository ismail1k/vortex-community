<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use Adams\Rcon\Rcon;

class PlayerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $players = Player::all();
        return view('players', compact('players'));
    }

    public function update($id){
        $player = Player::where('uid', $id)->first();
        if(!$player){
            return abort(404);
        }
        return view('player-update', compact('player'));
    }
}
