<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;

class Project extends Component
{
    public int $projectId;


    public function render()
    {
        return view('livewire.project');
    }

    public function mount($id)
    {
        $this->projectId = $id;
    }
}
