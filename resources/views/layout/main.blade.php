<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="{{url('public/logo', $general_setting->site_logo)}}" />
    <title>{{$general_setting->site_title}}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="manifest" href="{{url('manifest.json')}}">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo asset('public/vendor/bootstrap/css/bootstrap.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('public/vendor/bootstrap-toggle/css/bootstrap-toggle.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('public/vendor/bootstrap/css/bootstrap-datepicker.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('public/vendor/jquery-timepicker/jquery.timepicker.min.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('public/vendor/bootstrap/css/awesome-bootstrap-checkbox.css') ?>" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('public/vendor/bootstrap/css/bootstrap-select.min.css') ?>" type="text/css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo asset('public/vendor/font-awesome/css/font-awesome.min.css') ?>" type="text/css">
    <!-- Drip icon font-->
    <link rel="stylesheet" href="<?php echo asset('public/vendor/dripicons/webfont.css') ?>" type="text/css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="<?php echo asset('public/css/grasp_mobile_progress_circle-1.0.0.min.css') ?>" type="text/css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="<?php echo asset('public/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css') ?>" type="text/css">
    <!-- virtual keybord stylesheet-->
    <link rel="stylesheet" href="<?php echo asset('public/vendor/keyboard/css/keyboard.css') ?>" type="text/css">
    <!-- date range stylesheet-->
    <link rel="stylesheet" href="<?php echo asset('public/vendor/daterange/css/daterangepicker.min.css') ?>" type="text/css">
    <!-- table sorter stylesheet-->
    <link rel="stylesheet" type="text/css" href="<?php echo asset('public/vendor/datatable/dataTables.bootstrap4.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/fixedHeader.bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/responsive.bootstrap.min.css') }}">
    <link rel="stylesheet" href="<?php echo asset('public/css/style.default.css') ?>" id="theme-stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('public/css/dropzone.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('public/css/style.css') ?>">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
     @yield('css')
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo asset('public/css/custom-'.$general_setting->theme) ?>" type="text/css" id="custom-style">
  </head>
  
  <body onload="myFunction()">
    <div id="loader"></div>
      <!-- Side Navbar -->
      <nav class="side-navbar">
        <div class="side-navbar-wrapper">
          <!-- Sidebar Header -->
          <!-- Sidebar Navigation Menus-->
          <div class="main-menu">
            <ul id="side-main-menu" class="side-menu list-unstyled">                  
              <li><a href="{{url('/')}}"> <i class="dripicons-meter"></i><span>{{ __('file.dashboard') }}</span></a></li>

                <?php

                $role = DB::table('roles')->find(Auth::user()->role_id);
                $category_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'category'],
                        ['role_id', $role->id] ])->first();

                $lead_index_permission = DB::table('permissions')->where('name', 'lead-index')->first();
                $lead_index_permission_active = DB::table('role_has_permissions')->where([
                    ['permission_id', $lead_index_permission->id],
                    ['role_id', $role->id]
                ])->first();

                $lead_status_permission = DB::table('permissions')->where('name', 'lead_status-index')->first();
                $lead_status_index_permission_active = DB::table('role_has_permissions')->where([
                    ['permission_id', $lead_status_permission->id],
                    ['role_id', $role->id]
                ])->first();

                $lead_source_permission = DB::table('permissions')->where('name', 'lead_source-index')->first();
                $lead_source_index_permission_active = DB::table('role_has_permissions')->where([
                    ['permission_id', $lead_source_permission->id],
                    ['role_id', $role->id]
                ])->first();


                $lead_category_permission = DB::table('permissions')->where('name', 'lead_category-index')->first();
                $lead_category_index_permission_active = DB::table('role_has_permissions')->where([
                    ['permission_id', $lead_category_permission->id],
                    ['role_id', $role->id]
                ])->first();

                $remainder_index_permission = DB::table('permissions')->where('name', 'remainder-index')->first();
                $remainder_index_permission_active = DB::table('role_has_permissions')->where([
                    ['permission_id', $remainder_index_permission->id],
                    ['role_id', $role->id]
                ])->first();
                ?>

                @if($lead_index_permission_active || $lead_status_index_permission_active || $lead_source_index_permission_active || $lead_category_index_permission_active || $remainder_index_permission_active )
                <li class=""><a href="#lead" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-list"></i><span>Lead</span></a>
                    <ul id="lead" class="collapse list-unstyled ">
                        @if($lead_index_permission_active)
                        <li id="employee-menu"><a href="{{route('lead.index')}}">Lead</a></li>
                        @endif
                     @if($lead_status_index_permission_active)
                        <li id="employee-menu"><a href="{{route('lead_status.index')}}">Lead Status</a></li>
                      @endif
                      @if($lead_source_index_permission_active)
                        <li id="employee-menu"><a href="{{route('lead_source.index')}}">Lead Source</a></li>
                       @endif
                       @if($lead_category_index_permission_active)
                        <li id="employee-menu"><a href="{{route('lead_category.index')}}">Lead Category</a></li>
                       @endif
                       @if($remainder_index_permission_active)
                        <li id="employee-menu"><a href="{{route('remainder.index')}}">Reminder</a></li>
                       @endif
                    </ul>
                </li>
              @endif


                <?php

                $role = DB::table('roles')->find(Auth::user()->role_id);
                $category_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'category'],
                        ['role_id', $role->id] ])->first();



                $sale_index_permission = DB::table('permissions')->where('name', 'sales-index')->first();
                $sale_index_permission_active = DB::table('role_has_permissions')->where([
                    ['permission_id', $sale_index_permission->id],
                    ['role_id', $role->id]
                ])->first();

                $index_permission = DB::table('permissions')->where('name', 'quotes-index')->first();
                $quotes_index_permission_active = DB::table('role_has_permissions')->where([
                    ['permission_id', $index_permission->id],
                    ['role_id', $role->id]
                ])->first();
                ?>
                @if($sale_index_permission_active || $quotes_index_permission_active )
                    <li><a href="#sale" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-cart"></i><span>{{trans('file.Sale')}}</span></a>
                        <ul id="sale" class="collapse list-unstyled ">
                            @if($sale_index_permission_active)
                                <li id="sale-list-menu"><a href="{{route('sales.index')}}">{{trans('file.Sale List')}}</a></li>
                            @endif
                            @if($quotes_index_permission_active)
                                <li id="quotation-list-menu"><a href="{{route('quotations.index')}}">{{trans('file.Quotation List')}}</a></li>
                            @endif
                        </ul>
                    </li>
                @endif


                <?php
                $customer_index_permission = DB::table('permissions')->where('name', 'customers-index')->first();
                $customer_index_permission_active = DB::table('role_has_permissions')->where([
                    ['permission_id', $customer_index_permission->id],
                    ['role_id', $role->id]
                ])->first();
                $customer_group_permission = DB::table('permissions')->where('name', 'customer_group')->first();
                $customer_group_permission_active = DB::table('role_has_permissions')->where([
                    ['permission_id', $customer_group_permission->id],
                    ['role_id', $role->id]
                ])->first();
                ?>
                @if($customer_index_permission_active || $customer_group_permission_active)
                    <li><a href="#people" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-user"></i><span>Customer</span></a>
                        <ul id="people" class="collapse list-unstyled ">
                            @if($customer_index_permission_active)
                                <li id="customer-list-menu"><a href="{{route('customer.index')}}">{{trans('file.Customer List')}}</a></li>
                            @endif
                            @if($customer_group_permission_active)
                                <li id="customer-group-menu"><a href="{{route('customer_group.index')}}">{{trans('file.Customer Group')}}</a></li>
                            @endif
                        </ul>
                    </li>
                @endif




                <?php
                $project_index_permission = DB::table('permissions')->where('name', 'project-index')->first();
                $project_index_permission_active = DB::table('role_has_permissions')->where([
                    ['permission_id', $project_index_permission->id],
                    ['role_id', $role->id]
                ])->first();

                ?>
                @if($project_index_permission_active)
                <li class=""><a href="#project" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-box"></i><span>Project</span></a>
                    <ul id="project" class="collapse list-unstyled ">
                        <li id="employee-menu"><a href="{{route('project.index')}}">Project</a></li>
                        {{--<li id="employee-menu"><a href="{{route('lead_remainder.index')}}">Lead Remainder</a></li>--}}

                    </ul>
                </li>
                @endif




                <?php
                $ticket_index_permission = DB::table('permissions')->where('name', 'ticket-index')->first();
                $ticket_index_permission_active = DB::table('role_has_permissions')->where([
                    ['permission_id', $ticket_index_permission->id],
                    ['role_id', $role->id]
                ])->first();

                ?>
                @if($ticket_index_permission_active)
                <li class=""><a href="#ticket" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-ticket"></i><span>Ticket</span></a>
                    <ul id="ticket" class="collapse list-unstyled ">
                        <li id="employee-menu"><a href="{{route('ticket.index')}}">Ticket</a></li>
                        {{--<li id="employee-menu"><a href="{{route('ticket_replies.index')}}">Ticket Replies</a></li>--}}

                    </ul>
                </li>
                @endif


              <?php


                $expense_category_index_permission = DB::table('permissions')->where('name', 'expense_categories-index')->first();
                $expense_category_index_permission_active = DB::table('role_has_permissions')->where([
                    ['permission_id', $expense_category_index_permission->id],
                    ['role_id', $role->id]
                ])->first();


                $expense_index_permission = DB::table('permissions')->where('name', 'expenses-index')->first();
                $expense_index_permission_active = DB::table('role_has_permissions')->where([
                        ['permission_id', $expense_index_permission->id],
                        ['role_id', $role->id]
                    ])->first();
               ?>
              @if($expense_category_index_permission_active || $expense_index_permission_active )
              <li><a href="#expense" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-wallet"></i><span>{{trans('file.Expense')}}</span></a>
                <ul id="expense" class="collapse list-unstyled ">
                 @if($expense_category_index_permission_active)
                  <li id="exp-cat-menu"><a href="{{route('expense_categories.index')}}">{{trans('file.Expense Category')}}</a></li>
                 @endif
                @if($expense_index_permission_active)
                  <li id="exp-list-menu"><a href="{{route('expenses.index')}}">{{trans('file.Expense List')}}</a></li>
                @endif
                </ul>
              </li>
              @endif

              <?php 
                $department = DB::table('permissions')->where('name', 'department')->first();
                $department_active = DB::table('role_has_permissions')->where([
                        ['permission_id', $department->id],
                        ['role_id', $role->id]
                    ])->first();

                $index_employee = DB::table('permissions')->where('name', 'employees-index')->first();
                $index_employee_active = DB::table('role_has_permissions')->where([
                        ['permission_id', $index_employee->id],
                        ['role_id', $role->id]
                    ])->first();

                $attendance = DB::table('permissions')->where('name', 'attendance')->first();
                $attendance_active = DB::table('role_has_permissions')->where([
                        ['permission_id', $attendance->id],
                        ['role_id', $role->id]
                    ])->first();

                $payroll = DB::table('permissions')->where('name', 'payroll')->first();
                $payroll_active = DB::table('role_has_permissions')->where([
                        ['permission_id', $payroll->id],
                        ['role_id', $role->id]
                    ])->first();


                $user_index_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'users-index'],
                        ['role_id', $role->id] ])->first();

                $holiday_index_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'holiday-index'],
                        ['role_id', $role->id] ])->first();

              ?>

              @if(Auth::user()->role_id != 5)
              <li class=""><a href="#hrm" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-user-group"></i><span>HRM</span></a>
                <ul id="hrm" class="collapse list-unstyled ">
                  @if($user_index_permission_active)
                        <li id="user-list-menu"><a href="{{route('user.index')}}">{{trans('file.User List')}}</a></li>
                  @endif
                  @if($department_active)
                  <li id="dept-menu"><a href="{{route('departments.index')}}">{{trans('file.Department')}}</a></li>
                  @endif
                  @if($index_employee_active)
                  <li id="employee-menu"><a href="{{route('employees.index')}}">{{trans('file.Employee')}}</a></li>
                  @endif
                  @if($attendance_active)
                  <li id="attendance-menu"><a href="{{route('attendance.index')}}">{{trans('file.Attendance')}}</a></li>
                  @endif
                  @if($payroll_active)
                  <li id="payroll-menu"><a href="{{route('payroll.index')}}">{{trans('file.Payroll')}}</a></li>
                  @endif
                 @if($holiday_index_permission_active)
                  <li id="holiday-menu"><a href="{{route('holidays.index')}}">{{trans('file.Holiday')}}</a></li>
                 @endif
                </ul>
              </li>
              @endif

                <?php
                $role = DB::table('roles')->find(Auth::user()->role_id);
                $category_permission_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'category'],
                        ['role_id', $role->id] ])->first();
                $index_permission = DB::table('permissions')->where('name', 'products-index')->first();
                $index_permission_active = DB::table('role_has_permissions')->where([
                    ['permission_id', $index_permission->id],
                    ['role_id', $role->id]
                ])->first();

                ?>
                @if($category_permission_active || $index_permission_active)
                    <li><a href="#product" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-wallet"></i><span> Product/Service</span><span></a>
                        <ul id="product" class="collapse list-unstyled ">
                            @if($category_permission_active)
                                <li id="category-menu"><a href="{{route('category.index')}}">{{__('file.category')}}</a></li>
                            @endif
                            @if($index_permission_active)
                                <li id="product-list-menu"><a href="{{route('products.index')}}">{{__('file.product_list')}}</a></li>
                            @endif
                        </ul>
                    </li>
                @endif


                <?php

                $sale_report_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'sale-report'],
                        ['role_id', $role->id] ])->first();

                $payment_report_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'payment-report'],
                        ['role_id', $role->id] ])->first();

                $user_report_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'user-report'],
                        ['role_id', $role->id] ])->first();


                $customer_report_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'customer-report'],
                        ['role_id', $role->id] ])->first();

                $due_report_active = DB::table('permissions')
                    ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
                    ->where([
                        ['permissions.name', 'due-report'],
                        ['role_id', $role->id] ])->first();
                ?>
                @if( $sale_report_active || $payment_report_active || $user_report_active || $customer_report_active  || $due_report_active)
                
                    <li><a href="#report" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-document-remove"></i><span>{{trans('file.Reports')}}</span></a>
                        <ul id="report" class="collapse list-unstyled ">



                            <li id="lead_employee-report-menu">
                                {!! Form::open(['route' => 'report.lead_employee', 'method' => 'post', 'id' => 'lead_employee-report-form']) !!}
                                <input type="hidden" name="start_date" value="{{date('Y-m-d')}}" />
                                <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                                <input type="hidden" name="employee_id" value="0" />
                                <input type="hidden" name="lead_cat_id" value="0" />
                                <input type="hidden" name="thana_id" value="0" />
                                <a id="lead_employee-report-link" href="">Lead Category Report</a>
                                {!! Form::close() !!}
                            </li>

                            <li id="lead_source-report-menu">
                                {!! Form::open(['route' => 'report.lead_source', 'method' => 'post', 'id' => 'lead_source-report-form']) !!}
                                <input type="hidden" name="start_date" value="{{date('Y-m-d')}}" />
                                <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                                <input type="hidden" name="employee_id" value="0" />
                                <input type="hidden" name="lead_source_id" value="0" />
                                <a id="lead_source-report-link" href="">Lead source Report</a>
                                {!! Form::close() !!}
                            </li>

                            <li id="lead_status-report-menu">
                                {!! Form::open(['route' => 'report.lead_status', 'method' => 'post', 'id' => 'lead_status-report-form']) !!}
                                <input type="hidden" name="start_date" value="{{date('Y-m-d')}}" />
                                <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                                <input type="hidden" name="employee_id" value="0" />
                                <input type="hidden" name="lead_status_id" value="0" />
                                <a id="lead_status-report-link" href="">Lead Status Report</a>
                                {!! Form::close() !!}
                            </li>


                            <li id="lead_reminder-report-menu">
                                {!! Form::open(['route' => 'report.lead_reminder_report', 'method' => 'post', 'id' => 'lead_reminder-report-form']) !!}
                                <input type="hidden" name="start_date" value="{{date('Y-m-d')}}" />
                                <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                                <input type="hidden" name="user_id" value="0" />
                                <input type="hidden" name="stage" value="2"/>
                                <a id="lead_reminder-report-link" href="">Lead Reminder Report</a>
                                {!! Form::close() !!}
                            </li>



                            @if($sale_report_active)
                                <li id="sale-report-menu">
                                    {!! Form::open(['route' => 'report.sale', 'method' => 'post', 'id' => 'sale-report-form']) !!}
                                    <input type="hidden" name="start_date" value="{{date('Y-m-d')}}" />
                                    <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                                    <input type="hidden" name="warehouse_id" value="0" />
                                    <a id="sale-report-link" href="">{{trans('file.Sale Report')}}</a>
                                    {!! Form::close() !!}
                                </li>
                            @endif



                            @if($payment_report_active)
                                <li id="payment-report-menu">
                                    {!! Form::open(['route' => 'report.paymentByDate', 'method' => 'post', 'id' => 'payment-report-form']) !!}
                                    <input type="hidden" name="start_date" value="{{date('Y-m-d')}}" />
                                    <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                                    <a id="payment-report-link" href="">{{trans('file.Payment Report')}}</a>
                                    {!! Form::close() !!}
                                </li>
                            @endif

                            @if($user_report_active)
                                <li id="user-report-menu">
                                    <a id="user-report-link" href="">{{trans('file.User Report')}}</a>
                                </li>
                            @endif
                            @if($customer_report_active)
                                <li id="customer-report-menu">
                                    <a id="customer-report-link" href="">{{trans('file.Customer Report')}}</a>
                                </li>
                            @endif

                            @if($due_report_active)
                                <li id="due-report-menu">
                                    {!! Form::open(['route' => 'report.dueByDate', 'method' => 'post', 'id' => 'due-report-form']) !!}
                                    <input type="hidden" name="start_date" value="{{date('Y-m-d')}}" />
                                    <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />
                                    <a id="due-report-link" href="">{{trans('file.Due Report')}}</a>
                                    {!! Form::close() !!}
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif


              <?php

