<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Category;

class CategoryComponent extends Component
{
    public $perPage = 9;
    public $orderBy = 'DS';
    public $slug;

    public function mount($slug) {
        $this->slug = $slug;
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
        return redirect()->route('shop.cart');
    }



    public function render()
    {    
        $category = Category::where('slug',$this->slug)->first();


        if($this->orderBy == 'PLH') {
            
            $products = Product::where('category_id',$category->id)->orderBy('regular_price','ASC')->paginate($this->perPage);
           
        }
        else if($this->orderBy == 'PHL') {
            $products = Product::where('category_id',$category->id)->orderBy('regular_price','DESC')->paginate($this->perPage);
        }
        else if($this->orderBy == 'SBN') {
            $products = Product::where('category_id',$category->id)->orderBy('created_at','DESC')->paginate($this->perPage);
        }
        else {
            $products = Product::where('category_id',$category->id)->paginate($this->perPage);
        }

        $categories = Category::orderBy('name','ASC')->get();

        return view('livewire.category-component',['products' => $products,'categories' => $categories, 'category_name' => $category->name]);
    }
}
