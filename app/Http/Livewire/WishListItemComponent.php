<?php

namespace App\Http\Livewire;

use Livewire\Component;

class WishListItemComponent extends Component
{
    protected $listeners = ['refreshCart' => '$refresh'];
    
    public function render()
    {
        return view('livewire.wish-list-item-component');
    }
}
