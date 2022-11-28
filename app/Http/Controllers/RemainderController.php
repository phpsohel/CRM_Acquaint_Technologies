<?php

namespace App\Http\Controllers;

use App\Lead;
use App\LeadRemainder;
use App\Remainder;
use App\User;
use App\Employee;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\LeadStatus;
use Auth;

class RemainderController extends Controller
{
    public function index(Request $request)
    {
        
        $role = Role::find(Auth::user()->role_id);
      
      
        if($role->hasPermissionTo('remainder-index')){
            $permissions = Role::findByName($role->name)->permissions;
            foreach ($permissions as $permission)
                $all_permission[] = $permission->name;
            if(empty($all_permission))
                $all_permission[] = 'dummy text';
            //$lims_employee_list = Employee::where('is_active', true)->get();
            $lims_user_list = User::where('role_id','!=',5)->where('is_active', true)->get();
            $lims_lead_list = Lead::where('status', true)->get();
            $paginate= 20;
            if($role->name == 'Admin')
            {
                $lims_remainder_all = Remainder::orderBy('id','DESC')->where('status', true)->paginate($paginate);
            }else{
                $lims_remainder_all = Remainder::orderBy('id','DESC')->where('status', true)->where('user_id',Auth()->user()->id)->paginate($paginate);
            }
        

            return view('remainder.index', compact('lims_remainder_all','lims_user_list','lims_lead_list', 'all_permission'))
            ->with('i', ($request->input('page', 1) - 1) * $paginate);
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }

 


    public function getRemainderData(Request $request)
    {
        
      
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('remainder-index')){
            $permissions = Role::findByName($role->name)->permissions;
            foreach ($permissions as $permission)
                $all_permission = $permission->name;
            if(empty($all_permission))
                $all_permission = 'dummy text';
            //$lims_employee_list = Employee::where('is_active', true)->get();
         
            $lims_lead_list= Lead::where('status', true)->get();
            $paginate= 200;
          //  $data['lims_remainder_all'] = Remainder::orderBy('id','DESC')->where('status', true)->paginate($paginate);
            $lims_remainder_all =  Remainder::select('remainders.*')
            ->with('user','lead','employee')
            ->join('users', 'remainders.user_id', '=', 'users.id')
            ->leftjoin('leads', 'leads.id', '=', 'remainders.lead_id')
            ->where([
                ['users.name', 'LIKE', "%{$request->searchingdata}%"],
               
            ])
            ->orWhere([
                ['leads.company', 'LIKE', "%{$request->searchingdata}%"],
            ])
            ->paginate($paginate);

            return view('remainder.get_remainder_by_ajax',compact('lims_remainder_all','lims_lead_list', 'all_permission'))->with('i', ($request->input('page', 1) - 1) * $paginate);
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
       
    }




    public function create()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('remainder-add')){
            $data['lims_role_list'] = Role::where('is_active', true)->get();

           // $lims_employee_list = Employee::where('is_active', true)->get();
            $data['lims_user_list'] = User::where('role_id','!=',5)->where('is_active', true)->get();
            $data['lims_lead_list'] = Lead::where('status', true)->get();
            $data['item'] = new Remainder();
            return view('remainder.create', $data);
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }

    public function addremainderLeadId($id)
    {
        
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('remainder-add')){
            $data['lims_role_list'] = Role::where('is_active', true)->get();

           // $lims_employee_list = Employee::where('is_active', true)->get();
            $data['lims_user_list'] = User::where('role_id','!=',5)->where('is_active', true)->get();
            $data['lead'] = Lead::select('id','name','company')->find($id);
            $data['item'] = new Remainder();
            return view('remainder.create', $data);
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }


    public function store(Request $request)
    {

        $message = 'Remaider created successfully';
        $data = $request->all();
        $data['status'] = true;
        Remainder::create($data);
        return redirect('remainder')->with('message', $message);
    }

    public function edit($id)
    {
      // return $data['item'] =  Remainder::find($id);
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('remainder-add')){
            $data['lims_role_list'] = Role::where('is_active', true)->get();

           // $lims_employee_list = Employee::where('is_active', true)->get();
            $data['lims_user_list'] = User::where('role_id','!=',5)->where('is_active', true)->get();
            $data['item'] = $item =  Remainder::find($id);
            $data['lead'] = Lead::select('id','name','company')->where('id',$item->lead_id)->first();
            return view('remainder.create', $data);
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }


    public function update(Request $request,$id)
    {
       //return $request->all();
        $data = $request->all();
        $lims_remainder_data = Remainder::find($id);
        $lims_remainder_data->update($data);
        return redirect('remainder')->with('message', 'Remainder updated successfully');
    }


