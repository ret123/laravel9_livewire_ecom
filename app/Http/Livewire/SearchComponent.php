<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Category;

class SearchComponent extends Component
{
    public $perPage = 9;
    public $orderBy = 'DS';

    public $q;
    public $search_term;

    public function mount() {
        $this->fill(request()->only('q'));
        $this->search_term = '%'. $this->q .'%';
    }

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



    public function render()
    {    

        if($this->orderBy == 'PLH') {
            
            $products = Product::where('name','like',$this->search_term)->orderBy('regular_price','ASC')->paginate($this->perPage);
           
        }
        else if($this->orderBy == 'PHL') {
            $products = Product::where('name','like',$this->search_term)->orderBy('regular_price','DESC')->paginate($this->perPage);
        }
        else if($this->orderBy == 'SBN') {
            $products = Product::where('name','like',$this->search_term)->orderBy('created_at','DESC')->paginate($this->perPage);
        }
        else {
            $products = Product::where('name','like',$this->search_term)->paginate($this->perPage);
        }

        $categories = Category::orderBy('name','ASC')->get();

        return view('livewire.search-component',['products' => $products,'categories' => $categories]);
    }
}
