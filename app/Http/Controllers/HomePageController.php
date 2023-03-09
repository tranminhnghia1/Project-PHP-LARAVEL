<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Product;
use App\Product_cat;
use App\Slider;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    //
    function list(Request $request){
        $keyword = "";
            if ($request->input('keyword')) {
                $keyword = $request->input('keyword');
            }
        $featured_product = Product::inRandomOrder()-> where('status', '=', 'posted')->take(6)->get();
        $discount_product = Product::where('status', '=', 'posted')->where('discount','!=','0')->get();
        $sliders = Slider::all();
        $banners = Banner::all();
        $latest_product = Product::where('status', '=', 'posted')->latest()->take(8)->get();
        $top_product=Product::where('status', '=', 'posted')->latest()->take(6)->get();
        $products = Product::where('status', '=', 'posted')->where('name', 'LIKE', "%{$keyword}%")->paginate(12);
        $category = Product_cat::where('status', '=', 'posted')->get();
        return view('client/home',compact('featured_product','discount_product','sliders','latest_product','top_product','banners','category'));
    }
    function category_product(){
        $category = Product_cat::where('status', '=', 'posted')->get();
        return view('client/components/sidebar-productCat',compact('category'));
        
    }
    
    
}
