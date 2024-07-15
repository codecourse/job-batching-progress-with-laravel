<?php

namespace App\Livewire;

use App\Models\Server;
use Illuminate\Support\Facades\Bus;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

class ShowServer extends Component
{
    public Server $server;

    #[Computed()]
    public function batch()
    {
        return $this->server->batch();
    }

    public function destroyServer()
    {
        if (!$batch = $this->batch) {
            return;
        }

        $batch->cancel();

        $this->server->delete();

        return redirect()->route('servers.create');
    }

    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.show-server');
    }
}
