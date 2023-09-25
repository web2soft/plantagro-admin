<?php

namespace App\Livewire;

use App\Models\Quote;
use Livewire\Component;

class Front extends Component
{
    public $quote;
    public function render()
    {
        $this->quote = Quote::first();

        $this->dispatch('js-refresh');
        return view('livewire.front');
    }
}
