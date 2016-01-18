<?php

namespace TaruCommerce\Http\Controllers;

use Illuminate\Http\Request;

use TaruCommerce\Http\Requests;
use TaruCommerce\Http\Controllers\Controller;
use TaruCommerce\Cart;
use TaruCommerce\Product;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{

	private $cart;
    private $productModel;

	public function __construct(Cart $cart, Product $product)
	{
		$this->cart = $cart;
        $this->productModel = $product;
	}

    public function index()
    {
    	if (!Session::has('cart')) {
    		Session::set('cart', $this->cart);
    	}
    	return view('store.cart', ['cart' => Session::get('cart')]);
    }

    public function add($id)
    {
        $cart = $this->getCart();

        $product = $this->productModel->find($id);
        $cart->add($id, $product->name, $product->price);

        Session::set('cart', $cart);

        return redirect()->route('cart');
    }

    public function destroy($id)
    {
        $cart = $this->getCart();
        $cart->remove($id);
        Session::set('cart', $cart);
        return redirect()->route('cart');
    }

    public function getCart()
    {
        if (Session::has('cart')) {
            $cart = Session::get('cart');
        } else {
            $cart = $this->cart;
        }

        return $cart;
    }
}
