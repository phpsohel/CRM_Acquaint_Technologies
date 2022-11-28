<?php

namespace App\Http\Controllers;
use App\Lead;
use App\LeadCategory;
use App\LeadSource;
use App\Project;
use App\Ticket;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Warehouse;
use App\Biller;
use App\Employee;
use App\LeadStatus;
use App\Department;
use App\Remainder;
use App\Quotation;
use App\Customer;
use App\Sale;
use App\User;
use App\Thana;


use Auth;
use Illuminate\Validation\Rule;

class LeadController extends Controller
{
    
    public function lead_list(Request $request)
    {

        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('lead-index')){
            $permissions = Role::findByName($role->name)->permissions;
            foreach ($permissions as $permission)
                $all_permission[] = $permission->name;
            if(empty($all_permission))
                $all_permission[] = 'dummy text';
            $paginate = 50;
            $authuser = Employee::where('user_id',Auth()->user()->id)->select('id','user_id')->first();
           // return $authuser;
           if($role->name == 'Admin')
           {
            $lims_lead_all = Lead::orderBy('id','DESC')->where('status', true)->paginate($paginate);
           }else{
            $lims_lead_all = Lead::orderBy('id','DESC')->where('status', true)->where('employee_id',$authuser->id)->paginate($paginate);
           }
         
            $lims_lead_status_list = LeadStatus::where('status', true)->get();
            $lims_lead_source_list = LeadSource::where('status', true)->get();
            $lims_lead_category_list = LeadCategory::where('status', true)->get();
            $lims_employee_list = Employee::where('is_active', true)->get();
            $lims_user_list = User::where('role_id','!=',5)->where('is_active', true)->get();
            return view('lead.index', compact('lims_lead_all','lims_lead_status_list','lims_lead_source_list','lims_lead_category_list','lims_user_list','lims_employee_list','all_permission'))
            ->with('i', ($request->input('page', 1) - 1) * $paginate);
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');



    }

