<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CartItemComponent extends Component
{
    protected $listeners = ['refreshCart' => '$refresh'];

    public function deleteCartItem($rowId) {
    
        $this->emitTo('cart-component','delete',$rowId);
    }

    public function render()
    {
        return view('livewire.cart-item-component');
    }
}
