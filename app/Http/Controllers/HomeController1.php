<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use App\Sale;
use App\Returns;
use App\ReturnPurchase;
use App\Purchase;
use App\Expense;
use App\Payroll;
use App\Quotation;
use App\Payment;
use App\Account;
use App\Product_Sale;
use App\Customer;
use App\Blog;
use App\Lead;
use App\Project;
use DB;
use Auth;
use Carbon;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        return view('home');
    }

    public function expire()
    {
        return view('expire');
    }

    public function add_blog()
    {
        return view('blog.add_blog');
    }

    public function save_blog(Request $request)
    {
        // return $request; 
        $request->validate([

            'blog_title'  => 'required',
            'blog'=> 'required',
            'blog_image'=> 'required|mimes:jpg,jpeg,png'

        ]);

        $blog_image = $request->file('blog_image');


        $name_generator  = hexdec(uniqid());
        $image_extension = strtolower($blog_image->getClientOriginalExtension());
        $image_name      = $name_generator.'.'.$image_extension;
        $up_location     = 'public/images/blogs/';
        $last_image      = $up_location.$image_name;

        $blog_image->move($up_location,$image_name);

        $blog = new Blog;

        $blog->blog_title            = $request->blog_title;
        $blog->blog                  = $request->blog;
        $blog->blog_image            = $last_image; 

        $blog->save();

        return redirect('/blog-list');
        // return view('blog.add_blog');
    }

    //blog list
    public function blog_list()
    {
        $blogs = Blog::orderBy('id', 'DESC')->get();
        return view('blog.blog_list', compact('blogs'));
    }
    //edit blog
    public function edit_blog($id)
    {
        $blog = Blog::orderBy('id', 'DESC')
                        ->where('id', $id)
                        ->first();
        return view('blog.edit_blog', compact('blog'));
    }
    //updeate blog
    public function update_blog(Request $request)
    {
        // return $request; exit();
        $request->validate([

            'blog_title'  => 'required',
            'blog'=> 'required'
            // 'blog_image'=> 'required|mimes:jpg,jpeg,png'

        ]);

        $blog_image_old = $request->blog_image_old;

        $blog_image = $request->file('blog_image');

        if($blog_image){

            $name_generator  = hexdec(uniqid());
            $image_extension = strtolower($blog_image->getClientOriginalExtension());
            $image_name      = $name_generator.'.'.$image_extension;
            $up_location     = 'public/images/blogs/';
            $last_image      = $up_location.$image_name;


            $blog_image->move($up_location,$image_name);

            
            unlink($blog_image_old);

            $blog = Blog::find($request->id);

            $blog->blog_title            = $request->blog_title;
            $blog->blog                  = $request->blog;
            $blog->blog_image            = $last_image; 

            $blog->save();
        }

        else{

            $blog = Blog::find($request->id);

            $blog->blog_title            = $request->blog_title;
            $blog->blog                  = $request->blog;

            $blog->save();
        }

        return redirect('/blog-list');
    }
    //delete blog
    public function delete_blog($id)
    {
        $blog = Blog::find($id);

        $blog_image_old = $blog->blog_image;
        unlink($blog_image_old);

        
        $blog->delete();

        return redirect('/blog-list');
    }

    public function index()
    {
        if(Auth::user()->role_id == 5) {
            $customer = Customer::select('id')->where('user_id', Auth::id())->first();
            $lims_sale_data = Sale::with('warehouse')->where('customer_id', $customer->id)->orderBy('created_at', 'desc')->get();
            // return view('customer_index', compact('lims_sale_data'));
            return redirect('/eshop/profile');
        }

        $start_date = date("Y").'-'.date("m").'-'.'01';
        $end_date = date("Y").'-'.date("m").'-'.date('t', mktime(0, 0, 0, date("m"), 1, date("Y")));
        $yearly_sale_amount = [];

        $general_setting = DB::table('general_settings')->latest()->first();
        if(Auth::user()->role_id > 2 && $general_setting->staff_access == 'own') {
            $revenue = Sale::whereDate('created_at', '>=' , $start_date)->where('user_id', Auth::id())->whereDate('created_at', '<=' , $end_date)->sum('grand_total');
            $return = Returns::whereDate('created_at', '>=' , $start_date)->where('user_id', Auth::id())->whereDate('created_at', '<=' , $end_date)->sum('grand_total');
            $purchase_return = ReturnPurchase::whereDate('created_at', '>=' , $start_date)->where('user_id', Auth::id())->whereDate('created_at', '<=' , $end_date)->sum('grand_total');
            $revenue = $revenue - $return;
            $purchase = Purchase::whereDate('created_at', '>=' , $start_date)->where('user_id', Auth::id())->whereDate('created_at', '<=' , $end_date)->sum('grand_total');
            $profit = $revenue + $purchase_return - $purchase;
            $expense = Expense::whereDate('created_at', '>=' , $start_date)->where('user_id', Auth::id())->whereDate('created_at', '<=' , $end_date)->sum('amount');
            $recent_sale = Sale::orderBy('id', 'desc')->where('user_id', Auth::id())->take(5)->get();
            $recent_lead = Lead::orderBy('id', 'desc')->where('user_id', Auth::id())->take(5)->get();
            $recent_purchase = Purchase::orderBy('id', 'desc')->where('user_id', Auth::id())->take(5)->get();
            $recent_quotation = Quotation::orderBy('id', 'desc')->where('user_id', Auth::id())->take(5)->get();
            $recent_payment = Payment::orderBy('id', 'desc')->where('user_id', Auth::id())->take(5)->get();
            $recent_project = Project::orderBy('id', 'desc')->where('user_id', Auth::id())->take(5)->get();
            $recent_ticket = Ticket::orderBy('id', 'desc')->where('user_id', Auth::id())->take(5)->get();
        }
        else {
            $revenue = Sale::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('grand_total');
            $return = Returns::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('grand_total');
            $purchase_return = ReturnPurchase::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('grand_total');
            $revenue = $revenue - $return;
            $purchase = Purchase::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('grand_total');
            $profit = $revenue + $purchase_return - $purchase;
            $expense = Expense::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('amount');
            $recent_sale = Sale::orderBy('id', 'desc')->take(5)->get();
            $recent_lead = Lead::orderBy('id', 'desc')->take(5)->get();
            $recent_purchase = Purchase::orderBy('id', 'desc')->take(5)->get();
            $recent_quotation = Quotation::orderBy('id', 'desc')->take(5)->get();
            $recent_payment = Payment::orderBy('id', 'desc')->take(5)->get();
            $recent_project = Project::orderBy('id', 'desc')->take(5)->get();
            $recent_ticket = Ticket::orderBy('id', 'desc')->take(5)->get();
        }

        $best_selling_qty = Product_Sale::select('products.code','products.name',DB::raw('product_sales.product_id, sum(product_sales.qty) as sold_qty'))
                                        ->join('products', 'products.id', '=', 'product_sales.product_id', 'left')
                                        ->whereDate('product_sales.created_at', '>=' , $start_date)
                                        ->whereDate('product_sales.created_at', '<=' , $end_date)
                                        ->groupBy('product_sales.product_id')
                                        ->groupBy('products.name')
                                        ->groupBy('products.code')
                                        ->orderBy('sold_qty', 'desc')
                                        ->take(5)
                                        ->get();

        // return  $best_selling_qty; exit();

        $yearly_best_selling_qty = Product_Sale::select(DB::raw('product_id, sum(qty) as sold_qty'))->whereDate('created_at', '>=' , date("Y").'-01-01')->whereDate('created_at', '<=' , date("Y").'-12-31')->groupBy('product_id')->orderBy('sold_qty', 'desc')->take(5)->get();

         // return  $yearly_best_selling_qty; exit();

        $yearly_best_selling_price = Product_Sale::select('products.code','products.name',DB::raw('product_sales.product_id, sum(product_sales.total) as total_price'))
                                 ->join('products', 'products.id', '=', 'product_sales.product_id', 'left')
                                 ->whereDate('product_sales.created_at', '>=' , date("Y").'-01-01')
                                 ->whereDate('product_sales.created_at', '<=' , date("Y").'-12-31')
                                 ->groupBy('product_sales.product_id')
                                 ->groupBy('products.name')
                                 ->groupBy('products.code')
                                 ->orderBy('total_price', 'desc')
                                 ->take(5)
                                 ->get();

        // return  $yearly_best_selling_price; exit();

        //cash flow of last 6 months
        $start = strtotime(date('Y-m-01', strtotime('-6 month', strtotime(date('Y-m-d') ))));
        $end = strtotime(date('Y-m-'.date('t', mktime(0, 0, 0, date("m"), 1, date("Y")))));

        while($start < $end)
        {
            $start_date = date("Y-m", $start).'-'.'01';
            $end_date = date("Y-m", $start).'-'.'31';

            if(Auth::user()->role_id > 2 && $general_setting->staff_access == 'own') {
                $recieved_amount = DB::table('payments')->whereNotNull('sale_id')->whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->where('user_id', Auth::id())->sum('amount');
                $sent_amount = DB::table('payments')->whereNotNull('purchase_id')->whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->where('user_id', Auth::id())->sum('amount');
                $return_amount = Returns::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->where('user_id', Auth::id())->sum('grand_total');
                $purchase_return_amount = ReturnPurchase::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->where('user_id', Auth::id())->sum('grand_total');
                $expense_amount = Expense::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->where('user_id', Auth::id())->sum('amount');
                $payroll_amount = Payroll::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->where('user_id', Auth::id())->sum('amount');
            }
            else {
                $recieved_amount = DB::table('payments')->whereNotNull('sale_id')->whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('amount');
                $sent_amount = DB::table('payments')->whereNotNull('purchase_id')->whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('amount');
                $return_amount = Returns::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('grand_total');
                $purchase_return_amount = ReturnPurchase::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('grand_total');
                $expense_amount = Expense::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('amount');
                $payroll_amount = Payroll::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('amount');
            }
            $sent_amount = $sent_amount + $return_amount + $expense_amount + $payroll_amount;
            
            $payment_recieved[] = number_format((float)($recieved_amount + $purchase_return_amount), 2, '.', '');
            $payment_sent[] = number_format((float)$sent_amount, 2, '.', '');
            $month[] = date("F", strtotime($start_date));
            $start = strtotime("+1 month", $start);
        }





        // yearly report
        $start = strtotime(date("Y") .'-01-01');
        $end = strtotime(date("Y") .'-12-31');

        while($start < $end)
        {
            $start_date = date("Y").'-'.date('m', $start).'-'.'01';
            $end_date = date("Y").'-'.date('m', $end).'-'.'31';



           // monthly

            $now = Carbon\Carbon::now();
            $monthStart = $now->startOfMonth()->format("Y-m-d");
            $monthEnd = $now->endOfMonth()->format("Y-m-d");

            //$start_m = strtotime(date("Y") .'-01-01');
          //  $end_m = strtotime(date("Y") .'-01-31');


            //$start_jan = date("Y").'-'.date('m', $start_m).'-'.'01';
           // $end_jun = date("Y").'-'.date('m', $end_m).'-'.'31';



            $monthly_lead = Lead::whereDate('created_at', '>=' , $monthStart)->whereDate('created_at', '<=' , $monthEnd)->sum('id');
          //  $monthly_lead = Lead::whereDate('created_at', '>=' , $monthStart)->whereDate('created_at', '<=' , $monthEnd)->count();




            if(Auth::user()->role_id > 2 && $general_setting->staff_access == 'own') {
                $sale_amount = Sale::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->where('user_id', Auth::id())->sum('grand_total');
                $purchase_amount = Purchase::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->where('user_id', Auth::id())->sum('grand_total');
            }
            else{
                $sale_amount = Sale::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('grand_total');

                $purchase_amount = Purchase::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('grand_total');
            }
            $yearly_sale_amount[] = number_format((float)$sale_amount, 2, '.', '');
            $yearly_purchase_amount[] = number_format((float)$purchase_amount, 2, '.', '');
            $start = strtotime("+1 month", $start);
        }


        $total_leads = Lead::where('status',true)->get()->count();
        $total_quotation = Quotation::get()->count();
        $total_sale = Sale::get()->count();
        $total_project = Project::get()->count();








        //return $month;
        return view('index', compact('recent_ticket','recent_project','recent_lead','monthly_lead','total_project','total_sale','total_quotation','total_leads','revenue', 'purchase', 'expense', 'return', 'purchase_return', 'profit', 'payment_recieved', 'payment_sent', 'month', 'yearly_sale_amount', 'yearly_purchase_amount', 'recent_sale', 'recent_purchase', 'recent_quotation', 'recent_payment', 'best_selling_qty', 'yearly_best_selling_qty', 'yearly_best_selling_price'));
    }

    public function dashboardFilter($start_date, $end_date)
    {
        $general_setting = DB::table('general_settings')->latest()->first();
        if(Auth::user()->role_id > 2 && $general_setting->staff_access == 'own') {
            $revenue = Sale::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->where('user_id', Auth::id())->sum('grand_total');
            $return = Returns::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->where('user_id', Auth::id())->sum('grand_total');
            $purchase_return = ReturnPurchase::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->where('user_id', Auth::id())->sum('grand_total');
            $revenue -= $return;
            $purchase = Purchase::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->where('user_id', Auth::id())->sum('grand_total');
            $profit = $revenue + $purchase_return - $purchase;

            $data[0] = $revenue;
            $data[1] = $return;
            $data[2] = $profit;
            $data[3] = $purchase_return;
        }
        else{
            $revenue = Sale::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('grand_total');
            $return = Returns::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('grand_total');
            $purchase_return = ReturnPurchase::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('grand_total');
            $revenue -= $return;
            $purchase = Purchase::whereDate('created_at', '>=' , $start_date)->whereDate('created_at', '<=' , $end_date)->sum('grand_total');
            $profit = $revenue + $purchase_return - $purchase;

            $data[0] = $revenue;
            $data[1] = $return;
            $data[2] = $profit;
            $data[3] = $purchase_return;
        }
        
        return $data;
    }

    public function myTransaction($year, $month)
    {
        $start = 1;
        $number_of_day = date('t', mktime(0, 0, 0, $month, 1, $year));
        while($start <= $number_of_day)
        {
            if($start < 10)
                $date = $year.'-'.$month.'-0'.$start;
            else
                $date = $year.'-'.$month.'-'.$start;
            $sale_generated[$start] = Sale::whereDate('created_at', $date)->where('user_id', Auth::id())->count();
            $sale_grand_total[$start] = Sale::whereDate('created_at', $date)->where('user_id', Auth::id())->sum('grand_total');
            $purchase_generated[$start] = Purchase::whereDate('created_at', $date)->where('user_id', Auth::id())->count();
            $purchase_grand_total[$start] = Purchase::whereDate('created_at', $date)->where('user_id', Auth::id())->sum('grand_total');
            $quotation_generated[$start] = Quotation::whereDate('created_at', $date)->where('user_id', Auth::id())->count();
            $quotation_grand_total[$start] = Quotation::whereDate('created_at', $date)->where('user_id', Auth::id())->sum('grand_total');
            $start++;
        }
        $start_day = date('w', strtotime($year.'-'.$month.'-01')) + 1;
        $prev_year = date('Y', strtotime('-1 month', strtotime($year.'-'.$month.'-01')));
        $prev_month = date('m', strtotime('-1 month', strtotime($year.'-'.$month.'-01')));
        $next_year = date('Y', strtotime('+1 month', strtotime($year.'-'.$month.'-01')));
        $next_month = date('m', strtotime('+1 month', strtotime($year.'-'.$month.'-01')));
        return view('user.my_transaction', compact('start_day', 'year', 'month', 'number_of_day', 'prev_year', 'prev_month', 'next_year', 'next_month', 'sale_generated', 'sale_grand_total','purchase_generated', 'purchase_grand_total','quotation_generated', 'quotation_grand_total'));
    }




    public function todays_reminder()
    {

        $dt       =\Carbon\Carbon::now();
        $today    = \Carbon\Carbon::parse($dt)->format('Y-m-d');
        $lims_reminder_data = \App\Remainder::whereDate('noti_datetime',$today)->get();
        return view('remainder.todays-reminder', compact('lims_reminder_data'));
    }
}
