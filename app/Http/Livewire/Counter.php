<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public  $num = 1;
    public function render()
    {
        return view('livewire.counter');
    }
    public function add()
    {
        return $this->num++;
    }
    public function sub()
    {
        return $this->num--;
    }
}
