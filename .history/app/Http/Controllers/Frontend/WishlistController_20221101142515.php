<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id', Auth::id()) ->get();
        return view('frontend.wishlist', compact('wishlist'));
    }

    public function add(Request $request)
    {
        if(Auth::check)
        {
            $prod_id = $request->input('prod_id');
            if(Product::find($prod_id)) {
                $wish = new Wishlist();
                $wish -> prod_id = $prod_id;
                $wish -> user_id = Auth::id();
                $wish -> save();
            }
            else {
                return response()->json(['status' => "Product doesnot exists"]);
            }
        }
        else {
            return response()->json(['status' => "Login to continue"]);
        }
    }
}
