<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Category;

class HomeComponent extends Component
{
    public function render()
    {
        $latest_products = Product::orderBy('created_at','DESC')->get()->take(8);
        $featured_prods = Product::where('featured',1)->inRandomOrder()->get()->take(8);
        $slides = HomeSlider::where('status',1)->get();
        $popular_cats = Category::where('is_popular',1)->inRandomOrder()->get()->take(8);
        return view('livewire.home-component',['slides' => $slides,'latest_products' => $latest_products,'featured_prods' => $featured_prods,'popular_cats' => $popular_cats]);
         
    }
}
