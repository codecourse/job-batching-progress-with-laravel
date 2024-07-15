<?php

namespace App\Models;

use App\Observers\ServerObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[ObservedBy([ServerObserver::class])]
class Server extends Model
{
    use HasFactory;

    protected $guarded = false;
}
