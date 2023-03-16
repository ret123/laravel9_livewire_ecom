<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class WishListComponent extends Component
{

    public function removeFromWishlist($product_id) {
       
        foreach(Cart::instance('wishlist')->content() as $item) {
            if($item->id == $product_id) {
                Cart::instance('wishlist')->remove($item->rowId);
                // session()->flash('success_message','Item has been removed fom the Wishlist');
                $this->emitTo('wish-list-item-component','refreshCart');
                return;
            }
        }
    }

    public function render()
    {
        return view('livewire.wish-list-component');
    }
}
