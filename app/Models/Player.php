<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;
    protected $connection = 'samp';
    protected $table = 'users';
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'username',
        'locked',
        'adminlevel',
        'locked',
        'discordid',
    ];
}