    public function changeStatus($id)
    {

        $lims_rmainder_data = Remainder::find($id);
       if ($lims_rmainder_data->stage == 0){
           $lims_rmainder_data->stage = 1;
           $lims_rmainder_data->save();
       }else{

           $lims_rmainder_data->stage = 0;
           $lims_rmainder_data->save();
       }

        return redirect('remainder')->with('not_permitted', 'Status Change successfully');
    }





    public function todayschangeStatus($id)
    {

        $lims_rmainder_data = Remainder::find($id);
        if ($lims_rmainder_data->stage == 0){
            $lims_rmainder_data->stage = 1;
            $lims_rmainder_data->save();
        }else{

            $lims_rmainder_data->stage = 0;
            $lims_rmainder_data->save();
        }

        return redirect('/todys/reminder')->with('not_permitted', 'Status Change successfully');
    }


    public function destroy($id)
    {

        $lims_employee_data = Remainder::find($id);
        $lims_employee_data->status = false;
        $lims_employee_data->save();
        return redirect('remainder')->with('not_permitted', 'Remainder deleted successfully');
    }


    public function todaysremainder_destroy($id)
    {

        $lims_employee_data = Remainder::find($id);
        $lims_employee_data->status = false;
        $lims_employee_data->save();
        return redirect('/todys/reminder')->with('not_permitted', 'Remainder deleted successfully');
    }







    public function remainder_deletebyselection(Request $request)
    {


        $lead_remainder = $request['employeeIdArray'];
        foreach ($lead_remainder as $id) {
            $lims_employee_data = Remainder::find($id);
            $lims_employee_data->status = false;
            $lims_employee_data->save();
        }
        return 'Remainder deleted successfully!';
    }

    // lead Reaminder



    public function lead_remainder_list()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('employees-index')){
            $permissions = Role::findByName($role->name)->permissions;
            foreach ($permissions as $permission)
                $all_permission[] = $permission->name;
            if(empty($all_permission))
                $all_permission[] = 'dummy text';
            $lims_remainder_all = Remainder::where('status', true)->get();
            $lims_lead_list = Lead::where('status', true)->get();
            $lims_lead_remainder_list = LeadRemainder::where('status', true)->get();
            return view('lead_remainder.index', compact('lims_lead_list','lims_lead_remainder_list', 'lims_remainder_all','all_permission'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }



    public function lead_remainder_create()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('employees-add')){
            $lims_role_list = Role::where('is_active', true)->get();
            $lims_lead_list = Lead::where('status', true)->get();
            $lims_remainder_list = Remainder::where('status', true)->get();
            return view('lead_remainder.create', compact('lims_role_list', 'lims_lead_list','lims_remainder_list'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }


    public function lead_remainder_store(Request $request)
    {

        $message = ' Lead Remaider created successfully';
        $data = $request->all();
        $data['status'] = true;
        LeadRemainder::create($data);
        return redirect('/lead/remainder')->with('message', $message);
    }



    public function lead_remainder_update(Request $request)
    {
        $data = $request->all();
        $lims_lead_remainder_data = LeadRemainder::find($request['lead_remainder_id']);
        $lims_lead_remainder_data->update($data);
        return redirect('/lead/remainder')->with('message', ' Lead Remainder updated successfully');
    }


    public function lead_remainder_destroy($id)
    {

        $lims_lead_remainder_data = LeadRemainder::find($id);
        $lims_lead_remainder_data->status = false;
        $lims_lead_remainder_data->save();
        return redirect('/lead/remainder')->with('not_permitted', 'Lead Remainder deleted successfully');
    }


    public function lead_Remainder_deletebyselection(Request $request)
    {
        $lead_remainder = $request['employeeIdArray'];
        foreach ($lead_remainder as $id) {
            $lims_lead_remainder_data = LeadRemainder::find($id);
            $lims_lead_remainder_data->status = false;
            $lims_lead_remainder_data->save();
        }
        return redirect('/lead/remainder')->with('not_permitted', 'Lead Remainder deleted successfully');
    }





    public function create_new_reminder($lead_id)
    {



            // $lims_employee_list = Employee::where('is_active', true)->get();
            $lims_user_list = User::where('role_id','!=',5)->where('is_active', true)->get();
            $lims_lead_list = Lead::where('status', true)->get();
            $reminder = Remainder::orderBy('id','DESC')->where('lead_id',$lead_id)->where('status', true)->first();

            return view('remainder.create_new', compact('lims_user_list','lims_lead_list','reminder'));


    }


    public function create_new_reminder_store(Request $request)
    {

        $message = 'Remaider created successfully';
        $data = $request->all();
        $data['status'] = true;
        Remainder::create($data);
        return redirect('/todys/reminder')->with('message', $message);
    }


    public function todays_remainder_update(Request $request)
    {
        $data = $request->all();
        $lims_remainder_data = Remainder::find($request['remainder_id']);
        $lims_remainder_data->update($data);
        return redirect('/todys/reminder')->with('message', 'Remainder updated successfully');
    }









}
