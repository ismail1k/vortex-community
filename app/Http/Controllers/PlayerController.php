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

    public function update(Request $request, $id){
        $player = Player::where('uid', $id)->first();
        if(!$player){
            return abort(404);
        }
        if($request->isMethod('post')){
            Player::where('uid', $id)->update([
                'username' => $request['username'],
                'locked' => $request['locked']?true:false,
                'discordid' => $request['discordid'],
            ]);
            return redirect()->back()->with(['response' => 'User updated!']);
        }
        return view('player-update', compact('player'));
    }
}
