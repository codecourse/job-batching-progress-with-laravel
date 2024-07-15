<?php

namespace App\Models;

use App\Server\States\ServerTaskState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\ModelStates\HasStates;

class ServerTask extends Model
{
    use HasFactory;
    use HasStates;

    protected $casts = [
        'state' => ServerTaskState::class,
    ];

    protected $guarded = false;

    public function server()
    {
        return $this->belongsTo(Server::class);
    }
}