//                $product_qty_alert_active = DB::table('permissions')
//                      ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
//                      ->where([
//                        ['permissions.name', 'product-qty-alert'],
//                        ['role_id', $role->id] ])->first();


              ?>
              
              <li><a href="#setting" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-gear"></i><span>{{trans('file.settings')}}</span></a>
                <ul id="setting" class="collapse list-unstyled ">
                  <?php
                      $send_notification_permission = DB::table('permissions')->where('name', 'send_notification')->first();
                      $send_notification_permission_active = DB::table('role_has_permissions')->where([
                                  ['permission_id', $send_notification_permission->id],
                                  ['role_id', $role->id]
                              ])->first();
                      $unit_permission = DB::table('permissions')->where('name', 'unit')->first();
                      $unit_permission_active = DB::table('role_has_permissions')->where([
                                  ['permission_id', $unit_permission->id],
                                  ['role_id', $role->id]
                              ])->first();

                      $currency_permission = DB::table('permissions')->where('name', 'currency')->first();
                      $currency_permission_active = DB::table('role_has_permissions')->where([
                                  ['permission_id', $currency_permission->id],
                                  ['role_id', $role->id]
                              ])->first();


                      $general_setting_permission = DB::table('permissions')->where('name', 'general_setting')->first();
                      $general_setting_permission_active = DB::table('role_has_permissions')->where([
                                  ['permission_id', $general_setting_permission->id],
                                  ['role_id', $role->id]
                              ])->first();

                      $backup_database_permission = DB::table('permissions')->where('name', 'backup_database')->first();
                      $backup_database_permission_active = DB::table('role_has_permissions')->where([
                                  ['permission_id', $backup_database_permission->id],
                                  ['role_id', $role->id]
                              ])->first();

                      $hrm_setting_permission = DB::table('permissions')->where('name', 'hrm_setting')->first();
                      $hrm_setting_permission_active = DB::table('role_has_permissions')->where([
                          ['permission_id', $hrm_setting_permission->id],
                          ['role_id', $role->id]
                      ])->first();
                  ?>
                  @if($role->id <= 2)
                  <li id="role-menu"><a href="{{route('role.index')}}">{{trans('file.Role Permission')}}</a></li>
                  @endif

                  <li id="notification-menu">
                    <a href="" id="send-notification">{{trans('file.Send Notification')}}</a>
                  </li>

                  @if($unit_permission_active)
                  <li id="unit-menu"><a href="{{route('unit.index')}}">{{trans('file.Unit')}}</a></li>
                  @endif
                  @if($currency_permission_active)
                  <li id="currency-menu"><a href="{{route('currency.index')}}">{{trans('file.Currency')}}</a></li>
                  @endif

                  @if($backup_database_permission_active)
                  <li><a href="{{route('setting.backup')}}">{{trans('file.Backup Database')}}</a></li>
                  @endif
                  @if($general_setting_permission_active)
                  <li id="general-setting-menu"><a href="{{route('setting.general')}}">{{trans('file.General Setting')}}</a></li>
                  @endif

                  @if($hrm_setting_permission_active)
                  <li id="hrm-setting-menu"><a href="{{route('setting.hrm')}}"> {{trans('file.HRM Setting')}}</a></li>
                  @endif
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <a id="toggle-btn" href="#" class="menu-btn"><i class="fa fa-bars"> </i></a>
              <span class="brand-big" style="left:12%;">@if($general_setting->site_logo)<img src="{{url('public/logo', $general_setting->site_logo)}}" width="150">&nbsp;&nbsp;@endif<a href="{{url('/')}}">
                  <h1 class="d-inline" style="display:none !important;">{{$general_setting->site_title}}</h1></a></span>
              
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <?php

                   $dt       =\Carbon\Carbon::now();
                   $today    = \Carbon\Carbon::parse($dt)->format('Y-m-d');
                  if(Auth()->user()->role_id == 1)
                  {
                    $lims_reminder_data = \App\Remainder::whereDate('noti_datetime',$today)->where('stage', 0)->where('status',true)->get();
                  }else{
                    $lims_reminder_data = \App\Remainder::whereDate('noti_datetime',$today)->where('user_id',Auth()->user()->id)->where('stage', 0)->where('status',true)->get();

                  }

                  $total_reminder = count($lims_reminder_data);

             //     dd(\Auth::user()->unreadNotifications);


