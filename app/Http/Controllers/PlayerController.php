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

    private static function discord($id){
        $authToken = "OTgyMzYzMjM2NDI0ODgwMTM4.GQ6xnR.oQ6-ULWT2_1uy-05Vq_6gkCncaqe8Fq-Dl6PIw";
        $url="https://discordapp.com/api/v6/users/@me/guilds";
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL            => $url,
            CURLOPT_HTTPHEADER     => array('Authorization: Bearer '.$authToken),
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_VERBOSE        => 1,
            CURLOPT_SSL_VERIFYPEER => 0,
        ));
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    public function index(){
        $players = Player::all();
        $response = [];
        foreach($players as $player){
            dd(self::discord($player->discordid));
            array_push($response, (object)[
                'id' => $player->uid,
                'status' => 'N/A',
                'username' => $player->username,
                'discord' => (object)[
                    'id' => '',
                    'name' => '',
                ],
            ]);
        }
        return view('players', compact('response'));
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