    public function getleadlist(Request $request)
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('lead-index')){
            $permissions = Role::findByName($role->name)->permissions;
            foreach ($permissions as $permission)
                $all_permission[] = $permission->name;
            if(empty($all_permission))
                $all_permission[] = 'dummy text';
        $paginate = 250;
        $lims_lead_all = Lead::orderBy('id','DESC')->where('status', true)
        ->where('name','like','%'.$request->searchingdata.'%')
        ->orwhere('company','like','%'.$request->searchingdata.'%')
        ->orwhere('phone_number','like','%'.$request->searchingdata.'%')
        ->orwhere('email','like','%'.$request->searchingdata.'%')
        ->paginate($paginate);
        return view('lead.get_leade_by_ajax', compact('lims_lead_all','all_permission'))
        ->with('i', ($request->input('page', 1) - 1) * $paginate);

        }
    }


    public function lead_create()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('lead-add')){
            $lims_role_list = Role::where('is_active', true)->get();
            $thanas = Thana::get();
            $lims_lead_status_list = LeadStatus::where('status', true)->get();
            $lims_lead_source_list = LeadSource::where('status', true)->get();
            $lims_lead_category_list = LeadCategory::where('status', true)->get();
            $lims_employee_list = Employee::where('is_active', true)->get();
            $lims_user_list = User::where('role_id','!=',5)->where('is_active', true)->get();
            return view('lead.create', compact('lims_user_list','lims_role_list', 'lims_lead_status_list', 'lims_lead_source_list', 'lims_lead_category_list','lims_employee_list','thanas'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }


    public function lead_store(Request $request)
    {
       
        $request->validate([
            'name'  => 'required',
            'email'=> 'required',
            'phone_number'=> 'required|unique:leads',
            'address'=> 'required',
            'company'=> 'required|unique:leads',
            'lead_category_id'=> 'required',
            'lead_source_id'=> 'required',
            'lead_status_id'=> 'required',
            'employee_id'=> 'required',
            'user_id'=> 'required',

        ]);

        $message = 'Lead Created successfully';
       // $data = $request->all();
        //dd($data);
        $data['name'] = $request->name;
        $data['thana_id'] = $request->thana_id;
        $data['email'] = $request->email;
        $data['phone_number'] = $request->phone_number;
        $data['address'] = $request->address;
        $data['company'] = $request->company;
        $data['date'] = $request->date;
        $data['description'] = $request->description;
        $data['designation'] = $request->designation;
        $data['another_email'] = $request->another_email;
        $data['another_phone_no'] = $request->another_phone_no;
        $data['lead_category_id'] = $request->lead_category_id;
        $data['lead_status_id'] = $request->lead_status_id;
        $data['lead_source_id'] = $request->lead_source_id;
        $data['employee_id'] = $request->employee_id;
        $data['user_id'] = $request->user_id;
        if ($request->is_remainder){
            $data['is_remainder'] = 1;
        }else{
            $data['is_remainder'] = null ;
        }
        $data['stage'] = 3;
        $data['status'] = true;
        Lead::create($data);

        $lims_lead_list = Lead::where('status', true)->orderBy('id','DESC')->first();
        if ($lims_lead_list->is_remainder != null) {
            $remainders = new Remainder();
            $remainders->lead_id = $lims_lead_list->id;
            $remainders->noti_datetime = $request->noti_datetime;
            $remainders->employee_id = $request->employee_id;
            $remainders->user_id = $request->user_id;
            $remainders->description = $request->remainder_description;
            $remainders->status = true;
            $remainders->save();
        }
        return redirect('lead_index')->with('message', $message);
    }


    public function importLead(Request $request)
    {

        $upload=$request->file('file');
        $ext = pathinfo($upload->getClientOriginalName(), PATHINFO_EXTENSION);
        if($ext != 'csv')
            return redirect()->back()->with('message', 'Please upload a CSV file');

        $filePath=$upload->getRealPath();
        //open and read
        $file=fopen($filePath, 'r');
        $header= fgetcsv($file);
        $escapedHeader=[];
        //validate
        foreach ($header as $key => $value) {
            $lheader=strtolower($value);
            $escapedItem=preg_replace('/[^a-z]/', '', $lheader);
            array_push($escapedHeader, $escapedItem);
        }
        //looping through other columns
        while($columns=fgetcsv($file))
        {
            foreach ($columns as $key => $value) {
                $value=preg_replace('/\D/','',$value);
            }
            $data= array_combine($escapedHeader, $columns);
            $lead = new lead();
            $lead->name = $data['name'];
            $lead->company = $data['company'];
            $lead->web = $data['web'];
            $lead->email = $data['email'];
            $lead->phone_number = $data['phonenumber'];
            $lead->address = $data['address'];
            $lead->description = $data['description'];
            $lead->lead_status_id = $data['leadstatusid'];
            $lead->lead_source_id = $data['leadsourceid'];
            $lead->employee_id = $data['employeeid'];
            $lead->lead_category_id = $data['leadcategoryid'];
            $lead->stage = $data['stage'];
            $lead->status = true;
            $lead->save();
        }
        return redirect('lead_index')->with('import_message', 'Lead imported successfully');
    }

    public function lead_edit($id)
    {
        $data = [];
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('lead-add')){
            $data['lead'] = lead::find($id);
            $data['thanas'] = Thana::get();
            $data['lims_role_list'] = Role::where('is_active', true)->get();
            $data['lims_lead_status_list'] = LeadStatus::where('status', true)->get();
            $data['lims_lead_source_list'] = LeadSource::where('status', true)->get();
            $data['lims_lead_category_list'] = LeadCategory::where('status', true)->get();
            $data['lims_employee_list'] = Employee::where('is_active', true)->get();
            $data['lims_user_list'] = User::where('role_id','!=',5)->where('is_active', true)->get();
            return view('lead.edit',$data);
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }


    public function lead_update(Request $request,$id)
    {
       
        $request->validate([
            'name'  => 'required',
            'email'=> 'required',
            'phone_number'=> 'required',
            'address'=> 'required',
            'company'=> 'required',
            'lead_category_id'=> 'required',
            'lead_source_id'=> 'required',
            'lead_status_id'=> 'required',
            'employee_id'=> 'required',
           // 'user_id'=> 'required',

        ]);
       
        $data = $request->all();
       // return $data;
        $lims_lead_data = Lead::find($id);
        $lims_lead_data->update($data);
        return redirect('lead_index')->with('message', 'Lead  updated successfully');
    }


    public function lead_destroy($id)
    {
        $lims_data = Lead::find($id);
        $lims_data->status = false;
        $lims_data->save();
        return redirect('lead_index')->with('not_permitted', 'Lead  deleted successfully');
    }



    public function lead_deletebyselection(Request $request)
    {
        $lead_id = $request['employeeIdArray'];
        foreach ($lead_id as $id) {
            $lims_employee_data = Lead::find($id);
            $lims_employee_data->status = false;
            $lims_employee_data->save();
        }
        return 'Lead  deleted successfully!';
    }

    
    
    
    
    
    
    
    
    
    
    public function lead_status_list()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('lead_status-index')){
            $permissions = Role::findByName($role->name)->permissions;
            foreach ($permissions as $permission)
                $all_permission[] = $permission->name;
            if(empty($all_permission))
                $all_permission[] = 'dummy text';
            $lims_lead_status_all = LeadStatus::where('status', true)->get();
            return view('lead_status.index', compact('lims_lead_status_all', 'all_permission'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }



    public function lead_status_create()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('lead_status-add')){
            $lims_role_list = Role::where('is_active', true)->get();
            $lims_warehouse_list = Warehouse::where('is_active', true)->get();
            $lims_biller_list = Biller::where('is_active', true)->get();
            $lims_department_list = Department::where('is_active', true)->get();

            return view('lead_status.create', compact('lims_role_list', 'lims_warehouse_list', 'lims_biller_list', 'lims_department_list'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }



    public function lead_status_store(Request $request)
    {
        $message = 'Lead Status created successfully';
        $data = $request->all();
        $data['status_name'] = $data['status_name'];
        $data['description'] = $data['description'];
        $data['status'] = true;
        LeadStatus::create($data);
        return redirect('lead_status')->with('message', $message);
    }



    public function lead_status_update(Request $request)
    {
        $data = $request->all();
        $lims_lead_status_data = LeadStatus::find($request['lead_status_id']);
       // dd($data);
        $lims_lead_status_data->update($data);
        return redirect('lead_status')->with('message', 'Lead Status updated successfully');
    }


    public function lead_status_destroy($id)
    {

        $lims_employee_data = LeadStatus::find($id);
        $lims_employee_data->status = false;
        $lims_employee_data->save();
        return redirect('lead_status')->with('not_permitted', 'Employee deleted successfully');
    }


    public function lead_status_deletebyselection(Request $request)
    {


        $lead_status_id = $request['employeeIdArray'];
        foreach ($lead_status_id as $id) {
            $lims_employee_data = LeadStatus::find($id);
            $lims_employee_data->status = false;
            $lims_employee_data->save();
        }
        return 'Lead Status deleted successfully!';
    }


    public function lead_details($id)
    {

        $customer_id = Customer::where('lead_id',$id)->first();

        // if ($customer_id !=null){
            $lead = Lead::where('id',$id )->where('status', true)->first();
            $lims_remainder_all = Remainder::where('lead_id',$id)->where('status', true)->get();
            //dd($lims_remainder_all);
            $lims_quotation_all = Quotation::with('biller','lead', 'customer', 'supplier', 'user')->where('lead_id',$id)->orderBy('id', 'desc')->get();
            if(!empty($customer_id->id))
            {
                $lims_sale_all = Sale::where('customer_id',$customer_id->id)->orderBy('id', 'desc')->get();
                $lims_project_all = Project::where('customer_id',$customer_id->id)->orderBy('id', 'desc')->get();
                $lims_ticket_all = Ticket::where('customer_id',$customer_id->id)->orderBy('id', 'desc')->get();
            }else{
                $lims_sale_all = '';
                $lims_project_all = '';
                $lims_ticket_all = '';
            }
        
            //dd($lims_ticket_all);
            return view('lead.details', compact('lims_ticket_all','lims_project_all','lims_sale_all','lead','lims_remainder_all','lims_quotation_all'));
        // }else{
        //     return redirect()->back()->with('not_permitted', 'This Lead has no progress . ');
        // }

    }


    public function lead_description($id)
    {


        $lims_lead_data = Lead::where('id',$id)->first();
        //   dd($lims_lead_data);
        return $lims_lead_data->description;
      }













    public function lead_source_list()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('lead_source-index')){
            $permissions = Role::findByName($role->name)->permissions;
            foreach ($permissions as $permission)
                $all_permission[] = $permission->name;
            if(empty($all_permission))
                $all_permission[] = 'dummy text';
            $lims_lead_source_all = LeadSource::where('status', true)->get();
            return view('lead_source.index', compact('lims_lead_source_all', 'all_permission'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }




    public function lead_source_create()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('lead_source-add')){
            $lims_role_list = Role::where('is_active', true)->get();
            $lims_warehouse_list = Warehouse::where('is_active', true)->get();
            $lims_biller_list = Biller::where('is_active', true)->get();
            $lims_department_list = Department::where('is_active', true)->get();

            return view('lead_source.create', compact('lims_role_list', 'lims_warehouse_list', 'lims_biller_list', 'lims_department_list'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }





    public function lead_source_store(Request $request)
    {
        $message = 'Lead Source created successfully';
        $data = $request->all();
        $data['source_name'] = $data['source_name'];
        $data['description'] = $data['description'];
        $data['status'] = true;
        LeadSource::create($data);
        return redirect('lead_source')->with('message', $message);
    }


    public function lead_source_update(Request $request)
    {
        $data = $request->all();


        $lims_lead_status_data = LeadSource::find($request['lead_status_id']);
        // dd($data);
        $lims_lead_status_data->update($data);
        return redirect('lead_source')->with('message', 'Lead Source updated successfully');
    }


    public function lead_source_destroy($id)
    {
        $lims_employee_data = LeadSource::find($id);
        $lims_employee_data->status = false;
        $lims_employee_data->save();
        return redirect('lead_source')->with('not_permitted', 'Lead Source deleted successfully');
    }


    public function lead_source_deletebyselection(Request $request)
    {


        $lead_status_id = $request['employeeIdArray'];
        foreach ($lead_status_id as $id) {
            $lims_employee_data = LeadSource::find($id);
            $lims_employee_data->status = false;
            $lims_employee_data->save();
        }
        return 'Lead Source deleted successfully!';
    }





// Lead Category

    public function lead_category_list()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('lead_category-index')){
            $permissions = Role::findByName($role->name)->permissions;
            foreach ($permissions as $permission)
                $all_permission[] = $permission->name;
            if(empty($all_permission))
                $all_permission[] = 'dummy text';
            $lims_lead_category_all = LeadCategory::where('status', true)->get();
            return view('lead_category.index', compact('lims_lead_category_all', 'all_permission'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }


    public function lead_category_create()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('lead_category-add')){
            $lims_role_list = Role::where('is_active', true)->get();
            $lims_warehouse_list = Warehouse::where('is_active', true)->get();
            $lims_biller_list = Biller::where('is_active', true)->get();
            $lims_department_list = Department::where('is_active', true)->get();

            return view('lead_category.create', compact('lims_role_list', 'lims_warehouse_list', 'lims_biller_list', 'lims_department_list'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }


    public function lead_category_store(Request $request)
    {
        $message = 'Lead Category created successfully';
        $data = $request->all();


        $data['lead_cat_name'] = $data['lead_cat_name'];
        $data['description'] = $data['description'];
        $data['status'] = true;
        LeadCategory::create($data);
        return redirect('lead_category')->with('message', $message);
    }


    public function lead_category_update(Request $request)
    {
        $data = $request->all();
        $lims_lead_status_data = LeadCategory::find($request['lead_status_id']);
        $lims_lead_status_data->update($data);
        return redirect('lead_category')->with('message', 'Lead Category updated successfully');
    }


    public function lead_category_destroy($id)
    {
        $lims_employee_data = LeadCategory::find($id);
        $lims_employee_data->status = false;
        $lims_employee_data->save();
        return redirect('lead_category')->with('not_permitted', 'Lead Category deleted successfully');
    }


    public function lead_category_deletebyselection(Request $request)
    {


        $lead_status_id = $request['employeeIdArray'];
        foreach ($lead_status_id as $id) {
            $lims_employee_data = LeadCategory::find($id);
            $lims_employee_data->status = false;
            $lims_employee_data->save();
        }
        return 'Lead Category deleted successfully!';
    }



 





}
