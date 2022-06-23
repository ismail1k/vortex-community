<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use Carbon\Carbon;
use Http;
use Auth;
use DB;

class PlayerController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    private static function discord($url){
        $base_api = 'https://discord.com/api/';
        $response = Http::withHeaders([
            'Authorization' => 'Bot '.env('DISCORD_TOKEN'),
        ])->get($base_api.$url);
        return $response->object();
    }

    public function index(Request $request){
        if(isset($request->q)){
            $response = Player::query()
            ->where('username', 'LIKE', "%{$request->q}%")
            ->orWhere('discordname', 'LIKE', "%{$request->q}%")
            ->orWhere('discordid', 'LIKE', "%{$request->q}%")
            ->get();
        } else {
            $response = Player::all();
        }
        $guild_id = env('DISCORD_GUILD_ID');
        $players = [];
        foreach($response as $player){
            array_push($players, (object)[
                'id' => $player->uid,
                'locked' => $player->locked?true:false,
                'username' => $player->username,
                'discord' => (object)[
                    'id' => $player->discordid,
                    'name' => $player->discordname,
                ],
            ]);
        }
        return view('players', [
            'players' => $players,
            'query' => $request->q??'',
        ]);
    }

    public function update(Request $request, $id){
        $response = Player::where('uid', $id)->first();
        $guild_id = env('DISCORD_GUILD_ID');
        if(!$response){
            return abort(404);
        }
        if($request->isMethod('post')){
            $member = is_numeric($request->discordid)?self::discord("guilds/$guild_id/members/".$request->discordid):null;
            if(isset($member->message)){
                return redirect()->back()->with(['response' => 'Error, Discord ID is not valid!']);
            }
            if(Auth::user()->whitelist){
                Player::where('uid', $id)->update([
                    'locked' => $request['locked']?true:false,
                ]);
            }
            if(Auth::user()->ban){
                if($request->banned){
                    $banned = DB::connection('samp')->table('bans')->where('username', $response->username)->first();
                    if($banned){
                        DB::connection('samp')->table('bans')->insert([
                            'username' => $request->username,
                            'ip' => '',
                            'bannedby' => Auth::user()->name,
                            'date' => Carbon::now(),
                            'reason' => null,
                            'permanent' => 0,
                        ]);
                    }
                }
                if(!$request->banned){
                    DB::connection('samp')->table('bans')->where('username', $request->username)->delete();
                }
            }
            Player::where('uid', $id)->update([
                'username' => $request['username'],
                'discordid' => $request['discordid'],
                'discordname' => $member->user->username??null,
            ]);
            return redirect()->back()->with(['response' => 'User updated!']);
        }
        $member = is_numeric($response->discordid)?self::discord("guilds/$guild_id/members/".$response->discordid):null;
        $banned = DB::connection('samp')->table('bans')->where('username', $response->username)->first();
        $player = (object)[
            'id' => $response->uid,
            'username' => $response->username,
            'locked' => $response->locked,
            'banned' => $banned?true:false,
            'discord' => (object)[
                'id' => $response->discordid,
                'name' => @$member->user->username??null,
            ],
        ];
        return view('player-update', compact('player'));
    }
}
