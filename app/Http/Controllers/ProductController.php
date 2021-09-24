<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::all();
        return view('home', ['products' => $data]);
    }

    public function shop()
    {
        $data = Product::all();
        return view('shop', ['products' => $data]);
    }

    public function category($id)
    {
        $data = Product::where('category',$id)->get();
        return view('shopByCate', ['products' => $data]);
    }

    function detail($id)
    {
        $data = Product::find($id);
        $comments = Comment::where('product_id',$id)->get();
        $details = array($data,$comments);
        return view('detail', ['product' => $details]);
    }

    function postComment(Request $req){
        $comment = new Comment;
        $comment->user_id = Auth::user()['id'];
        $comment->product_id = $req->product_id;
        $comment->content = $req->comment;
        $comment->save();
        return redirect('/detail/'.$req->product_id)->with('status','successfully added the comment!');
    }

    function search(Request $req)
    {
        $data = Product::where('name', 'like', '%' . $req->input('query') . '%')->get();
        return view('search', ['products' => $data]);
    }
    function addToCart(Request $req)
    {
        if (Auth::check()) {
                $cart = new Cart;
                $cart->user_id = Auth::user()['id'];
                $cart->product_id = $req->product_id;
                $cart->product_quantity = $req->product_quantity;
                $cart->save();
                return redirect('/cartlist')->with('status', 'Added to list!');
        } else
            return redirect('/login');
    }

    function cartList()
    {
        $userId = Auth::user()['id'];
        $products = DB::table('cart')->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)->select('products.*', 'cart.id as cart_id', 'cart.product_quantity as product_quantity')->get();
        return view('cartlist', ['products' => $products]);
        //return $products;
    }

    function removeCart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function orderNow()
    {
        $userId = Auth::user()['id'];
        $total = $products = DB::table('cart')->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $userId)->get();
         return view('ordernow', [
             'total' => $total
         ]);
        //return $total;
    }

    function orderPlace(Request $req)
    {
        $userId = Auth::user()['id'];
        $allCart = Cart::where('user_id', $userId)->get();
        foreach ($allCart as $cart) {
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = "Pending";
            $order->payment_method = $req->payment_method;
            $order->payment_status = "Pending";
            $order->address = $req->address;
            $order->phone = $req->phone;
            $order->save();
            Cart::where('user_id', $userId)->delete();
        }
        $req->input();
        return redirect('/');
    }

    public function store(Request $request)
    {
        // Handle File Upload
        if ($request->hasFile('cover_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('storage/cover_images', $fileNameToStore);

            // make thumbnails
            $thumbStore = 'thumb.' . $filename . '_' . time() . '.' . $extension;
            $thumb = Image::make($request->file('cover_image')->getRealPath());
            $thumb->resize(180, 120);
            $thumb->save('storage/cover_images/' . $thumbStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $Product = new Product;
        $Product->name = $request->input('name');
        $Product->description = $request->input('desc');
        $Product->price = $request->input('price');
        $Product->category = $request->input('category');
        $Product->gallery = $fileNameToStore;
        $Product->save();

        return redirect('/')->with('status', 'Product Added');
    }

    function myOrders()
    {
        $userId = Auth::user()['id'];

        $orders =  DB::table('orders')->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $userId)->get();


        return view('myOrders', ['orders' => $orders]);
    }

    static function cartItem()
    {
        $userId = Auth::user()['id'];
        return Cart::where('user_id', $userId)->count();
    }
}
