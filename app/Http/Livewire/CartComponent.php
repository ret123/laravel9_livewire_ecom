<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartComponent extends Component
{
    protected $listeners = ['delete'];
    
    public function increase($rowId) {

        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-item-component','refreshCart');
    }

    public function decrease($rowId) {

        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-item-component','refreshCart');
    }

    public function delete($id) {
        Cart::instance('cart')->remove($id);
        session()->flash('success_message','Item has been removed fom the Cart');
        $this->emitTo('cart-item-component','refreshCart');
    }

    public function clearCart() {
        Cart::instance('cart')->destroy();
        $this->emitTo('cart-item-component','refreshCart');
    }

    public function render()
    {
        return view('livewire.cart-component');
    }
}
