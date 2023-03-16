<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Category;

class ShopComponent extends Component
{
    public $perPage = 9;
    public $orderBy = 'DS';

    public $min_value = 0;
    public $max_value = 1000;

    public function changePageSize($size) {
        $this->perPage = $size;
    }

    public function changeOrder($order) {
       
        $this->orderBy = $order;
    }

    public function loadMore() {
        $this->perPage += 9;
    }

    public function store($product_id,$product_name,$product_price) {

        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        $this->emitTo('cart-item-component','refreshCart');
        return redirect()->route('shop.cart');
    }


    public function addToWishList($product_id,$product_name,$product_price) {

        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wish-list-item-component','refreshCart');
    }

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

        if($this->orderBy == 'PLH') {
            
            $products = Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->orderBy('regular_price','ASC')->paginate($this->perPage);
           
        }
        else if($this->orderBy == 'PHL') {
            $products = Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->orderBy('regular_price','DESC')->paginate($this->perPage);
        }
        else if($this->orderBy == 'SBN') {
            $products = Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->orderBy('created_at','DESC')->paginate($this->perPage);
        }
        else {
            $products = Product::whereBetween('regular_price',[$this->min_value,$this->max_value])->paginate($this->perPage);
        }

        $categories = Category::orderBy('name','ASC')->get();

        return view('livewire.shop-component',['products' => $products,'categories' => $categories]);
    }
}
