<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataServices\FrontendDataService;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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

}