//                  $add_permission = DB::table('permissions')->where('name', 'sales-add')->first();
//                  $add_permission_active = DB::table('role_has_permissions')->where([
//                      ['permission_id', $add_permission->id],
//                      ['role_id', $role->id]
//                  ])->first();
//
//                  $empty_database_permission = DB::table('permissions')->where('name', 'empty_database')->first();
//                  $empty_database_permission_active = DB::table('role_has_permissions')->where([
//                      ['permission_id', $empty_database_permission->id],
//                      ['role_id', $role->id]
//                  ])->first();
                ?>
                <li class="nav-item"><a id="btnFullscreen"><i class="dripicons-expand"></i></a></li>


                  <li class="nav-item" id="notification-icon">
                        <a rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-item"><i class="dripicons-bell"></i><span class="badge badge-danger notification-number">{{$total_reminder + count(\Auth::user()->unreadNotifications)}}</span>
                        </a>
                        <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default notifications" user="menu">
                            <li class="notifications">
                              <a href="{{route('todys.reminder')}}" class="btn btn-link">  Today's Reminders ( {{$total_reminder}} ) </a>
                            </li>
                            @foreach(\Auth::user()->unreadNotifications as $key => $notification)
                                <li class="notifications">
                                    <a href="#" class="btn btn-link">{{ $notification->data['message'] }}</a>
                                </li>
                            @endforeach
                        </ul>
                  </li>
                  {{--@elseif(count(\Auth::user()->unreadNotifications) > 0)--}}
                  {{--<li class="nav-item" id="notification-icon">--}}
                        {{--<a rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-item"><i class="dripicons-bell"></i><span class="badge badge-danger notification-number">{{count(\Auth::user()->unreadNotifications)}}</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default notifications" user="menu">--}}
                            {{--@foreach(\Auth::user()->unreadNotifications as $key => $notification)--}}
                                {{--<li class="notifications">--}}
                                    {{--<a href="#" class="btn btn-link">{{ $notification->data['message'] }}</a>--}}
                                {{--</li>--}}
                            {{--@endforeach--}}
                        {{--</ul>--}}
                  {{--</li>--}}
                  {{--@endif--}}

             
                @if(Auth::user()->role_id != 5)
                <li class="nav-item"> 
                    <a class="dropdown-item" href="https://acquaintbd.com/contact-us/" target="_blank"><i class="dripicons-information"></i> {{trans('file.Help')}}</a>
                </li>
                @endif
                <li class="nav-item">
                  <a rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-item"><i class="dripicons-user"></i> <span>{{ucfirst(Auth::user()->name)}}</span> <i class="fa fa-angle-down"></i>
                  </a>
                  <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                      <li> 
                        <a href="{{route('user.profile', ['id' => Auth::id()])}}"><i class="dripicons-user"></i> {{trans('file.profile')}}</a>
                      </li>
                      @if($general_setting_permission_active)
                      <li> 
                        <a href="{{route('setting.general')}}"><i class="dripicons-gear"></i> {{trans('file.settings')}}</a>
                      </li>
                      @endif
                   
                      <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i class="dripicons-power"></i>
                            {{trans('file.logout')}}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                      </li>
                  </ul>
                </li> 
              </ul>
            </div>
          </div>
        </nav>
      </header>
    <div class="page">

      <!-- notification modal -->
      <div id="notification-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Send Notification')}}</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                    {!! Form::open(['route' => 'notifications.store', 'method' => 'post']) !!}
                      <div class="row">
                          <?php 
                              $lims_user_list = DB::table('users')->where([
                                ['is_active', true],
                                ['id', '!=', \Auth::user()->id]
                              ])->get();
                          ?>
                          <div class="col-md-6 form-group">
                              <label>{{trans('file.User')}} *</label>
                              <select name="user_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select user...">
                                  @foreach($lims_user_list as $user)
                                  <option value="{{$user->id}}">{{$user->name . ' (' . $user->email. ')'}}</option>
                                  @endforeach
                              </select>
                          </div>
                          <div class="col-md-12 form-group">
                              <label>{{trans('file.Message')}} *</label>
                              <textarea rows="5" name="message" class="form-control" required></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
                      </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
      </div>

      <!-- expense modal -->
      <div id="expense-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Add Expense')}}</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                    {!! Form::open(['route' => 'expenses.store', 'method' => 'post']) !!}
                    <?php 
                      $lims_expense_category_list = DB::table('expense_categories')->where('is_active', true)->get();
                      if(Auth::user()->role_id > 2)
                        $lims_warehouse_list = DB::table('warehouses')->where([
                          ['is_active', true],
                          ['id', Auth::user()->warehouse_id]
                        ])->get();
                      else
                        $lims_warehouse_list = DB::table('warehouses')->where('is_active', true)->get();
                      $lims_account_list = \App\Account::where('is_active', true)->get();
                    
                    ?>
                      <div class="row">
                        <div class="col-md-6 form-group">
                            <label>{{trans('file.Expense Category')}} *</label>
                            <select name="expense_category_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select Expense Category...">
                                @foreach($lims_expense_category_list as $expense_category)
                                <option value="{{$expense_category->id}}">{{$expense_category->name . ' (' . $expense_category->code. ')'}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{trans('file.Warehouse')}} *</label>
                            <select name="warehouse_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select Warehouse...">
                                @foreach($lims_warehouse_list as $warehouse)
                                <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>{{trans('file.Amount')}} *</label>
                            <input type="number" name="amount" step="any" required class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label> {{trans('file.Account')}}</label>
                            <select class="form-control selectpicker" name="account_id">
                            @foreach($lims_account_list as $account)
                                @if($account->is_default)
                                <option selected value="{{$account->id}}">{{$account->name}} [{{$account->account_no}}]</option>
                                @else
                                <option value="{{$account->id}}">{{$account->name}} [{{$account->account_no}}]</option>
                                @endif
                            @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                          <label>{{trans('file.Note')}}</label>
                          <textarea name="note" rows="3" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
                      </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
      </div>

      <!-- account modal -->
      <div id="account-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Add Account')}}</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                    {!! Form::open(['route' => 'accounts.store', 'method' => 'post']) !!}
                      <div class="form-group">
                          <label>{{trans('file.Account No')}} *</label>
                          <input type="text" name="account_no" required class="form-control">
                      </div>
                      <div class="form-group">
                          <label>{{trans('file.name')}} *</label>
                          <input type="text" name="name" required class="form-control">
                      </div>
                      <div class="form-group">
                          <label>{{trans('file.Initial Balance')}}</label>
                          <input type="number" name="initial_balance" step="any" class="form-control">
                      </div>
                      <div class="form-group">
                          <label>{{trans('file.Note')}}</label>
                          <textarea name="note" rows="3" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
                      </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
      </div>

      <!-- account statement modal -->
      <div id="account-statement-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Account Statement')}}</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                    {!! Form::open(['route' => 'accounts.statement', 'method' => 'post']) !!}
                      <div class="row">
                        <div class="col-md-6 form-group">
                            <label> {{trans('file.Account')}}</label>
                            <select class="form-control selectpicker" name="account_id">
                            @foreach($lims_account_list as $account)
                                <option value="{{$account->id}}">{{$account->name}} [{{$account->account_no}}]</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label> {{trans('file.Type')}}</label>
                            <select class="form-control selectpicker" name="type">
                                <option value="0">{{trans('file.All')}}</option>
                                <option value="1">{{trans('file.Debit')}}</option>
                                <option value="2">{{trans('file.Credit')}}</option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label>{{trans('file.Choose Your Date')}}</label>
                            <div class="input-group">
                                <input type="text" class="daterangepicker-field form-control" required />
                                <input type="hidden" name="start_date" />
                                <input type="hidden" name="end_date" />
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
                      </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
      </div>

      <!-- warehouse modal -->
      <div id="warehouse-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Warehouse Report')}}</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                    {!! Form::open(['route' => 'report.warehouse', 'method' => 'post']) !!}
                    <?php 
                      $lims_warehouse_list = DB::table('warehouses')->where('is_active', true)->get();
                    ?>
                      <div class="form-group">
                          <label>{{trans('file.Warehouse')}} *</label>
                          <select name="warehouse_id" class="selectpicker form-control" required data-live-search="true" id="warehouse-id" data-live-search-style="begins" title="Select warehouse...">
                              @foreach($lims_warehouse_list as $warehouse)
                              <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                              @endforeach
                          </select>
                      </div>

                      <input type="hidden" name="start_date" value="{{date('Y-m-d')}}" />
                      <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
                      </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
      </div>

      <!-- user modal -->
      <div id="user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{trans('file.User Report')}}</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                    {!! Form::open(['route' => 'report.user', 'method' => 'post']) !!}
                    <?php 
                      $lims_user_list = DB::table('users')->where('is_active', true)->get();
                    ?>
                      <div class="form-group">
                          <label>{{trans('file.User')}} *</label>
                          <select name="user_id" class="selectpicker form-control" required data-live-search="true" id="user-id" data-live-search-style="begins" title="Select user...">
                              @foreach($lims_user_list as $user)
                              <option value="{{$user->id}}">{{$user->name . ' (' . $user->phone. ')'}}</option>
                              @endforeach
                          </select>
                      </div>

                      <input type="hidden" name="start_date" value="{{date('Y-m-d')}}" />
                      <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
                      </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
      </div>

      <!-- customer modal -->
      <div id="customer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Customer Report')}}</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                    {!! Form::open(['route' => 'report.customer', 'method' => 'post']) !!}
                    <?php 
                      $lims_customer_list = DB::table('customers')->where('is_active', true)->get();
                    ?>
                      <div class="form-group">
                          <label>{{trans('file.customer')}} *</label>
                          <select name="customer_id" class="selectpicker form-control" required data-live-search="true" id="customer-id" data-live-search-style="begins" title="Select customer...">
                              @foreach($lims_customer_list as $customer)
                              <option value="{{$customer->id}}">{{$customer->name . ' (' . $customer->phone_number. ')'}}</option>
                              @endforeach
                          </select>
                      </div>

                      <input type="hidden" name="start_date" value="{{date('Y-m-d')}}" />
                      <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
                      </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
      </div>

      <!-- supplier modal -->
      <div id="supplier-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title">{{trans('file.Supplier Report')}}</h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                    {!! Form::open(['route' => 'report.supplier', 'method' => 'post']) !!}
                    <?php 
                      $lims_supplier_list = DB::table('suppliers')->where('is_active', true)->get();
                    ?>
                      <div class="form-group">
                          <label>{{trans('file.Supplier')}} *</label>
                          <select name="supplier_id" class="selectpicker form-control" required data-live-search="true" id="supplier-id" data-live-search-style="begins" title="Select Supplier...">
                              @foreach($lims_supplier_list as $supplier)
                              <option value="{{$supplier->id}}">{{$supplier->name . ' (' . $supplier->phone_number. ')'}}</option>
                              @endforeach
                          </select>
                      </div>

                      <input type="hidden" name="start_date" value="{{date('Y-m-d')}}" />
                      <input type="hidden" name="end_date" value="{{date('Y-m-d')}}" />

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
                      </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
      </div>
      
      <div style="display:none" id="content" class="animate-bottom">
          @yield('content')
      </div>

      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <p>&copy; {{$general_setting->site_title}} | {{trans('file.Developed')}} {{trans('file.By')}} <span class="external">{{$general_setting->developed_by}}</span></p>
            </div>
          </div>
        </div>
      </footer>
    </div>
    
    <script type="text/javascript" src="<?php echo asset('public/vendor/jquery/jquery.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/jquery/jquery-ui.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/jquery/bootstrap-datepicker.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/jquery/jquery.timepicker.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/popper.js/umd/popper.min.js') ?>">
    </script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/bootstrap-toggle/js/bootstrap-toggle.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/bootstrap/js/bootstrap-select.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/keyboard/js/jquery.keyboard.js') ?>"></script>  
    <script type="text/javascript" src="<?php echo asset('public/vendor/keyboard/js/jquery.keyboard.extension-autocomplete.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/js/grasp_mobile_progress_circle-1.0.0.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/jquery.cookie/jquery.cookie.js') ?>">
    </script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/chart.js/Chart.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/jquery-validation/jquery.validate.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/js/charts-custom.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/js/front.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/daterange/js/moment.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/daterange/js/knockout-3.4.2.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/daterange/js/daterangepicker.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/vendor/tinymce/js/tinymce/tinymce.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo asset('public/js/dropzone.js') ?>"></script>
    
    @yield('js')
    @yield('scripts')
    <script>
        if ('serviceWorker' in navigator ) {
            window.addEventListener('load', function() {
                navigator.serviceWorker.register('/saleproposmajed/service-worker.js').then(function(registration) {
                    // Registration was successful
                    console.log('ServiceWorker registration successful with scope: ', registration.scope);
                }, function(err) {
                    // registration failed :(
                    console.log('ServiceWorker registration failed: ', err);
                });
            });
        }
    </script>
    <script type="text/javascript">
      
      var alert_product = <?php echo json_encode($alert_product) ?>;

      if ($(window).outerWidth() > 1199) {
          $('nav.side-navbar').removeClass('shrink');
      }
      function myFunction() {
          setTimeout(showPage, 150);
      }
      function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("content").style.display = "block";
      }

      $("div.alert").delay(3000).slideUp(750);

      function confirmDelete() {
          if (confirm("Are you sure want to delete?")) {
              return true;
          }
          return false;
      }

      $("li#notification-icon").on("click", function (argument) {
          $.get('notifications/mark-as-read', function(data) {
              $("span.notification-number").text(alert_product);
          });
      });
      
      $("a#add-expense").click(function(e){
        e.preventDefault();
        $('#expense-modal').modal();
      });

      $("a#send-notification").click(function(e){
        e.preventDefault();
        $('#notification-modal').modal();
      });

      $("a#add-account").click(function(e){
        e.preventDefault();
        $('#account-modal').modal();
      });

      $("a#account-statement").click(function(e){
        e.preventDefault();
        $('#account-statement-modal').modal();
      });

      $("a#profitLoss-link").click(function(e){
        e.preventDefault();
        $("#profitLoss-report-form").submit();
      });

      $("a#report-link").click(function(e){
        e.preventDefault();
        $("#product-report-form").submit();
      });

      $("a#purchase-report-link").click(function(e){
        e.preventDefault();
        $("#purchase-report-form").submit();
      });

      $("a#sale-report-link").click(function(e){
        e.preventDefault();
        $("#sale-report-form").submit();
      });

      $("a#lead_source-report-link").click(function(e){
          e.preventDefault();
          $("#lead_source-report-form").submit();
      });

      $("a#lead_status-report-link").click(function(e){
          e.preventDefault();
          $("#lead_status-report-form").submit();
      });

      $("a#lead_reminder-report-link").click(function(e){
          e.preventDefault();
          $("#lead_reminder-report-form").submit();
      });

      $("a#lead_employee-report-link").click(function(e){
          e.preventDefault();
          $("#lead_employee-report-form").submit();
      });

      $("a#payment-report-link").click(function(e){
        e.preventDefault();
        $("#payment-report-form").submit();
      });

      $("a#warehouse-report-link").click(function(e){
        e.preventDefault();
        $('#warehouse-modal').modal();
      });

      $("a#user-report-link").click(function(e){
        e.preventDefault();
        $('#user-modal').modal();
      });

      $("a#customer-report-link").click(function(e){
        e.preventDefault();
        $('#customer-modal').modal();
      });

      $("a#supplier-report-link").click(function(e){
        e.preventDefault();
        $('#supplier-modal').modal();
      });

      $("a#due-report-link").click(function(e){
        e.preventDefault();
        $("#due-report-form").submit();
      });

      $(".daterangepicker-field").daterangepicker({
          callback: function(startDate, endDate, period){
            var start_date = startDate.format('YYYY-MM-DD');
            var end_date = endDate.format('YYYY-MM-DD');
            var title = start_date + ' To ' + end_date;
            $(this).val(title);
            $('#account-statement-modal input[name="start_date"]').val(start_date);
            $('#account-statement-modal input[name="end_date"]').val(end_date);
          }
      });

      $('.selectpicker').selectpicker({
          style: 'btn-link',
      });
    </script>
  </body>
</html>