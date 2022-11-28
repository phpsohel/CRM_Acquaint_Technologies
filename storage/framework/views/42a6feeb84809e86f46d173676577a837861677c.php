<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="<?php echo e(url('public/logo', $general_setting->site_logo)); ?>" />
    <title><?php echo e($general_setting->site_title); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="manifest" href="<?php echo e(url('manifest.json')); ?>">
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
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/fixedHeader.bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('public/css/responsive.bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo asset('public/css/style.default.css') ?>" id="theme-stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo asset('public/css/dropzone.css') ?>">
    <link rel="stylesheet" href="<?php echo asset('public/css/style.css') ?>">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
     <?php echo $__env->yieldContent('css'); ?>
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
              <li><a href="<?php echo e(url('/')); ?>"> <i class="dripicons-meter"></i><span><?php echo e(__('file.dashboard')); ?></span></a></li>

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

                <?php if($lead_index_permission_active || $lead_status_index_permission_active || $lead_source_index_permission_active || $lead_category_index_permission_active || $remainder_index_permission_active ): ?>
                <li class=""><a href="#lead" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-list"></i><span>Lead</span></a>
                    <ul id="lead" class="collapse list-unstyled ">
                        <?php if($lead_index_permission_active): ?>
                        <li id="employee-menu"><a href="<?php echo e(route('lead.index')); ?>">Lead</a></li>
                        <?php endif; ?>
                     <?php if($lead_status_index_permission_active): ?>
                        <li id="employee-menu"><a href="<?php echo e(route('lead_status.index')); ?>">Lead Status</a></li>
                      <?php endif; ?>
                      <?php if($lead_source_index_permission_active): ?>
                        <li id="employee-menu"><a href="<?php echo e(route('lead_source.index')); ?>">Lead Source</a></li>
                       <?php endif; ?>
                       <?php if($lead_category_index_permission_active): ?>
                        <li id="employee-menu"><a href="<?php echo e(route('lead_category.index')); ?>">Lead Category</a></li>
                       <?php endif; ?>
                       <?php if($remainder_index_permission_active): ?>
                        <li id="employee-menu"><a href="<?php echo e(route('remainder.index')); ?>">Reminder</a></li>
                       <?php endif; ?>
                    </ul>
                </li>
              <?php endif; ?>


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
                <?php if($sale_index_permission_active || $quotes_index_permission_active ): ?>
                    <li><a href="#sale" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-cart"></i><span><?php echo e(trans('file.Sale')); ?></span></a>
                        <ul id="sale" class="collapse list-unstyled ">
                            <?php if($sale_index_permission_active): ?>
                                <li id="sale-list-menu"><a href="<?php echo e(route('sales.index')); ?>"><?php echo e(trans('file.Sale List')); ?></a></li>
                            <?php endif; ?>
                            <?php if($quotes_index_permission_active): ?>
                                <li id="quotation-list-menu"><a href="<?php echo e(route('quotations.index')); ?>"><?php echo e(trans('file.Quotation List')); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>


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
                <?php if($customer_index_permission_active || $customer_group_permission_active): ?>
                    <li><a href="#people" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-user"></i><span>Customer</span></a>
                        <ul id="people" class="collapse list-unstyled ">
                            <?php if($customer_index_permission_active): ?>
                                <li id="customer-list-menu"><a href="<?php echo e(route('customer.index')); ?>"><?php echo e(trans('file.Customer List')); ?></a></li>
                            <?php endif; ?>
                            <?php if($customer_group_permission_active): ?>
                                <li id="customer-group-menu"><a href="<?php echo e(route('customer_group.index')); ?>"><?php echo e(trans('file.Customer Group')); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>




                <?php
                $project_index_permission = DB::table('permissions')->where('name', 'project-index')->first();
                $project_index_permission_active = DB::table('role_has_permissions')->where([
                    ['permission_id', $project_index_permission->id],
                    ['role_id', $role->id]
                ])->first();

                ?>
                <?php if($project_index_permission_active): ?>
                <li class=""><a href="#project" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-box"></i><span>Project</span></a>
                    <ul id="project" class="collapse list-unstyled ">
                        <li id="employee-menu"><a href="<?php echo e(route('project.index')); ?>">Project</a></li>
                        

                    </ul>
                </li>
                <?php endif; ?>




                <?php
                $ticket_index_permission = DB::table('permissions')->where('name', 'ticket-index')->first();
                $ticket_index_permission_active = DB::table('role_has_permissions')->where([
                    ['permission_id', $ticket_index_permission->id],
                    ['role_id', $role->id]
                ])->first();

                ?>
                <?php if($ticket_index_permission_active): ?>
                <li class=""><a href="#ticket" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-ticket"></i><span>Ticket</span></a>
                    <ul id="ticket" class="collapse list-unstyled ">
                        <li id="employee-menu"><a href="<?php echo e(route('ticket.index')); ?>">Ticket</a></li>
                        

                    </ul>
                </li>
                <?php endif; ?>


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
              <?php if($expense_category_index_permission_active || $expense_index_permission_active ): ?>
              <li><a href="#expense" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-wallet"></i><span><?php echo e(trans('file.Expense')); ?></span></a>
                <ul id="expense" class="collapse list-unstyled ">
                 <?php if($expense_category_index_permission_active): ?>
                  <li id="exp-cat-menu"><a href="<?php echo e(route('expense_categories.index')); ?>"><?php echo e(trans('file.Expense Category')); ?></a></li>
                 <?php endif; ?>
                <?php if($expense_index_permission_active): ?>
                  <li id="exp-list-menu"><a href="<?php echo e(route('expenses.index')); ?>"><?php echo e(trans('file.Expense List')); ?></a></li>
                <?php endif; ?>
                </ul>
              </li>
              <?php endif; ?>

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

              <?php if(Auth::user()->role_id != 5): ?>
              <li class=""><a href="#hrm" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-user-group"></i><span>HRM</span></a>
                <ul id="hrm" class="collapse list-unstyled ">
                  <?php if($user_index_permission_active): ?>
                        <li id="user-list-menu"><a href="<?php echo e(route('user.index')); ?>"><?php echo e(trans('file.User List')); ?></a></li>
                  <?php endif; ?>
                  <?php if($department_active): ?>
                  <li id="dept-menu"><a href="<?php echo e(route('departments.index')); ?>"><?php echo e(trans('file.Department')); ?></a></li>
                  <?php endif; ?>
                  <?php if($index_employee_active): ?>
                  <li id="employee-menu"><a href="<?php echo e(route('employees.index')); ?>"><?php echo e(trans('file.Employee')); ?></a></li>
                  <?php endif; ?>
                  <?php if($attendance_active): ?>
                  <li id="attendance-menu"><a href="<?php echo e(route('attendance.index')); ?>"><?php echo e(trans('file.Attendance')); ?></a></li>
                  <?php endif; ?>
                  <?php if($payroll_active): ?>
                  <li id="payroll-menu"><a href="<?php echo e(route('payroll.index')); ?>"><?php echo e(trans('file.Payroll')); ?></a></li>
                  <?php endif; ?>
                 <?php if($holiday_index_permission_active): ?>
                  <li id="holiday-menu"><a href="<?php echo e(route('holidays.index')); ?>"><?php echo e(trans('file.Holiday')); ?></a></li>
                 <?php endif; ?>
                </ul>
              </li>
              <?php endif; ?>

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
                <?php if($category_permission_active || $index_permission_active): ?>
                    <li><a href="#product" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-wallet"></i><span> Product/Service</span><span></a>
                        <ul id="product" class="collapse list-unstyled ">
                            <?php if($category_permission_active): ?>
                                <li id="category-menu"><a href="<?php echo e(route('category.index')); ?>"><?php echo e(__('file.category')); ?></a></li>
                            <?php endif; ?>
                            <?php if($index_permission_active): ?>
                                <li id="product-list-menu"><a href="<?php echo e(route('products.index')); ?>"><?php echo e(__('file.product_list')); ?></a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>


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
                <?php if( $sale_report_active || $payment_report_active || $user_report_active || $customer_report_active  || $due_report_active): ?>
                
                    <li><a href="#report" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-document-remove"></i><span><?php echo e(trans('file.Reports')); ?></span></a>
                        <ul id="report" class="collapse list-unstyled ">



                            <li id="lead_employee-report-menu">
                                <?php echo Form::open(['route' => 'report.lead_employee', 'method' => 'post', 'id' => 'lead_employee-report-form']); ?>

                                <input type="hidden" name="start_date" value="<?php echo e(date('Y-m-d')); ?>" />
                                <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />
                                <input type="hidden" name="employee_id" value="0" />
                                <input type="hidden" name="lead_cat_id" value="0" />
                                <input type="hidden" name="thana_id" value="0" />
                                <a id="lead_employee-report-link" href="">Lead Category Report</a>
                                <?php echo Form::close(); ?>

                            </li>

                            <li id="lead_source-report-menu">
                                <?php echo Form::open(['route' => 'report.lead_source', 'method' => 'post', 'id' => 'lead_source-report-form']); ?>

                                <input type="hidden" name="start_date" value="<?php echo e(date('Y-m-d')); ?>" />
                                <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />
                                <input type="hidden" name="employee_id" value="0" />
                                <input type="hidden" name="lead_source_id" value="0" />
                                <a id="lead_source-report-link" href="">Lead source Report</a>
                                <?php echo Form::close(); ?>

                            </li>

                            <li id="lead_status-report-menu">
                                <?php echo Form::open(['route' => 'report.lead_status', 'method' => 'post', 'id' => 'lead_status-report-form']); ?>

                                <input type="hidden" name="start_date" value="<?php echo e(date('Y-m-d')); ?>" />
                                <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />
                                <input type="hidden" name="employee_id" value="0" />
                                <input type="hidden" name="lead_status_id" value="0" />
                                <a id="lead_status-report-link" href="">Lead Status Report</a>
                                <?php echo Form::close(); ?>

                            </li>


                            <li id="lead_reminder-report-menu">
                                <?php echo Form::open(['route' => 'report.lead_reminder_report', 'method' => 'post', 'id' => 'lead_reminder-report-form']); ?>

                                <input type="hidden" name="start_date" value="<?php echo e(date('Y-m-d')); ?>" />
                                <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />
                                <input type="hidden" name="user_id" value="0" />
                                <input type="hidden" name="stage" value="2"/>
                                <a id="lead_reminder-report-link" href="">Lead Reminder Report</a>
                                <?php echo Form::close(); ?>

                            </li>



                            <?php if($sale_report_active): ?>
                                <li id="sale-report-menu">
                                    <?php echo Form::open(['route' => 'report.sale', 'method' => 'post', 'id' => 'sale-report-form']); ?>

                                    <input type="hidden" name="start_date" value="<?php echo e(date('Y-m-d')); ?>" />
                                    <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />
                                    <input type="hidden" name="warehouse_id" value="0" />
                                    <a id="sale-report-link" href=""><?php echo e(trans('file.Sale Report')); ?></a>
                                    <?php echo Form::close(); ?>

                                </li>
                            <?php endif; ?>



                            <?php if($payment_report_active): ?>
                                <li id="payment-report-menu">
                                    <?php echo Form::open(['route' => 'report.paymentByDate', 'method' => 'post', 'id' => 'payment-report-form']); ?>

                                    <input type="hidden" name="start_date" value="<?php echo e(date('Y-m-d')); ?>" />
                                    <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />
                                    <a id="payment-report-link" href=""><?php echo e(trans('file.Payment Report')); ?></a>
                                    <?php echo Form::close(); ?>

                                </li>
                            <?php endif; ?>

                            <?php if($user_report_active): ?>
                                <li id="user-report-menu">
                                    <a id="user-report-link" href=""><?php echo e(trans('file.User Report')); ?></a>
                                </li>
                            <?php endif; ?>
                            <?php if($customer_report_active): ?>
                                <li id="customer-report-menu">
                                    <a id="customer-report-link" href=""><?php echo e(trans('file.Customer Report')); ?></a>
                                </li>
                            <?php endif; ?>

                            <?php if($due_report_active): ?>
                                <li id="due-report-menu">
                                    <?php echo Form::open(['route' => 'report.dueByDate', 'method' => 'post', 'id' => 'due-report-form']); ?>

                                    <input type="hidden" name="start_date" value="<?php echo e(date('Y-m-d')); ?>" />
                                    <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />
                                    <a id="due-report-link" href=""><?php echo e(trans('file.Due Report')); ?></a>
                                    <?php echo Form::close(); ?>

                                </li>
                            <?php endif; ?>
                        </ul>
                    </li>
                <?php endif; ?>


              <?php

//                $product_qty_alert_active = DB::table('permissions')
//                      ->join('role_has_permissions', 'permissions.id', '=', 'role_has_permissions.permission_id')
//                      ->where([
//                        ['permissions.name', 'product-qty-alert'],
//                        ['role_id', $role->id] ])->first();


              ?>
              
              <li><a href="#setting" aria-expanded="false" data-toggle="collapse"> <i class="dripicons-gear"></i><span><?php echo e(trans('file.settings')); ?></span></a>
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
                  <?php if($role->id <= 2): ?>
                  <li id="role-menu"><a href="<?php echo e(route('role.index')); ?>"><?php echo e(trans('file.Role Permission')); ?></a></li>
                  <?php endif; ?>

                  <li id="notification-menu">
                    <a href="" id="send-notification"><?php echo e(trans('file.Send Notification')); ?></a>
                  </li>

                  <?php if($unit_permission_active): ?>
                  <li id="unit-menu"><a href="<?php echo e(route('unit.index')); ?>"><?php echo e(trans('file.Unit')); ?></a></li>
                  <?php endif; ?>
                  <?php if($currency_permission_active): ?>
                  <li id="currency-menu"><a href="<?php echo e(route('currency.index')); ?>"><?php echo e(trans('file.Currency')); ?></a></li>
                  <?php endif; ?>

                  <?php if($backup_database_permission_active): ?>
                  <li><a href="<?php echo e(route('setting.backup')); ?>"><?php echo e(trans('file.Backup Database')); ?></a></li>
                  <?php endif; ?>
                  <?php if($general_setting_permission_active): ?>
                  <li id="general-setting-menu"><a href="<?php echo e(route('setting.general')); ?>"><?php echo e(trans('file.General Setting')); ?></a></li>
                  <?php endif; ?>

                  <?php if($hrm_setting_permission_active): ?>
                  <li id="hrm-setting-menu"><a href="<?php echo e(route('setting.hrm')); ?>"> <?php echo e(trans('file.HRM Setting')); ?></a></li>
                  <?php endif; ?>
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
              <span class="brand-big" style="left:12%;"><?php if($general_setting->site_logo): ?><img src="<?php echo e(url('public/logo', $general_setting->site_logo)); ?>" width="150">&nbsp;&nbsp;<?php endif; ?><a href="<?php echo e(url('/')); ?>">
                  <h1 class="d-inline" style="display:none !important;"><?php echo e($general_setting->site_title); ?></h1></a></span>
              
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
                        <a rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-item"><i class="dripicons-bell"></i><span class="badge badge-danger notification-number"><?php echo e($total_reminder + count(\Auth::user()->unreadNotifications)); ?></span>
                        </a>
                        <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default notifications" user="menu">
                            <li class="notifications">
                              <a href="<?php echo e(route('todys.reminder')); ?>" class="btn btn-link">  Today's Reminders ( <?php echo e($total_reminder); ?> ) </a>
                            </li>
                            <?php $__currentLoopData = \Auth::user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="notifications">
                                    <a href="#" class="btn btn-link"><?php echo e($notification->data['message']); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                  </li>
                  
                  
                        
                        
                        
                            
                                
                                    
                                
                            
                        
                  
                  

             
                <?php if(Auth::user()->role_id != 5): ?>
                <li class="nav-item"> 
                    <a class="dropdown-item" href="https://acquaintbd.com/contact-us/" target="_blank"><i class="dripicons-information"></i> <?php echo e(trans('file.Help')); ?></a>
                </li>
                <?php endif; ?>
                <li class="nav-item">
                  <a rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-item"><i class="dripicons-user"></i> <span><?php echo e(ucfirst(Auth::user()->name)); ?></span> <i class="fa fa-angle-down"></i>
                  </a>
                  <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                      <li> 
                        <a href="<?php echo e(route('user.profile', ['id' => Auth::id()])); ?>"><i class="dripicons-user"></i> <?php echo e(trans('file.profile')); ?></a>
                      </li>
                      <?php if($general_setting_permission_active): ?>
                      <li> 
                        <a href="<?php echo e(route('setting.general')); ?>"><i class="dripicons-gear"></i> <?php echo e(trans('file.settings')); ?></a>
                      </li>
                      <?php endif; ?>
                   
                      <li>
                        <a href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();"><i class="dripicons-power"></i>
                            <?php echo e(trans('file.logout')); ?>

                        </a>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
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
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Send Notification')); ?></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <?php echo Form::open(['route' => 'notifications.store', 'method' => 'post']); ?>

                      <div class="row">
                          <?php 
                              $lims_user_list = DB::table('users')->where([
                                ['is_active', true],
                                ['id', '!=', \Auth::user()->id]
                              ])->get();
                          ?>
                          <div class="col-md-6 form-group">
                              <label><?php echo e(trans('file.User')); ?> *</label>
                              <select name="user_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select user...">
                                  <?php $__currentLoopData = $lims_user_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($user->id); ?>"><?php echo e($user->name . ' (' . $user->email. ')'); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                          </div>
                          <div class="col-md-12 form-group">
                              <label><?php echo e(trans('file.Message')); ?> *</label>
                              <textarea rows="5" name="message" class="form-control" required></textarea>
                          </div>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                      </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
      </div>

      <!-- expense modal -->
      <div id="expense-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Add Expense')); ?></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <?php echo Form::open(['route' => 'expenses.store', 'method' => 'post']); ?>

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
                            <label><?php echo e(trans('file.Expense Category')); ?> *</label>
                            <select name="expense_category_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select Expense Category...">
                                <?php $__currentLoopData = $lims_expense_category_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $expense_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($expense_category->id); ?>"><?php echo e($expense_category->name . ' (' . $expense_category->code. ')'); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label><?php echo e(trans('file.Warehouse')); ?> *</label>
                            <select name="warehouse_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select Warehouse...">
                                <?php $__currentLoopData = $lims_warehouse_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($warehouse->id); ?>"><?php echo e($warehouse->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label><?php echo e(trans('file.Amount')); ?> *</label>
                            <input type="number" name="amount" step="any" required class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label> <?php echo e(trans('file.Account')); ?></label>
                            <select class="form-control selectpicker" name="account_id">
                            <?php $__currentLoopData = $lims_account_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($account->is_default): ?>
                                <option selected value="<?php echo e($account->id); ?>"><?php echo e($account->name); ?> [<?php echo e($account->account_no); ?>]</option>
                                <?php else: ?>
                                <option value="<?php echo e($account->id); ?>"><?php echo e($account->name); ?> [<?php echo e($account->account_no); ?>]</option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                          <label><?php echo e(trans('file.Note')); ?></label>
                          <textarea name="note" rows="3" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                      </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
      </div>

      <!-- account modal -->
      <div id="account-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Add Account')); ?></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <?php echo Form::open(['route' => 'accounts.store', 'method' => 'post']); ?>

                      <div class="form-group">
                          <label><?php echo e(trans('file.Account No')); ?> *</label>
                          <input type="text" name="account_no" required class="form-control">
                      </div>
                      <div class="form-group">
                          <label><?php echo e(trans('file.name')); ?> *</label>
                          <input type="text" name="name" required class="form-control">
                      </div>
                      <div class="form-group">
                          <label><?php echo e(trans('file.Initial Balance')); ?></label>
                          <input type="number" name="initial_balance" step="any" class="form-control">
                      </div>
                      <div class="form-group">
                          <label><?php echo e(trans('file.Note')); ?></label>
                          <textarea name="note" rows="3" class="form-control"></textarea>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                      </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
      </div>

      <!-- account statement modal -->
      <div id="account-statement-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Account Statement')); ?></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <?php echo Form::open(['route' => 'accounts.statement', 'method' => 'post']); ?>

                      <div class="row">
                        <div class="col-md-6 form-group">
                            <label> <?php echo e(trans('file.Account')); ?></label>
                            <select class="form-control selectpicker" name="account_id">
                            <?php $__currentLoopData = $lims_account_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($account->id); ?>"><?php echo e($account->name); ?> [<?php echo e($account->account_no); ?>]</option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label> <?php echo e(trans('file.Type')); ?></label>
                            <select class="form-control selectpicker" name="type">
                                <option value="0"><?php echo e(trans('file.All')); ?></option>
                                <option value="1"><?php echo e(trans('file.Debit')); ?></option>
                                <option value="2"><?php echo e(trans('file.Credit')); ?></option>
                            </select>
                        </div>
                        <div class="col-md-12 form-group">
                            <label><?php echo e(trans('file.Choose Your Date')); ?></label>
                            <div class="input-group">
                                <input type="text" class="daterangepicker-field form-control" required />
                                <input type="hidden" name="start_date" />
                                <input type="hidden" name="end_date" />
                            </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                      </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
      </div>

      <!-- warehouse modal -->
      <div id="warehouse-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Warehouse Report')); ?></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <?php echo Form::open(['route' => 'report.warehouse', 'method' => 'post']); ?>

                    <?php 
                      $lims_warehouse_list = DB::table('warehouses')->where('is_active', true)->get();
                    ?>
                      <div class="form-group">
                          <label><?php echo e(trans('file.Warehouse')); ?> *</label>
                          <select name="warehouse_id" class="selectpicker form-control" required data-live-search="true" id="warehouse-id" data-live-search-style="begins" title="Select warehouse...">
                              <?php $__currentLoopData = $lims_warehouse_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $warehouse): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($warehouse->id); ?>"><?php echo e($warehouse->name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>

                      <input type="hidden" name="start_date" value="<?php echo e(date('Y-m-d')); ?>" />
                      <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                      </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
      </div>

      <!-- user modal -->
      <div id="user-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.User Report')); ?></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <?php echo Form::open(['route' => 'report.user', 'method' => 'post']); ?>

                    <?php 
                      $lims_user_list = DB::table('users')->where('is_active', true)->get();
                    ?>
                      <div class="form-group">
                          <label><?php echo e(trans('file.User')); ?> *</label>
                          <select name="user_id" class="selectpicker form-control" required data-live-search="true" id="user-id" data-live-search-style="begins" title="Select user...">
                              <?php $__currentLoopData = $lims_user_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($user->id); ?>"><?php echo e($user->name . ' (' . $user->phone. ')'); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>

                      <input type="hidden" name="start_date" value="<?php echo e(date('Y-m-d')); ?>" />
                      <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                      </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
      </div>

      <!-- customer modal -->
      <div id="customer-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Customer Report')); ?></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <?php echo Form::open(['route' => 'report.customer', 'method' => 'post']); ?>

                    <?php 
                      $lims_customer_list = DB::table('customers')->where('is_active', true)->get();
                    ?>
                      <div class="form-group">
                          <label><?php echo e(trans('file.customer')); ?> *</label>
                          <select name="customer_id" class="selectpicker form-control" required data-live-search="true" id="customer-id" data-live-search-style="begins" title="Select customer...">
                              <?php $__currentLoopData = $lims_customer_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $customer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($customer->id); ?>"><?php echo e($customer->name . ' (' . $customer->phone_number. ')'); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>

                      <input type="hidden" name="start_date" value="<?php echo e(date('Y-m-d')); ?>" />
                      <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                      </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
      </div>

      <!-- supplier modal -->
      <div id="supplier-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
        <div role="document" class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="exampleModalLabel" class="modal-title"><?php echo e(trans('file.Supplier Report')); ?></h5>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
                </div>
                <div class="modal-body">
                  <p class="italic"><small><?php echo e(trans('file.The field labels marked with * are required input fields')); ?>.</small></p>
                    <?php echo Form::open(['route' => 'report.supplier', 'method' => 'post']); ?>

                    <?php 
                      $lims_supplier_list = DB::table('suppliers')->where('is_active', true)->get();
                    ?>
                      <div class="form-group">
                          <label><?php echo e(trans('file.Supplier')); ?> *</label>
                          <select name="supplier_id" class="selectpicker form-control" required data-live-search="true" id="supplier-id" data-live-search-style="begins" title="Select Supplier...">
                              <?php $__currentLoopData = $lims_supplier_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <option value="<?php echo e($supplier->id); ?>"><?php echo e($supplier->name . ' (' . $supplier->phone_number. ')'); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                      </div>

                      <input type="hidden" name="start_date" value="<?php echo e(date('Y-m-d')); ?>" />
                      <input type="hidden" name="end_date" value="<?php echo e(date('Y-m-d')); ?>" />

                      <div class="form-group">
                          <button type="submit" class="btn btn-primary"><?php echo e(trans('file.submit')); ?></button>
                      </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
      </div>
      
      <div style="display:none" id="content" class="animate-bottom">
          <?php echo $__env->yieldContent('content'); ?>
      </div>

      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <p>&copy; <?php echo e($general_setting->site_title); ?> | <?php echo e(trans('file.Developed')); ?> <?php echo e(trans('file.By')); ?> <span class="external"><?php echo e($general_setting->developed_by); ?></span></p>
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
    
    <?php echo $__env->yieldContent('js'); ?>
    <?php echo $__env->yieldContent('scripts'); ?>
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
</html><?php /**PATH /home/acquqkkb/public_html/atechcrm/resources/views/layout/main.blade.php ENDPATH**/ ?>