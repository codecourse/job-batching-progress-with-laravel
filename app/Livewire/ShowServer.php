<?php

namespace App\Livewire;

use App\Models\Server;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowServer extends Component
{
    public Server $server;

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.show-server');
    }
}
