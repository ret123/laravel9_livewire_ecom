<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

use Gloudemans\Shoppingcart\Facades\Cart;

class ProductComponent extends Component
{

    public $slug;

    public function mount($slug) {
        $this->slug = $slug;
    }

    public function store($product_id,$product_name,$product_price) {

        Cart ::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        session()->flash('success_message','Item added in the Cart');
        $this->emitTo('cart-item-component','refreshCart');
        return redirect()->route('shop.cart');
    }

    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();

        $relatedProducts = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(4)->get();
        $newProducts = Product::latest()->take(3)->get();

        return view('livewire.product-component', ['product' => $product,'relatedProducts'=> $relatedProducts,'newProducts' => $newProducts]);
    }
}
