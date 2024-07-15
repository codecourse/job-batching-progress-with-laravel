<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerTask extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
