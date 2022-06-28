<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('samp:restart', function(){
    $process = new Process(['kill', '-9', "$(ps ax | grep samp03svr | fgrep -v grep | awk '{ print $1 }')"]);
    $process->run();
    $process = new Process(['cd', '/root/samp', '&&', 'nohup', './samp03svr', '&']);
    $process->run();
    
    $this->info("Server Restarted!");
});