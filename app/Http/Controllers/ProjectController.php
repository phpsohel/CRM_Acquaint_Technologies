<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Employee;
use App\Lead;
use App\LeadCategory;
use App\Project;
use App\Ticket;
use App\TicketReplies;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Warehouse;
use App\Sale;
use App\Customer;
use App\Department;

use Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function project_list()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('project-index')){
            $permissions = Role::findByName($role->name)->permissions;
            foreach ($permissions as $permission)
                $all_permission[] = $permission->name;
            if(empty($all_permission))
                $all_permission[] = 'dummy text';
            $lims_customer_list = Customer::where('is_active', true)->get();
            $lims_lead_list = Lead::where('status', true)->get();
            $lims_sale_list = Sale::orderBy('id','DESC')->get();
            $lims_project_all  = Project::where('status', true)->get();
            return view('project.index', compact('lims_customer_list','lims_lead_list','lims_sale_list','lims_project_all', 'all_permission'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }



    public function project_create()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('project-add')){
            $lims_role_list = Role::where('is_active', true)->get();
            $lims_customer_list = Customer::where('is_active', true)->get();
            $lims_lead_list = Lead::where('status', true)->get();
            $lims_sale_list = Sale::orderBy('id','DESC')->get();
            return view('project.create', compact('lims_role_list', 'lims_customer_list', 'lims_lead_list', 'lims_sale_list'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }









    public function project_store(Request $request)
    {
        $message = 'Project Created successfully';
        $data = $request->all();
      //  dd($data);
        $data['status'] = true;
        Project::create($data);
        return redirect('project')->with('message', $message);
    }



    public function project_update(Request $request)
    {
        $data = $request->all();

        $lims_project_data = Project::find($request['project_id']);
        $lims_project_data->update($data);
        return redirect('project')->with('message', 'Project  updated successfully');
    }

    public function project_destroy($id)
    {

        $lims_project_data = Project::find($id);
        $lims_project_data->status = false;
        $lims_project_data->save();
        return redirect('project')->with('not_permitted', 'Project deleted successfully');
    }



    public function project_deletebyselection(Request $request)
    {


        $project_id = $request['employeeIdArray'];
        foreach ($project_id as $id) {
            $lims_project_data = Project::find($id);
            $lims_project_data->status = false;
            $lims_project_data->save();
        }
        return 'Project  deleted successfully!';
    }




    // Ticket Function
    public function ticket_list()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('ticket-index')){
            $permissions = Role::findByName($role->name)->permissions;
            foreach ($permissions as $permission)
                $all_permission[] = $permission->name;
            if(empty($all_permission))
                $all_permission[] = 'dummy text';
            $lims_customer_list = Customer::where('is_active', true)->get();
            $lims_lead_cat_list = LeadCategory::where('status', true)->get();
            $lims_department_list = Department::where('is_active',true)->get();
            $lims_employee_list = Employee::where('is_active',true)->get();
            $lims_ticket_all  = Ticket::where('status', true)->orderBy('id','Desc')->get();
            return view('ticket.index', compact('lims_employee_list','lims_customer_list','lims_lead_cat_list','lims_department_list','lims_ticket_all', 'all_permission'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }




    public function ticket_create()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('ticket-add')){
            $lims_role_list = Role::where('is_active', true)->get();
            $lims_customer_list = Customer::where('is_active', true)->get();
            $lims_lead_cat_list = LeadCategory::where('status', true)->get();
            $lims_department_list = Department::where('is_active',true)->get();
            $lims_employee_list = Employee::where('is_active',true)->get();
            return view('ticket.create', compact('lims_employee_list','lims_role_list', 'lims_customer_list', 'lims_lead_cat_list', 'lims_department_list'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }


    public function ticket_store(Request $request)
    {



        $data = $request->except('attachment');
        $data['ticket_code'] = 'tic-' . date("Ymd") . '-'. date("his");
        $message = 'Ticket Created successfully';
        $attachment = $request->attachment;
        if($attachment){
            $v = Validator::make(
                [
                    'extension' => strtolower($request->attachment->getClientOriginalExtension()),
                ],
                [
                    'extension' => 'in:jpg,jpeg,png,gif,pdf,csv,docx,xlsx,txt',
                ]
            );
            if ($v->fails())
                return redirect()->back()->withErrors($v->errors());
            $attachmentName = $attachment->getClientOriginalName();
            $attachment->move('public/ticket/attachment', $attachmentName);
            $data['attachment'] = $attachmentName;
        }
        $data['status'] = true;
        Ticket::create($data);
        return redirect('ticket')->with('message', $message);
    }


    public function ticket_update(Request $request)
    {

        $data = $request->except('attachment');
        $attachment = $request->attachment;

        if($attachment) {
            $v = Validator::make(
                [
                    'extension' => strtolower($request->attachment->getClientOriginalExtension()),
                ],
                [
                    'extension' => 'in:jpg,jpeg,png,gif,pdf,csv,docx,xlsx,txt',
                ]
            );
            if ($v->fails())
                return redirect()->back()->withErrors($v->errors());

            $attachmentName = $attachment->getClientOriginalName();
            $attachment->move('public/ticket/attachment', $attachmentName);
            $data['attachment'] = $attachmentName;
        }

        $lims_ticket_data = Ticket::find($request['ticket_id']);
        $lims_ticket_data->update($data);
        return redirect('ticket')->with('message', 'Ticket  updated successfully');
    }

    public function ticket_destroy($id)
    {
        $lims_ticket_data = Ticket::find($id);
        $lims_ticket_data->status = false;
        $lims_ticket_data->save();
        return redirect('ticket')->with('not_permitted', 'Ticket deleted successfully');
    }


    public function ticket_deletebyselection(Request $request)
    {


        $ticket_id = $request['employeeIdArray'];
        foreach ($ticket_id as $id) {
            $lims_ticket_data = Ticket::find($id);
            $lims_ticket_data->status = false;
            $lims_ticket_data->save();
        }
        return 'Ticket  deleted successfully!';
    }






    // Ticket Reply
    public function ticket_replies_list()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('employees-index')){
            $permissions = Role::findByName($role->name)->permissions;
            foreach ($permissions as $permission)
                $all_permission[] = $permission->name;
            if(empty($all_permission))
                $all_permission[] = 'dummy text';
            $lims_user_list = User::where('is_active',true)->get();

            $lims_ticket_all  = Ticket::where('status', true)->orderBy('id','Desc')->get();
            return view('ticket_replies.index', compact('lims_user_list','lims_ticket_replies_list','lims_ticket_all', 'all_permission'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }


    public function ticket_replies_create()
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('employees-add')){
            $lims_role_list = Role::where('is_active', true)->get();
            $lims_ticket_list = Ticket::where('status', true)->get();
            $lims_ticket_replies_list  = TicketReplies::orderBy('id','Desc')->get();
            $lims_emoloyee_list = Employee::where('is_active',true)->get();
            return view('ticket_replies.create', compact('lims_ticket_replies_list','lims_emoloyee_list','lims_role_list', 'lims_ticket_list'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }


    public function ticket_replies_store(Request $request)
    {

     //   dd($request->all());

        $data = $request->except('attachment');
        $message = 'Ticket Reply successfully';
        $attachment = $request->attachment;
        if($attachment){
            $v = Validator::make(
                [
                    'extension' => strtolower($request->attachment->getClientOriginalExtension()),
                ],
                [
                    'extension' => 'in:jpg,jpeg,png,gif,pdf,csv,docx,xlsx,txt',
                ]
            );
            if ($v->fails())
                return redirect()->back()->withErrors($v->errors());
            $attachmentName = $attachment->getClientOriginalName();
            $attachment->move('public/ticket/attachment', $attachmentName);
            $data['attachment'] = $attachmentName;
        }
        TicketReplies::create($data);
        return redirect()->back()->with('message', $message);
    }


    public function ticket_replies_update(Request $request)
    {
        $data = $request->except('attachment');
        $attachment = $request->attachment;

        if($attachment) {
            $v = Validator::make(
                [
                    'extension' => strtolower($request->attachment->getClientOriginalExtension()),
                ],
                [
                    'extension' => 'in:jpg,jpeg,png,gif,pdf,csv,docx,xlsx,txt',
                ]
            );
            if ($v->fails())
                return redirect()->back()->withErrors($v->errors());

            $attachmentName = $attachment->getClientOriginalName();
            $attachment->move('public/ticket/attachment', $attachmentName);
            $data['attachment'] = $attachmentName;
        }

        $lims_ticket_replies_data = TicketReplies::find($request['ticket_replies_id']);
        $lims_ticket_replies_data->update($data);
        return redirect('ticket_replies')->with('message', 'Ticket Reply  updated successfully');
    }


    public function ticket_replies_destroy($id)
    {
        $lims_ticket_replies_data = TicketReplies::find($id);
        $lims_ticket_replies_data->delete();
        return redirect('ticket_replies')->with('not_permitted', 'Ticket Reply deleted successfully');
    }


    public function ticket_replies_deletebyselection(Request $request)
    {
        $ticket_replies_id = $request['employeeIdArray'];
        foreach ($ticket_replies_id as $id) {
            $lims_ticket_replies_data = TicketReplies::find($id);
            $lims_ticket_replies_data->delete();
        }
        return redirect('ticket_replies')->with('not_permitted', 'Ticket Reply deleted successfully');
    }


    public function projectCreate($id)
    {
        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('employees-add')){
            $lims_role_list = Role::where('is_active', true)->get();
            $lims_sale_list = Sale::find($id);
            $lims_customer_list = Customer::where('id',$lims_sale_list->customer_id)->where('is_active', true)->get();
//            $lims_lead_list = Lead::where('status', true)->get();
            return view('project.create_project', compact('lims_role_list', 'lims_customer_list','lims_sale_list'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');



    }



    public function ticketCreate($id)
    {


        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('employees-add')){
            $lims_role_list = Role::where('is_active', true)->get();
            $lims_project_list = Project::find($id);
            $lims_department_list = Department::where('is_active',true)->get();
            $lims_employee_list = Employee::where('is_active',true)->get();
            $lims_customer_list = Customer::where('id',$lims_project_list->customer_id)->where('is_active', true)->first();
            return view('ticket.create_ticket', compact('lims_employee_list','lims_department_list','lims_role_list', 'lims_customer_list','lims_project_list'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');



    }



    public function ticket_repliesCreate($id)
    {

        $role = Role::find(Auth::user()->role_id);
        if($role->hasPermissionTo('employees-add')){
            $lims_role_list = Role::where('is_active', true)->get();
            $lims_ticket_list = Ticket::where('id', $id)->first();
            $lims_ticket_replies_list = TicketReplies::where('ticket_id',$id)->orderBy('id','Desc')->get();
            $lims_employee_list = Employee::where('id',$lims_ticket_list->employee_id)->first();
            return view('ticket_replies.create_replies', compact('lims_ticket_replies_list','lims_employee_list','lims_role_list', 'lims_ticket_list'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }



    public function ticket_repliesDownload($name)
    {


        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/ticket/attachment/info.pdf";
        $attachment->move('/ticket/attachment', $attachmentName);

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, 'filename.pdf', $headers);
    }



}
