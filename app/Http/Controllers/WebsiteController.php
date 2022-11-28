<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\category;
use App\Cart;
use App\Order;
use App\Checkout;
use App\Sale;
use App\Customer;
use App\Product_sale;
use App\Brand;
use App\Contact;
use App\User;
use App\Newsletter;
use App\Blog;

use Auth;
use Hash;

use Illuminate\Support\Facades\DB;


class WebsiteController extends Controller
{
    //home page view
    public function index()
    {
        $categories = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                ->select('categories.id', 'categories.name')
                                ->distinct('categories.name')
                                ->get();
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });
        $products   = Product::orderBy('id', 'DESC')->where('is_active', true)->get();
        $brands     = Brand::orderBy('id', 'DESC')->where('is_active', true)->get();
        $blog       = Blog::orderBy('id', 'DESC')->get();
        
        return view('eshop.home', compact('products', 'categories', 'carts', 'subtotal', 'brands', 'blog'));	
    }

    //category product page view
    public function category($category_id)
    {
        // $brands = Brand::orderBy('brands.id', 'DESC')
        //                 ->where('brands.is_active', true)
        //                 ->where('products.category_id', '=', $id)
        //                 ->join('products', 'products.brand_id', '=', 'brands.id')
        //                 ->get();
        $products   = Product::orderBy('id', 'DESC')->where('is_active', true)->limit(3)->get();
        $cat_name = Category::where('id', '=', $category_id)->first();
        $cat = Category::orderBy('id', 'DESC')
                            ->where('is_active', true)
                            ->get();
        // return $cat_name; exit();
        $brands = DB::table('brands')
                        ->join('products', 'products.brand_id', '=', 'brands.id')
                        ->where('brands.is_active', true)
                        ->where('products.is_active', true)
                        ->where('products.category_id', '=', $category_id)
                        ->distinct('products.brand_id')
                        ->select('brands.title', 'brands.id')
                        ->get();

        
        // return $brands; exit();
        $categories = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                ->select('categories.id', 'categories.name')
                                ->distinct('categories.name')
                                ->get();
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });
        $product_category   = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('products.category_id', '=', $category_id)
                                ->where('products.is_active', true)
                                ->select('products.*')
                                ->paginate(8);

        $next_products = Product::where('is_active', true)
                            ->orderBy('id', 'DESC')
                            ->skip(3)
                            ->take(3)
                            ->get();     
        
        return view('eshop.category', compact('categories', 'product_category', 'carts', 'subtotal', 'brands', 'category_id', 'cat_name', 'cat', 'products', 'next_products'));  
        
    }

    //category page 
    public function category_page()
    {
         $categories = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                ->select('categories.id', 'categories.name', 'categories.image')
                                ->distinct('categories.name')
                                ->get();
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });

        $discount = Product::orderBy('id', 'DESC')
                            ->where('promotion', 1)
                            ->where('is_active', true)
                            ->get();
        $products = Product::where('is_active', true)
                            ->orderBy('id', 'DESC')
                            ->limit(3)
                            ->get();
        $next_products = Product::where('is_active', true)
                            ->orderBy('id', 'DESC')
                            ->skip(3)
                            ->take(3)
                            ->get();                  
        return view('eshop.category_page', compact('discount','categories', 'carts', 'subtotal', 'products', 'next_products'));
    }


    //brands page
    public function brands($id, $category_id)
    {
        $cat_name = Category::where('id', '=', $category_id)->first();
        $brand_name = Brand::where('id', '=', $id)->first();
        $brand_products = Product::join('categories', 'categories.id', '=', 'products.category_id')
                                  ->join('brands', 'brands.id', '=', 'products.brand_id')
                                  ->where('products.category_id', '=', $category_id) 
                                  ->where('products.brand_id', '=', $id) 
                                  ->where('brands.is_active', 1)
                                  ->select('products.*')
                                  ->paginate(8);
        $categories = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                ->select('categories.id', 'categories.name')
                                ->distinct('categories.name')
                                ->get();
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });

        

        $brands = DB::table('brands')
                        ->join('products', 'products.brand_id', '=', 'brands.id')
                        ->where('brands.is_active', true)
                        ->where('products.category_id', '=', $category_id)
                        ->distinct('products.brand_id')
                        ->select('brands.title', 'brands.id')
                        ->get();

        $products = Product::where('is_active', true)
                            ->orderBy('id', 'DESC')
                            ->limit(3)
                            ->get();
        $next_products = Product::where('is_active', true)
                            ->orderBy('id', 'DESC')
                            ->skip(3)
                            ->take(3)
                            ->get();        

        return view('eshop.brand', compact('brand_products', 'categories', 'carts', 'subtotal', 'brands', 'category_id', 'cat_name', 'brand_name', 'products', 'next_products'));
    }

    //brands product
    public function brands_product($id)
    {

        $brand_name = Brand::where('id', $id)->first();
        $categories = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                // ->where('products.is_active', 1)
                                ->select('categories.id', 'categories.name')
                                ->distinct('categories.name')
                                ->get();
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });
        $brands_product = Product::orderBy('id', 'DESC')
                                    ->where('is_active', true)
                                    ->where('brand_id', $id)
                                    ->get();
        $products = Product::where('is_active', true)
                            ->orderBy('id', 'DESC')
                            ->limit(3)
                            ->get();
        $next_products = Product::where('is_active', true)
                            ->orderBy('id', 'DESC')
                            ->skip(3)
                            ->take(3)
                            ->get();       
        return view('eshop.brands_product', compact('categories', 'carts', 'subtotal', 'brands_product', 'products', 'next_products', 'brand_name'));

    }

    //detail page view
    public function detail($id)
    {
        $products   = Product::orderBy('id', 'DESC')->where('is_active', true)->limit(3)->get();
        $categories = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                ->select('categories.id', 'categories.name')
                                ->distinct('categories.name')
                                ->get();
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });
        $product    = Product::orderBy('products.id', 'DESC')
                                ->join('brands', 'brands.id', '=', 'products.brand_id')
                                ->where('products.id', '=', $id)
                                ->select('products.*', 'brands.image as brand_image', 'brands.id as brand_id')
                                ->first();
        $all_products = Product::orderBy('id', 'DESC')->where('is_active', true)->get();

        
        $next_products = Product::where('is_active', true)
                            ->orderBy('id', 'DESC')
                            ->skip(3)
                            ->take(3)
                            ->get();
        return view('eshop.detail', compact('categories', 'product', 'carts', 'subtotal', 'products', 'all_products', 'next_products'));  
    }

    //add to cart
    public function add_to_cart(Request $request, $product_id)
    {
        $check = Cart::where('product_id', $product_id)->where('user_ip', request()->ip())->first();

        if($check)
        {
            Cart::where('product_id', $product_id)->increment('product_quantity');

            
             return back()->with('modal', 5);
        }
        else
        {
            Cart::insert([
            'product_id'       => $product_id,
            'product_quantity' => 1,
            'product_price'    => $request->product_price,
            'user_ip'          => request()->ip()
            ]);

            
            return back()->with('modal', 5);
        }
         
    }

    //add to cart from detail page with product quantity
    public function add_cart_quantity(Request $request, $product_id)
    {

        $check = Cart::where('product_id', $product_id)->where('user_ip', request()->ip())->first();

        if($check)
        {
            Cart::where('product_id', $product_id)->increment('product_quantity', $request->quantity);

            
            return back()->with('modal', 5); 
        }
        else
        {
            Cart::insert([
            'product_id'       => $product_id,
            'product_quantity' => $request->quantity,
            'product_price'    => $request->product_price,
            'user_ip'          => request()->ip()
            ]);

            return back()->with('modal', 5);
        }
       
    }

    // view cart page
    public function cart_page()
    {
        
        $categories = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                ->select('categories.id', 'categories.name')
                                ->distinct('categories.name')
                                ->get();

        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });

        $carts_row = $carts->count();
        if($carts_row > 0){
            return view('eshop.cart', compact('categories', 'carts', 'subtotal'));
            
        }
        else{

            return view('eshop.cart', compact('categories', 'carts', 'subtotal'))->with('clear_cart', 5);
            // echo "string";
        }
          
    }


    //quantity update in cart
    public function cart_quantity_update(Request $request, $id)
    {
        // return $request;exit();
        Cart::where('id', $id)->where('user_ip', request()->ip())->update([

            'product_quantity' => $request->product_quantity    
        ]);
       
        return back()->with('qty_update', 5);
    }

    // cart delete page
    public function cart_destroy($id)
    {
    
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $carts_row = $carts->count();

        
        Cart::where('id', $id)->where('user_ip', request()->ip())->delete();

        if($carts_row > 0)
        {
            return back();
        }
        else{
            return redirect('/eshop/cart-page/')->with('clear', 4);
            // echo "string";
        }

    }


    // cart destroy from master blade
    public function cart_destroy_master($id)
    {
    
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $carts_row = $carts->count();

        
        Cart::where('id', $id)->where('user_ip', request()->ip())->delete();

        if($carts_row > 0)
        {
            return redirect('/eshop/cart-page/');
        }
        else{
            return redirect('/eshop/cart-page/')->with('clear', 4);
            // echo "string";
        }
    }


    //clear cart
    public function clear_cart()
    {
        Cart::where('user_ip', request()->ip())->delete();
        return redirect('/eshop/cart-page/')->with('clear_cart', 5);
    }

    //checkout page view
    public function checkout(Request $request ,$user_ip)
    {
        // return $request; exit();
        $shipping_cost = $request->shipping_cost;
        $categories = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                ->select('categories.id', 'categories.name')
                                ->distinct('categories.name')
                                ->get();

        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });
        $count = Cart::where('user_ip', '=', request()->ip())->count('id');
        // echo $carts; exit();
        return view('eshop.checkout', compact('categories', 'carts', 'subtotal', 'count', 'shipping_cost'));  
    }


    // place order from checkout page
    public function place_order(Request $request)
    {
        // return $request; exit();

        $request->validate([
            'name'           => 'required',
            'phone_number'   => 'required',
            'address'        => 'required',
            'city'           => 'required',            
            'email'          => 'required'            
        ]);


        if(!Auth::user()){

            $check = User::where('email', $request->email)->first();

            if($check){
            
                $auth_customer = Customer::orderBy('customers.id', 'DESC')
                                        ->join('users', 'users.id', '=', 'customers.user_id')
                                        ->where('customers.user_id', '=', $check->id)
                                        ->select('customers.id')
                                        ->first();

                $customer = Customer::find($auth_customer->id);

                $customer->name              = $request->name;
                $customer->company_name      = $request->company_name;
                $customer->email             = $request->email;
                $customer->phone_number      = $request->phone_number;
                $customer->address           = $request->address;
                $customer->city              = $request->city;
                $customer->state             = $request->state;
                $customer->postal_code       = $request->postal_code;
                $customer->country           = $request->country;
               
                $customer->save();
                
                $count    = Cart::where('user_ip', '=', request()->ip())->count('id');
                $quantity = Cart::where('user_ip', request()->ip())->sum('product_quantity');
                $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
                    return $t->product_price * $t->product_quantity;
                });

                $sale = new Sale;

                $sale->reference_no = 'ecom-' . date("Ymd") . '-'. date("his");
                $sale->user_id      = $check->id;
                $sale->customer_id  = $auth_customer->id;
                $sale->warehouse_id = 1;
                $sale->biller_id    = 1;
                $sale->item         = $count;
                $sale->total_qty    = $quantity;
                $sale->total_discount    = 0;
                $sale->total_tax         = 0;
                $sale->total_price       = $subtotal;
                $sale->grand_total       = $subtotal + $request->shipping_cost;
                $sale->shipping_cost     = $request->shipping_cost;
                $sale->sale_status       = 3;
                $sale->payment_status    = 2;

                $sale->save();
            }
            else{


                $name_without_space = str_replace(' ', '', $request->name);

                $user_name = substr($name_without_space, 0, 3);

                $rand_user_name = $user_name.rand(10,100);
                //user add
                $user = new User;

                $user->name     = $rand_user_name;
                $user->email    = $request->email;
                $user->phone    = $request->phone_number;
                $user->role_id  = 5;
                $user->is_active  = 1;
                $user->is_deleted = 0;
                $user->password   = Hash::make('12345678');

                $user->save();

                $user_id = User::orderBy('id', 'DESC')->first();

                //customer add
                $customer = new Customer;

                $customer->customer_group_id = 1;
                $customer->user_id           = $user_id->id;
                $customer->name              = $request->name;
                $customer->company_name      = $request->company_name;
                $customer->email             = $request->email;
                $customer->phone_number      = $request->phone_number;
                $customer->address           = $request->address;
                $customer->city              = $request->city;
                $customer->state             = $request->state;
                $customer->postal_code       = $request->postal_code;
                $customer->country           = $request->country;
                $customer->is_active         = 1;
               
                $customer->save();



                //sales add
                $customer = Customer::orderBy('id', 'DESC')->first();  
                $count    = Cart::where('user_ip', '=', request()->ip())->count('id');
                $quantity = Cart::where('user_ip', request()->ip())->sum('product_quantity');
                $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
                    return $t->product_price * $t->product_quantity;
                });

                $sale = new Sale;

                $sale->reference_no = 'ecom-' . date("Ymd") . '-'. date("his");
                $sale->user_id      = $user_id->id;
                $sale->customer_id  = $customer->id;
                $sale->warehouse_id = 1;
                $sale->biller_id    = 1;
                $sale->item         = $count;
                $sale->total_qty    = $quantity;
                $sale->total_discount    = 0;
                $sale->total_tax         = 0;
                $sale->total_price       = $subtotal; 
                $sale->grand_total       = $subtotal + $request->shipping_cost;
                $sale->shipping_cost     = $request->shipping_cost;
                $sale->sale_status       = 3;
                $sale->payment_status    = 2;

                $sale->save();

            }

        }


        if(Auth::user()){
            if(Auth::user()->role_id == 5){
                $auth_customer = Customer::orderBy('customers.id', 'DESC')
                                        ->join('users', 'users.id', '=', 'customers.user_id')
                                        ->where('customers.user_id', '=', Auth::user()->id)
                                        ->select('customers.id')
                                        ->first();
                // return $auth_customer; exit();

                $customer = Customer::find($auth_customer->id);

                $customer->name              = $request->name;
                $customer->company_name      = $request->company_name;
                $customer->email             = $request->email;
                $customer->phone_number      = $request->phone_number;
                $customer->address           = $request->address;
                $customer->city              = $request->city;
                $customer->state             = $request->state;
                $customer->postal_code       = $request->postal_code;
                $customer->country           = $request->country;
               
                $customer->save();


                $count    = Cart::where('user_ip', '=', request()->ip())->count('id');
                $quantity = Cart::where('user_ip', request()->ip())->sum('product_quantity');
                $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
                    return $t->product_price * $t->product_quantity;
                });

                $sale = new Sale;

                $sale->reference_no = 'ecom-' . date("Ymd") . '-'. date("his");
                $sale->user_id      = Auth::user()->id;
                $sale->customer_id  = $auth_customer->id;
                $sale->warehouse_id = 1;
                $sale->biller_id    = 1;
                $sale->item         = $count;
                $sale->total_qty    = $quantity;
                $sale->total_discount    = 0;
                $sale->total_tax         = 0;
                $sale->total_price       = $subtotal;
                $sale->grand_total       = $subtotal + $request->shipping_cost;
                $sale->shipping_cost     = $request->shipping_cost;
                $sale->sale_status       = 3;
                $sale->payment_status    = 2;

                $sale->save();
            }
            elseif(Auth::user()->role_id != 5) {
                //customer add
                $customer = new Customer;

                $customer->customer_group_id = 1;
                $customer->name              = $request->name;
                $customer->company_name      = $request->company_name;
                $customer->email             = $request->email;
                $customer->phone_number      = $request->phone_number;
                $customer->address           = $request->address;
                $customer->city              = $request->city;
                $customer->state             = $request->state;
                $customer->postal_code       = $request->postal_code;
                $customer->country           = $request->country;
                $customer->is_active         = 1;
               
                $customer->save();


                //sales add
                $customer = Customer::orderBy('id', 'DESC')->first();  
                $count    = Cart::where('user_ip', '=', request()->ip())->count('id');
                $quantity = Cart::where('user_ip', request()->ip())->sum('product_quantity');
                $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
                    return $t->product_price * $t->product_quantity;
                });

                $sale = new Sale;

                $sale->reference_no = 'ecom-' . date("Ymd") . '-'. date("his");
                $sale->user_id      = Auth::user()->id;
                $sale->customer_id  = $customer->id;
                $sale->warehouse_id = 1;
                $sale->biller_id    = 1;
                $sale->item         = $count;
                $sale->total_qty    = $quantity;
                $sale->total_discount    = 0;
                $sale->total_tax         = 0;
                $sale->total_price       = $subtotal;
                $sale->grand_total       = $subtotal + $request->shipping_cost;
                $sale->shipping_cost     = $request->shipping_cost;
                $sale->sale_status       = 3;
                $sale->payment_status    = 2;
                // $sale->shipping_cost    = 2;

                $sale->save();
            }
        }


        //product sales add
        $cart_info = Cart::where('user_ip', $request->cart_ip)->get();
        $sale = Sale::orderBy('id', 'DESC')->first();


        foreach($cart_info as $row){

        $product_sale = new Product_sale;
        $product_sale->sale_id          = $sale->id;
        $product_sale->product_id       = $row->product_id;
        $product_sale->qty              = $row->product_quantity;
        $product_sale->sale_unit_id     = 1;
        $product_sale->net_unit_price   = $row->product_price;
        $product_sale->discount         = 0;
        $product_sale->tax_rate         = 0;
        $product_sale->tax              = 0;
        $product_sale->total            = $row->product_price * $row->product_quantity;
        // $order->user_ip              = $row->user_ip;
        $product_sale->save();


        }
        //cart delete
        Cart::where('user_ip', $request->user_ip)->delete();

        return redirect('/eshop/confirmation/');

        
    }


    //checkout page view
    public function confirmation()
    {
        $categories = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                ->select('categories.id', 'categories.name')
                                ->distinct('categories.name')
                                ->get();
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });

        $sale = Sale::orderBy('id', 'DESC')->first();
        $customer = Customer::join('sales', 'sales.customer_id', '=', 'customers.id')
                              ->where('sales.id', $sale->id)
                              ->select('customers.*')
                              ->first();
        $products = Product_sale::join('sales', 'sales.id', '=', 'product_sales.sale_id')
                                    ->join('products', 'products.id', '=', 'product_sales.product_id')
                                    ->where('sales.id', $sale->id)
                                    ->select('product_sales.*', 'products.name')
                                    ->get();

        // $sum = Product_sale::all()
        //                     ->join('sales', 'sales.id', '=', 'product_sales.sale_id')
        //                     ->where('sales.id', $sale->id)
                                
                
        //                         ->sum(function($t){
        //     return $t->net_unit_price * $t->qty;
        // });
        $sum = Product_sale::all()
                            ->where('sale_id', $sale->id)
                            ->sum(function($t){
            return $t->net_unit_price * $t->qty;
        });

        $user = User::orderBy('id', 'DESC')
                        ->where('id', $customer->user_id)
                        ->first();


        $sale_count = Sale::where('customer_id', $customer->id)->count();
                             
        
        // return $sale_count; exit();

        $name_without_space = str_replace(' ', '', ($user->name?? 'Na'));

        $user_name = substr($name_without_space, 0, 3);

        $rand_user_name = $user_name.rand(10,100);

        // return $result; exit();
        return view('eshop.confirmation', compact('categories', 'carts', 'subtotal', 'sale', 'customer', 'products', 'sum', 'user', 'sale_count'));  
    }


    //contact page view
    public function contact()
    {
        // return Auth::user(); exit();
        $categories = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                ->select('categories.id', 'categories.name')
                                ->distinct('categories.name')
                                ->get();
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });
        return view('eshop.contact', compact('categories', 'carts', 'subtotal'));  
    }

    //login page view
    public function login()
    {
        $categories = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                ->select('categories.id', 'categories.name')
                                ->distinct('categories.name')
                                ->get();
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });
        return view('eshop.login', compact('categories', 'carts', 'subtotal'));  
    }

    //profile page view
    public function profile()
    {
        $categories = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                ->select('categories.id', 'categories.name')
                                ->distinct('categories.name')
                                ->get();
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });
        $customer = Customer::select('id')->where('user_id', Auth::id())->first();
        $lims_sale_data = Sale::with('warehouse')->where('customer_id', $customer->id)->orderBy('created_at', 'desc')->get();

        $order_count = Sale::where('customer_id', $customer->id)->count();

        // return $order_count; exit();

        return view('eshop.profile', compact('categories', 'carts', 'subtotal', 'customer', 'lims_sale_data', 'order_count'));  
    }

    protected function guard()
    {
        return Auth::guard();
    }

    //customer logut
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/eshop/login');
    }
    protected function loggedOut(Request $request)
    {
        
    }

    //contact post
    public function post_contact(Request $request)
    {
        $contact = new Contact;

       
        $contact->name              = $request->name;
        $contact->email             = $request->email;
        $contact->phone_number      = $request->phone_number;
        $contact->message           = $request->message;
     
       
        $contact->save();

        return back()->with('success', 'Message is Successfully Sent!');
    }

    //customer profile edit
    public function edit_profile($id)
    {
        $categories = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                ->select('categories.id', 'categories.name')
                                ->distinct('categories.name')
                                ->get();
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });
        $profile = User::orderBy('users.id', 'DESC')
                            ->join('customers', 'customers.user_id', '=', 'users.id')
                            ->where('users.id', '=', $id)
                            ->select('customers.user_id','customers.name', 'customers.company_name', 'customers.email', 'customers.phone_number', 'customers.tax_no', 'customers.address', 'customers.city', 'customers.state', 'customers.postal_code','customers.country', 'users.name AS user_name', 'users.email as user_email' )
                            ->first();
        return view('eshop.edit_profile', compact('categories', 'carts', 'subtotal', 'profile'));
    }

    //update customer profile
    public function update_profile(Request $request)
    {
        // return $request; exit();

        // if($request->new_password != $request->confirm_password){
        //     echo "ur confirmation is Wrong"; exit();
        // }

        $user = User::find($request->id);
        $user->name  = $request->user_name;
        $user->email = $request->email;

        // if (Hash::check($request->old_password, $user->password)) {
        //     $user->password = bcrypt($request->new_password);
        // }
        // else{
        //     echo "ur current pass is Wrong";
        // }

        $user->save();


        $customer_id = User::join('customers', 'customers.user_id', '=', 'users.id')
                            ->where('users.id', '=', $request->id)
                            ->first();

        $customer = Customer::find($customer_id->id);

        $customer->name         = $request->name;
        $customer->company_name = $request->company_name;
        $customer->email        = $request->email;
        $customer->phone_number = $request->phone_number;
        $customer->tax_no       = $request->tax_no;
        $customer->address      = $request->address;
        $customer->city         = $request->city;
        $customer->state        = $request->state;
        $customer->postal_code  = $request->postal_code;
        $customer->country      = $request->country;
        $customer->save();

        return back()->with('success', 'Update Successful!');
    }


    //password update
    public function update_password(Request $request)
    {
        // return $request; exit();
        if($request->new_password != $request->confirm_password){
            return back()->with('alert', 'Confirmation Password Not Match!');
        }

        $user = User::find($request->id);

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = bcrypt($request->new_password);
        }
        else{
             return back()->with('alert', 'Current Password is Wrong!');
        }
        $user->save();
        return back()->with('success', 'Update Successful!');
    }

    public function orders()
    {
        $categories = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                ->select('categories.id', 'categories.name')
                                ->distinct('categories.name')
                                ->get();
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });
        $customer = Customer::select('id')->where('user_id', Auth::id())->first();
        $lims_sale_data = Sale::with('warehouse')->where('customer_id', $customer->id)->orderBy('created_at', 'desc')->get();
        return view('eshop.orders', compact('categories', 'carts', 'subtotal', 'customer', 'lims_sale_data'));
    }

    public function search(Request $request)
    {
        // return $request; exit();

        // $cat_name = Category::where('id', '=', $category_id)->first();
        // return $cat_name; exit();
        $brands = DB::table('brands')
                        ->join('products', 'products.brand_id', '=', 'brands.id')
                        ->where('brands.is_active', true)
                        // ->where('products.category_id', '=', $category_id)
                        ->distinct('products.brand_id')
                        ->select('brands.title', 'brands.id')
                        ->get();

        
        // return $brands; exit();
        $categories = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                ->select('categories.id', 'categories.name')
                                ->distinct('categories.name')
                                ->get();
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });
        // $categories = Category::orderBy('id', 'DESC')->where('is_active', true)->get();
        // $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        // $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
        //     return $t->product_price * $t->product_quantity;
        // });
        $search = Product::orderBy('id', 'DESC')
                            // ->where('category_id', '=', $request->category)
                            ->where('name', 'like', '%'.$request->search.'%')
                            ->get();
        // return $search; exit();

        $products = Product::where('is_active', true)
                            ->orderBy('id', 'DESC')
                            ->limit(3)
                            ->get();
        $next_products = Product::where('is_active', true)
                            ->orderBy('id', 'DESC')
                            ->skip(3)
                            ->take(3)
                            ->get();      
        return view('eshop.search', compact('search', 'categories', 'carts', 'subtotal', 'brands', 'products', 'next_products'));
    }


    public function offer()
    {
        $categories = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                ->select('categories.id', 'categories.name')
                                ->distinct('categories.name')
                                ->get();
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });

        $discount = Product::orderBy('id', 'DESC')
                            ->where('promotion', 1)
                            ->where('is_active', true)
                            ->get();
        $products = Product::where('is_active', true)
                            ->orderBy('id', 'DESC')
                            ->limit(3)
                            ->get();
        $next_products = Product::where('is_active', true)
                            ->orderBy('id', 'DESC')
                            ->skip(3)
                            ->take(3)
                            ->get();      
        return view('eshop.offer', compact('discount','categories', 'carts', 'subtotal', 'products', 'next_products'));
    }

    //newsletter post
    public function newsletter(Request $request)
    {
         $request->validate([
            'email'           => 'required'
        ]);

        $newsletter = new Newsletter;

        $newsletter->email = $request->email;

        $newsletter->save();

        return back()->with('newsletter_modal', 1);
    }

    //blog post
    public function blog_post($id)
    {
        // echo "string";
        $categories = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                ->select('categories.id', 'categories.name')
                                ->distinct('categories.name')
                                ->get();
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });

        $blog  = Blog::orderBy('id', 'DESC')
                        ->where('id', $id)
                        ->first();
        $blogs = Blog::orderBy('id', 'DESC')
                        ->get();
        $recent_blog = Blog::orderBy('id', 'DESC')
                        ->limit(2)
                        ->get();

        return view('eshop.blog_post', compact('categories', 'carts', 'subtotal', 'blog', 'blogs', 'recent_blog'));
    }

    //all blogs 
    public function blogs()
    {
        $categories = Category::orderBy('categories.id', 'DESC')
                                ->join('products', 'products.category_id', '=', 'categories.id')
                                ->where('categories.is_active', true)
                                ->where('products.is_active', true)
                                ->select('categories.id', 'categories.name')
                                ->distinct('categories.name')
                                ->get();
        $carts = Cart::where('user_ip', request()->ip())->latest()->get();
        $subtotal = Cart::all()->where('user_ip', request()->ip())->sum(function($t){
            return $t->product_price * $t->product_quantity;
        });

        $blogs = Blog::orderBy('id', 'DESC')
                        ->get();
        $recent_blog = Blog::orderBy('id', 'DESC')
                        ->limit(2)
                        ->get();

        return view('eshop.blogs', compact('categories', 'carts', 'subtotal', 'blogs', 'recent_blog'));
    }

}



