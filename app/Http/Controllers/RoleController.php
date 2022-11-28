<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roles;
use App\User;
use Auth;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        if(Auth::user()->role_id <= 2) {
            $lims_role_all = Roles::where('is_active', true)->get();
            return view('role.create', compact('lims_role_all'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }

    
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        
       // return $request->all();
        $validated = $request->validate([
            'name' => 'required|unique:roles|max:255',
            
        ]);

       // $data = $request->all();
        $allData = new Roles();
        $allData->name = $request->name;
        $allData->description = $request->description;
        $allData->is_active = $request->is_active;
        $allData->guard_name = $request->guard_name;
        $allData->save();
       // Roles::create($data);

        return redirect('role')->with('message', 'Data inserted successfully');

    }

    public function edit($id)
    {
        if(Auth::user()->role_id <= 2) {
            $lims_role_data = Roles::find($id);
            return $lims_role_data;
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }

    public function update(Request $request, $id)
    {
       
        if(!env('USER_VERIFIED'))
        return redirect()->back()->with('not_permitted', 'This feature is disable for demo!');

        $this->validate($request, [
            'name' => [
                'max:255',
                Rule::unique('roles')->ignore($request->role_id)->where(function ($query) {
                    return $query->where('is_active', 1);
                }),
            ],
        ]);
      

        $allData = Roles::where('id',$request->role_id)->first();
        $allData->name = $request->name;
        $allData->description = $request->description;
        $allData->guard_name = $request->guard_name;
        $allData->save();
        return redirect('role')->with('message', 'Data updated successfully');
    }

    public function permission($id)
    {
        if(Auth::user()->role_id <= 2) {
            $lims_role_data = Roles::find($id);
            $permissions = Permission::get();
           // return  $permissions;
            foreach ($permissions as $permission)
                $all_permission[] = $permission->name;
            if(empty($all_permission))
            {
                $all_permission[] = 'dummy text';
               
            }
           // dd($all_permission);
                
               
            return view('role.permission', compact('lims_role_data', 'all_permission'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }

    public function setPermission(Request $request)
    {
       
      // return $request->all();
        if(!env('USER_VERIFIED'))
            return redirect()->back()->with('not_permitted', 'This feature is disable for demo!');

        $role = Role::firstOrCreate(['id' => $request['role_id']]);




        if($request->has('lead-index')){
            $permission = Permission::firstOrCreate(['name' => 'lead-index']);
            if(!$role->hasPermissionTo('lead-index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('lead-index');

        if($request->has('lead-add')){
            $permission = Permission::firstOrCreate(['name' => 'lead-add']);
            if(!$role->hasPermissionTo('lead-add')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('lead-add');
        if($request->has('lead-edit')){
            $permission = Permission::firstOrCreate(['name' => 'lead-edit']);
            if(!$role->hasPermissionTo('lead-edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('lead-edit');

        if($request->has('lead-delete')){
            $permission = Permission::firstOrCreate(['name' => 'lead-delete']);
            if(!$role->hasPermissionTo('lead-delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('lead-delete');





        if($request->has('lead_status-index')){
            $permission = Permission::firstOrCreate(['name' => 'lead_status-index']);
            if(!$role->hasPermissionTo('lead_status-index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('lead_status-index');

        if($request->has('lead_status-add')){
            $permission = Permission::firstOrCreate(['name' => 'lead_status-add']);
            if(!$role->hasPermissionTo('lead_status-add')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('lead_status-add');

        if($request->has('lead_status-edit')){
            $permission = Permission::firstOrCreate(['name' => 'lead_status-edit']);
            if(!$role->hasPermissionTo('lead_status-edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('lead_status-edit');

        if($request->has('lead_status-delete')){
            $permission = Permission::firstOrCreate(['name' => 'lead_status-delete']);
            if(!$role->hasPermissionTo('lead_status-delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('lead_status-delete');





        if($request->has('lead_source-index')){
            $permission = Permission::firstOrCreate(['name' => 'lead_source-index']);
            if(!$role->hasPermissionTo('lead_source-index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('lead_source-index');

        if($request->has('lead_source-add')){
            $permission = Permission::firstOrCreate(['name' => 'lead_source-add']);
            if(!$role->hasPermissionTo('lead_source-add')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('lead_source-add');
        if($request->has('lead_source-edit')){
            $permission = Permission::firstOrCreate(['name' => 'lead_source-edit']);
            if(!$role->hasPermissionTo('lead_source-edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('lead_source-edit');

        if($request->has('lead_source-delete')){
            $permission = Permission::firstOrCreate(['name' => 'lead_source-delete']);
            if(!$role->hasPermissionTo('lead_source-delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('lead_source-delete');

        if($request->has('lead_category-index')){
            $permission = Permission::firstOrCreate(['name' => 'lead_category-index']);
            if(!$role->hasPermissionTo('lead_category-index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('lead_category-index');

        if($request->has('lead_category-add')){
            $permission = Permission::firstOrCreate(['name' => 'lead_category-add']);
            if(!$role->hasPermissionTo('lead_category-add')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('lead_category-add');
        if($request->has('lead_category-edit')){
            $permission = Permission::firstOrCreate(['name' => 'lead_category-edit']);
            if(!$role->hasPermissionTo('lead_category-edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('lead_category-edit');

        if($request->has('lead_category-delete')){
            $permission = Permission::firstOrCreate(['name' => 'lead_category-delete']);
            if(!$role->hasPermissionTo('lead_category-delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('lead_category-delete');

        if($request->has('remainder-index')){
            $permission = Permission::firstOrCreate(['name' => 'remainder-index']);
            if(!$role->hasPermissionTo('remainder-index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('remainder-index');

        if($request->has('remainder-add')){
            $permission = Permission::firstOrCreate(['name' => 'remainder-add']);
            if(!$role->hasPermissionTo('remainder-add')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('remainder-add');
        if($request->has('remainder-edit')){
            $permission = Permission::firstOrCreate(['name' => 'remainder-edit']);
            if(!$role->hasPermissionTo('remainder-edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('remainder-edit');

        if($request->has('remainder-delete')){
            $permission = Permission::firstOrCreate(['name' => 'remainder-delete']);
            if(!$role->hasPermissionTo('remainder-delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('remainder-delete');



        if($request->has('project-index')){
            $permission = Permission::firstOrCreate(['name' => 'project-index']);
            if(!$role->hasPermissionTo('project-index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('project-index');


        if($request->has('project-edit')){
            $permission = Permission::firstOrCreate(['name' => 'project-edit']);
            if(!$role->hasPermissionTo('project-edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('project-edit');

        if($request->has('project-delete')){
            $permission = Permission::firstOrCreate(['name' => 'project-delete']);
            if(!$role->hasPermissionTo('project-delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('project-delete');



        if($request->has('ticket-index')){
            $permission = Permission::firstOrCreate(['name' => 'ticket-index']);
            if(!$role->hasPermissionTo('ticket-index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('ticket-index');


        if($request->has('ticket-edit')){
            $permission = Permission::firstOrCreate(['name' => 'ticket-edit']);
            if(!$role->hasPermissionTo('ticket-edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('ticket-edit');

        if($request->has('ticket-delete')){
            $permission = Permission::firstOrCreate(['name' => 'ticket-delete']);
            if(!$role->hasPermissionTo('ticket-delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('ticket-delete');

        if($request->has('products-index')){
            $permission = Permission::firstOrCreate(['name' => 'products-index']);
            if(!$role->hasPermissionTo('products-index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('products-index');

        if($request->has('products-add')){
            $permission = Permission::firstOrCreate(['name' => 'products-add']);
            if(!$role->hasPermissionTo('products-add')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('products-add');
        if($request->has('products-edit')){
            $permission = Permission::firstOrCreate(['name' => 'products-edit']);
            if(!$role->hasPermissionTo('products-edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('products-edit');

        if($request->has('products-delete')){
            $permission = Permission::firstOrCreate(['name' => 'products-delete']);
            if(!$role->hasPermissionTo('products-delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('products-delete');


        if($request->has('sales-index')){
            $permission = Permission::firstOrCreate(['name' => 'sales-index']);
            if(!$role->hasPermissionTo('sales-index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('sales-index');


        if($request->has('sales-edit')){
            $permission = Permission::firstOrCreate(['name' => 'sales-edit']);
            if(!$role->hasPermissionTo('sales-edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('sales-edit');

        if($request->has('sales-delete')){
            $permission = Permission::firstOrCreate(['name' => 'sales-delete']);
            if(!$role->hasPermissionTo('sales-delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('sales-delete');





        if($request->has('expense_categories-index')){
            $permission = Permission::firstOrCreate(['name' => 'expense_categories-index']);
            if(!$role->hasPermissionTo('expense_categories-index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('expense_categories-index');

        if($request->has('expense_categories-add')){
            $permission = Permission::firstOrCreate(['name' => 'expense_categories-add']);
            if(!$role->hasPermissionTo('expense_categories-add')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('expense_categories-add');

        if($request->has('expense_categories-edit')){
            $permission = Permission::firstOrCreate(['name' => 'expense_categories-edit']);
            if(!$role->hasPermissionTo('expense_categories-edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('expense_categories-edit');

        if($request->has('expense_categories-delete')){
            $permission = Permission::firstOrCreate(['name' => 'expense_categories-delete']);
            if(!$role->hasPermissionTo('expense_categories-delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('expense_categories-delete');

        if($request->has('expenses-index')){
            $permission = Permission::firstOrCreate(['name' => 'expenses-index']);
            if(!$role->hasPermissionTo('expenses-index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('expenses-index');

        if($request->has('expenses-add')){
            $permission = Permission::firstOrCreate(['name' => 'expenses-add']);
            if(!$role->hasPermissionTo('expenses-add')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('expenses-add');

        if($request->has('expenses-edit')){
            $permission = Permission::firstOrCreate(['name' => 'expenses-edit']);
            if(!$role->hasPermissionTo('expenses-edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('expenses-edit');

        if($request->has('expenses-delete')){
            $permission = Permission::firstOrCreate(['name' => 'expenses-delete']);
            if(!$role->hasPermissionTo('expenses-delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('expenses-delete');

        if($request->has('quotes-index')){
            $permission = Permission::firstOrCreate(['name' => 'quotes-index']);
            if(!$role->hasPermissionTo('quotes-index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('quotes-index');

        if($request->has('quotes-add')){
            $permission = Permission::firstOrCreate(['name' => 'quotes-add']);
            if(!$role->hasPermissionTo('quotes-add')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('quotes-add');

        if($request->has('quotes-edit')){
            $permission = Permission::firstOrCreate(['name' => 'quotes-edit']);
            if(!$role->hasPermissionTo('quotes-edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('quotes-edit');

        if($request->has('quotes-delete')){
            $permission = Permission::firstOrCreate(['name' => 'quotes-delete']);
            if(!$role->hasPermissionTo('quotes-delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('quotes-delete');




        if($request->has('department')){
            $permission = Permission::firstOrCreate(['name' => 'department']);
            if(!$role->hasPermissionTo('department')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('department');

        if($request->has('attendance')){
            $permission = Permission::firstOrCreate(['name' => 'attendance']);
            if(!$role->hasPermissionTo('attendance')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('attendance');

        if($request->has('payroll')){
            $permission = Permission::firstOrCreate(['name' => 'payroll']);
            if(!$role->hasPermissionTo('payroll')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('payroll');



        if($request->has('employees-index')){
            $permission = Permission::firstOrCreate(['name' => 'employees-index']);
            if(!$role->hasPermissionTo('employees-index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('employees-index');

        if($request->has('employees-add')){
            $permission = Permission::firstOrCreate(['name' => 'employees-add']);
            if(!$role->hasPermissionTo('employees-add')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('employees-add');

        if($request->has('employees-edit')){
            $permission = Permission::firstOrCreate(['name' => 'employees-edit']);
            if(!$role->hasPermissionTo('employees-edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('employees-edit');

        if($request->has('employees-delete')){
            $permission = Permission::firstOrCreate(['name' => 'employees-delete']);
            if(!$role->hasPermissionTo('employees-delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('employees-delete');




        if($request->has('users-index')){
            $permission = Permission::firstOrCreate(['name' => 'users-index']);
            if(!$role->hasPermissionTo('users-index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('users-index');

        if($request->has('users-add')){
            $permission = Permission::firstOrCreate(['name' => 'users-add']);
            if(!$role->hasPermissionTo('users-add')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('users-add');

        if($request->has('users-edit')){
            $permission = Permission::firstOrCreate(['name' => 'users-edit']);
            if(!$role->hasPermissionTo('users-edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('users-edit');

        if($request->has('users-delete')){
            $permission = Permission::firstOrCreate(['name' => 'users-delete']);
            if(!$role->hasPermissionTo('users-delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('users-delete');



        if($request->has('customers-index')){
            $permission = Permission::firstOrCreate(['name' => 'customers-index']);
            if(!$role->hasPermissionTo('customers-index')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('customers-index');

        if($request->has('customers-add')){
            $permission = Permission::firstOrCreate(['name' => 'customers-add']);
            if(!$role->hasPermissionTo('customers-add')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('customers-add');

        if($request->has('customers-edit')){
            $permission = Permission::firstOrCreate(['name' => 'customers-edit']);
            if(!$role->hasPermissionTo('customers-edit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('customers-edit');

        if($request->has('customers-delete')){
            $permission = Permission::firstOrCreate(['name' => 'customers-delete']);
            if(!$role->hasPermissionTo('customers-delete')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('customers-delete');




        if($request->has('create_sale')){
            $permission = Permission::firstOrCreate(['name' => 'create_sale']);
            if(!$role->hasPermissionTo('create_sale')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('create_sale');

        if($request->has('create_project')){
            $permission = Permission::firstOrCreate(['name' => 'create_project']);
            if(!$role->hasPermissionTo('create_project')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('create_project');

        if($request->has('add_payment')){
            $permission = Permission::firstOrCreate(['name' => 'add_payment']);
            if(!$role->hasPermissionTo('add_payment')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('add_payment');


        if($request->has('view_payment')){
            $permission = Permission::firstOrCreate(['name' => 'view_payment']);
            if(!$role->hasPermissionTo('view_payment')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('view_payment');

        if($request->has('create_ticket')){
            $permission = Permission::firstOrCreate(['name' => 'create_ticket']);
            if(!$role->hasPermissionTo('create_ticket')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('create_ticket');

        if($request->has('create_ticket_reply')){
            $permission = Permission::firstOrCreate(['name' => 'create_ticket_reply']);
            if(!$role->hasPermissionTo('create_ticket_reply')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('create_ticket_reply');






        if($request->has('sale-report')){
            $permission = Permission::firstOrCreate(['name' => 'sale-report']);
            if(!$role->hasPermissionTo('sale-report')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('sale-report');

        if($request->has('payment-report')){
            $permission = Permission::firstOrCreate(['name' => 'payment-report']);
            if(!$role->hasPermissionTo('payment-report')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('payment-report');


        if($request->has('user-report')){
            $permission = Permission::firstOrCreate(['name' => 'user-report']);
            if(!$role->hasPermissionTo('user-report')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('user-report');

        if($request->has('customer-report')){
            $permission = Permission::firstOrCreate(['name' => 'customer-report']);
            if(!$role->hasPermissionTo('customer-report')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('customer-report');



        if($request->has('due-report')){
            $permission = Permission::firstOrCreate(['name' => 'due-report']);
            if(!$role->hasPermissionTo('due-report')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('due-report');

        if($request->has('backup_database')){
            $permission = Permission::firstOrCreate(['name' => 'backup_database']);
            if(!$role->hasPermissionTo('backup_database')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('backup_database');

        if($request->has('general_setting')){
            $permission = Permission::firstOrCreate(['name' => 'general_setting']);
            if(!$role->hasPermissionTo('general_setting')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('general_setting');





        if($request->has('hrm_setting')){
            $permission = Permission::firstOrCreate(['name' => 'hrm_setting']);
            if(!$role->hasPermissionTo('hrm_setting')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('hrm_setting');



        if($request->has('empty_database')){
            $permission = Permission::firstOrCreate(['name' => 'empty_database']);
            if(!$role->hasPermissionTo('empty_database')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('empty_database');

        if($request->has('send_notification')){
            $permission = Permission::firstOrCreate(['name' => 'send_notification']);
            if(!$role->hasPermissionTo('send_notification')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('send_notification');


        if($request->has('customer_group')){
            $permission = Permission::firstOrCreate(['name' => 'customer_group']);
            if(!$role->hasPermissionTo('customer_group')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('customer_group');

        if($request->has('brand')){
            $permission = Permission::firstOrCreate(['name' => 'brand']);
            if(!$role->hasPermissionTo('brand')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('brand');

        if($request->has('unit')){
            $permission = Permission::firstOrCreate(['name' => 'unit']);
            if(!$role->hasPermissionTo('unit')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('unit');

        if($request->has('currency')){
            $permission = Permission::firstOrCreate(['name' => 'currency']);
            if(!$role->hasPermissionTo('currency')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('currency');



        if($request->has('holiday')){
            $permission = Permission::firstOrCreate(['name' => 'holiday']);
            if(!$role->hasPermissionTo('holiday')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('holiday');


        if($request->has('category')){
            $permission = Permission::firstOrCreate(['name' => 'category']);
            if(!$role->hasPermissionTo('category')){
                $role->givePermissionTo($permission);
            }
        }
        else
            $role->revokePermissionTo('category');



        return redirect('role')->with('message', 'Permission updated successfully');
    }

    public function destroy($id)
    {
        if(!env('USER_VERIFIED'))
            return redirect()->back()->with('not_permitted', 'This feature is disable for demo!');
        $lims_role_data = Roles::find($id);
        $lims_role_data->is_active = false;
        $lims_role_data->save();
        return redirect('role')->with('not_permitted', 'Data deleted successfully');
    }
}
