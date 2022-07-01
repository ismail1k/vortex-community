<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Logger;

class EventController extends Controller
{
    public function discord(Request $request){
        if($request->action == 'left'){
            Player::where('discordid', $request->discordid)->update([
                'locked' => 1,
            ]);
            Logger::create([
                'actionby' => 'BOT: discord-api Event',
                'description' => 'Unwhitelist player. for reason: Member left server.',
            ]);
            return response()->json(['status' => 200]);
        }

        if($request->action == 'join'){
            Player::where('discordid', $request->discordid)->update([
                'locked' => 0,
            ]);
            Logger::create([
                'actionby' => 'BOT: discord-api Event',
                'description' => 'Whitelist player. for reason: Member Join server.',
            ]);
            return response()->json(['status' => 200]);
        }
        return response()->json(['status' => 404]);
    }
}
