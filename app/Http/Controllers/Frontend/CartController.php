<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\FrontendDataService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cartDataStore(Request $request, $prdId){
        $produtDetails = (new FrontendDataService())->SingleProductDetails($prdId);

        if ($produtDetails->product_sale_price == null) {
            Cart::add([
                'id' => $prdId,
                'name' => $request->prod_name,
                'qty' => $request->quantity,
                'price' => $produtDetails->product_actual_price,
                'weight' => 1,
                'options' => [
                    'color' => $request->color,
                    'size' => $request->size,
                    'image' => $produtDetails->product_thumbnail,
                ],
            ]);
            return response()->json(['success' => 'Successfully Added On Your Cart']);
        }else {
            Cart::add([
                'id' => $prdId,
                'name' => $request->prod_name,
                'qty' => $request->quantity,
                'price' => $produtDetails->product_sale_price,
                'weight' => 1,
                'options' => [
                    'color' => $request->color,
                    'size' => $request->size,
                    'image' => $produtDetails->product_image1,
                ],
            ]);
            return response()->json(['success' => 'Successfully Added On Your Cart']);

        }
    }

    public function productBuyInfoOnMiniCart(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQuantity' => $cartQty,
            'cartTotalPrice' => $cartTotal,
            // 'cartTotalPrice' => round($cartTotal),
        ));
    }

    public function productRemoveFromMiniCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Successfully Removed From Cart']);
    }


    // ####################### Cart Product View On Cart Page #######################
    public function cartItemView(){
        // dd('Calling');
        $cartTotal = Cart::total();
        return view('user.cart-page', compact('cartTotal'));
    }

    public function cartProducts(){
        $carts = Cart::content();
        $cartQty = Cart::count();
        $cartTotal = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cartQuantity' => $cartQty,
            'cartTotalPrice' => $cartTotal,
            // 'cartTotalPrice' => round($cartTotal),
        ));
    }

    public function cartProductRemoveFromCartPage($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'This Product Has Been Removed From Cart']);
    }

    public function cartProductIncrementFromCartPage($rowId){
        $row = Cart::get($rowId); // Get the row id for cart product
        Cart::update($rowId, $row->qty + 1); // Will update the quantity with One

        return response()->json('Incremented');
    }

    public function cartProductDecrementFromCartPage($rowId){
        $row = Cart::get($rowId); // Get the row id for cart product

        if ($row->qty == 1) {
            return response()->json('Not Applicable');
        } else {
            Cart::update($rowId, $row->qty - 1); // Will update the quantity with One
            return response()->json('Decremented');
        }
    }

    // ######################### Checkout Page From Cart Products #########################
    public function checkoutPageForSelectedCartProducts(){
        if (Auth::check()) {
            if (Cart::total() > 0) {

                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                // dd($divisions);
                return view('user.checkout-page', compact('carts', 'cartQty', 'cartTotal'));
            } else {
                return redirect()->route('frontend')->with('error','You Need To Shop Here'); //Toastr alert
            }

        }else {
            return redirect()->route('login')->with('error','You Have To Login First'); //Toastr alert
        }
    }

    public function checkoutProcessRequest(Request $request){
        dd($request->all());
    }



}


