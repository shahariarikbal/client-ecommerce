<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\CartOrderProduct;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function add_to_cart($id)
    {
    	$product = Product::find($id);

    	if (!$product) return redirect()->back()->with('Error', 'Product not found.');

    	// check in cart_order_products table if exists this product
    	$cartOrderProduct = CartOrderProduct::where('type', 'cart')
    				->where('user_ip', request()->ip())
    				->where('product_id', $product->id)
    				;

		// if (Auth::check()) {
		// 	$cartOrderProduct ->orWhere('user_id', Auth::user()->id);			
		// }
    				

		$cartOrderProduct = $cartOrderProduct->first();



		// jodi na thake entry kore deo //else qty barao
		if ($cartOrderProduct == null) {
			$cartOrderProduct = new CartOrderProduct;

			$cartOrderProduct->user_ip = request()->ip();
			$cartOrderProduct->product_id = $product->id;
			$cartOrderProduct->qty = 1;
			$cartOrderProduct->price = $product->discout_price ? $product->discout_price : $product->price ;
			$cartOrderProduct->total = $cartOrderProduct->qty * $cartOrderProduct->price;
			$cartOrderProduct->type = 'cart';

		}else{

			$cartOrderProduct->user_ip = request()->ip();
			$cartOrderProduct->qty = $cartOrderProduct->qty + 1;
			$cartOrderProduct->price = $product->discout_price ? $product->discout_price : $product->price ;
			$cartOrderProduct->total = $cartOrderProduct->qty * $cartOrderProduct->price;
		}


		if (Auth::check()) {
			$cartOrderProduct->user_id = auth()->user()->id;
			// return $product;
		}

		$cartOrderProduct->save();
		return redirect()->back()->with('Success', 'Added to cart successfully');
    }

    public function cartRemove($id){
    	$cartOrderProduct = CartOrderProduct::find($id);
    	if (!$cartOrderProduct) return redirect()->back()->with('Error', 'Something went wrong');
    	$cartOrderProduct->delete();
    	return redirect()->back()->with('Success', 'Cart removed successfully');

    }

    public function cartUpdate(Request $request){

    	if (count($request->carts) > 0) {
    		foreach ($request->carts as $key => $cart_id) {
    			
		    	$cartOrderProduct = CartOrderProduct::find($cart_id);
		    	if (!$cartOrderProduct) continue;

		    	if($cartOrderProduct->product && $cartOrderProduct->product->qty < $request->qtys[$key]) continue;

		    	$cartOrderProduct->qty = $request->qtys[$key];
		    	$cartOrderProduct->total = $cartOrderProduct->qty * $cartOrderProduct->price;

		    	$cartOrderProduct->save();
    		}
    	}


    	return redirect()->back()->with('Success', 'Cart updated successfully');

    }

    public function store(Request $request){
    	// return $request->all();

    	$order = new Order;

    	$invoice_no = DB::table('orders')->max('invoice_no') ? (int)DB::table('orders')->max('invoice_no') + 1 : 501 ;

    	$order->invoice_no = $invoice_no;
    	$order->user_id = Auth::user()->id;
    	$order->total = $request->total;
    	$order->name = $request->name;
    	$order->email = $request->email;
    	$order->phone = $request->phone;
    	$order->address = $request->address;
    	$order->city = $request->city;
    	$order->zip = $request->zip;
    	$order->country = $request->country;

    	$order->save();

    	// update this user cart products
        $cartProducts = CartOrderProduct::where('type', 'cart')
                    ->where('user_ip', request()->ip())
                    ->get();

        foreach ($cartProducts as $cartProduct) {
        	$cartProduct->order_id = $order->id;
        	$cartProduct->user_id = Auth::user()->id;
        	$cartProduct->type = 'order';
        	$cartProduct->save();


    		// update product stock
    		if ($cartProduct->product) {
    			$cartProduct->product->qty -= $cartProduct->qty;
    			$cartProduct->save();
    		}
        }
        
    	return view('frontend.order.confirm', compact('order'))->with('Success', 'Order saved successfully');


    }

    public function cart(){
    	return view('frontend.order.cart');
    }

    public function checkout(){
    	if (!auth()->check()) {
    		return redirect('/login')->with('Error', 'Please Login First');
    	}
    	return view('frontend.order.checkout');
    }
}
