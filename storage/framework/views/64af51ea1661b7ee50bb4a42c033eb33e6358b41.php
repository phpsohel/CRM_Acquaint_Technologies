<?php $__env->startSection('content'); ?>
<!-- this portion is for demo only -->
<!-- <style type="text/css">

  nav.navbar a.menu-btn {
    padding: 12 !important;
  }
  .color-switcher {
      background-color: #fff;
      border: 1px solid #e5e5e5;
      border-radius: 2px;
      padding: 10px;
      position: fixed;
      top: 150px;
      transition: all 0.4s ease 0s;
      width: 150px;
      z-index: 99999;
  }
  .hide-color-switcher {
      right: -150px;
  }
  .show-color-switcher {
      right: -1px;
  }
  .color-switcher a.switcher-button {
      background: #fff;
      border-top: #e5e5e5;
      border-right: #e5e5e5;
      border-bottom: #e5e5e5;
      border-left: #e5e5e5;
      border-style: solid solid solid solid;
      border-width: 1px 1px 1px 1px;
      border-radius: 2px;
      color: #161616;
      cursor: pointer;
      font-size: 22px;
      width: 45px;
      height: 45px;
      line-height: 43px;
      position: absolute;
      top: 24px;
      left: -44px;
      text-align: center;
  }
  .color-switcher a.switcher-button i {
    line-height: 40px
  }
  .color-switcher .color-switcher-title {
      color: #666;
      padding: 0px 0 8px;
  }
  .color-switcher .color-switcher-title:after {
      content: "";
      display: block;
      height: 1px;
      margin: 14px 0 0;
      position: relative;
      width: 20px;
  }
  .color-switcher .color-list a.color {
      cursor: pointer;
      display: inline-block;
      height: 30px;
      margin: 10px 0 0 1px;
      width: 28px;
  }
  .purple-theme {
      background-color: #7c5cc4;
  }
  .green-theme {
      background-color: #1abc9c;
  }
  .blue-theme {
      background-color: #3498db;
  }
  .dark-theme {
      background-color: #34495e;
  }
</style>
<div class="color-switcher hide-color-switcher">
    <a class="switcher-button"><i class="fa fa-cog fa-spin"></i></a>
    <h5><?php echo e(trans('file.Theme')); ?></h5>
    <div class="color-list">
        <a class="color purple-theme" title="purple" data-color="default.css"></a>
        <a class="color green-theme" title="green" data-color="green.css"></a>
        <a class="color blue-theme" title="blue" data-color="blue.css"></a>
        <a class="color dark-theme" title="dark" data-color="dark.css"></a>
    </div>
</div> -->
<?php if(session()->has('not_permitted')): ?>
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('not_permitted')); ?></div> 
<?php endif; ?>
<?php if(session()->has('message')): ?>
  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><?php echo e(session()->get('message')); ?></div> 
<?php endif; ?>
      <div class="row">
        <div class="container-fluid">
          <div class="col-md-12">
            <div class="brand-text float-left mt-4">
                <h3><?php echo e(trans('file.welcome')); ?> <span><?php echo e(Auth::user()->name); ?></span> </h3>
            </div>
            <div class="filter-toggle btn-group" style="display:none;">
              <button class="btn btn-secondary date-btn" data-start_date="<?php echo e(date('Y-m-d')); ?>" data-end_date="<?php echo e(date('Y-m-d')); ?>"><?php echo e(trans('file.Today')); ?></button>
              <button class="btn btn-secondary date-btn" data-start_date="<?php echo e(date('Y-m-d', strtotime(' -7 day'))); ?>" data-end_date="<?php echo e(date('Y-m-d')); ?>"><?php echo e(trans('file.Last 7 Days')); ?></button>
              <button class="btn btn-secondary date-btn active" data-start_date="<?php echo e(date('Y').'-'.date('m').'-'.'01'); ?>" data-end_date="<?php echo e(date('Y-m-d')); ?>"><?php echo e(trans('file.This Month')); ?></button>
              <button class="btn btn-secondary date-btn" data-start_date="<?php echo e(date('Y').'-01'.'-01'); ?>" data-end_date="<?php echo e(date('Y').'-12'.'-31'); ?>"><?php echo e(trans('file.This Year')); ?></button>
            </div>
          </div>
        </div>
      </div>
      <!-- Counts Section -->
      <section class="dashboard-counts">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 form-group">
              <div class="row">
                <!-- Count item widget-->
                <div class="col-sm-3">
                  <div class="wrapper count-title text-center">
                    <div class="icon"><i class="dripicons-graph-bar" style="color: #733686"></i></div>
                    <div class="name"><strong style="color: #733686">Total Leads</strong></div>
                    <div class="count-number revenue-data"><?php echo e($total_leads); ?></div>
                  </div>
                </div>
                <!-- Count item widget-->
                <div class="col-sm-3">
                  <div class="wrapper count-title text-center">
                    <div class="icon"><i class="dripicons-return" style="color: #ff8952"></i></div>
                    <div class="name"><strong style="color: #ff8952">Total Proposals</strong></div>
                    <div class="count-number return-data"><?php echo e($total_quotation); ?></div>
                  </div>
                </div>
                <!-- Count item widget-->
                <div class="col-sm-3">
                  <div class="wrapper count-title text-center">
                    <div class="icon"><i class="dripicons-media-loop" style="color: #00c689"></i></div>
                    <div class="name"><strong style="color: #00c689">Total Sales</strong></div>
                    <div class="count-number purchase_return-data"><?php echo e($total_sale); ?></div>
                  </div>
                </div>
                <!-- Count item widget-->
                <div class="col-sm-3">
                  <div class="wrapper count-title text-center">
                    <div class="icon"><i class="dripicons-trophy" style="color: #297ff9"></i></div>
                    <div class="name"><strong style="color: #297ff9">Total Projects</strong></div>
                    <div class="count-number profit-data"><?php echo e($total_project); ?></div>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
        </div>
        
        <div class="container-fluid">
          <div class="row">

            <div class="col-md-12">
              <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                  <h4>Recent Activities</h4>
                  <div class="right-column">
                    <div class="badge badge-primary"><?php echo e(trans('file.latest')); ?> 5</div>
                  </div>
                </div>
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" href="#lead-latest" role="tab" data-toggle="tab">Leads</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#proposal-latest" role="tab" data-toggle="tab">Proposals</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#sales-latest" role="tab" data-toggle="tab">Sales</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#project-latest" role="tab" data-toggle="tab">Projects</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#ticket-latest" role="tab" data-toggle="tab">Tickets</a>
                  </li>
                </ul>

                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade show active" id="lead-latest">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                        <tr>
                          <th>Date</th>
                          <th>Name</th>
                          <th>Company</th>
                          
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th>Source</th>
                          <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $recent_lead; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e(date($general_setting->date_format, strtotime($lead->created_at->toDateString()))); ?></td>
                            <td><?php echo e($lead->name); ?></td>
                            <td><?php echo e($lead->company); ?></td>
                            
                            <td><?php echo e($lead->email); ?></td>
                            <td><?php echo e($lead->phone_number); ?></td>
                            <td><?php echo e($lead->address); ?></td>
                            <?php if($lead->lead_source_id == null): ?>
                              <td></td>
                            <?php else: ?>
                            <td><?php echo e($lead->lead_source->source_name); ?></td>
                            <?php endif; ?>
                            <?php if($lead->lead_status_id == null): ?>
                              <td></td>
                            <?php else: ?>
                            <td><?php echo e($lead->lead_status->status_name); ?></td>
                            <?php endif; ?>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="proposal-latest">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                        <tr>
                          <th><?php echo e(trans('file.date')); ?></th>
                          <th><?php echo e(trans('file.reference')); ?></th>
                          <th>Lead Name</th>
                          <th>Lead Company</th>
                          <th><?php echo e(trans('file.status')); ?></th>
                          <th><?php echo e(trans('file.grand total')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $recent_quotation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $quotation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e(date($general_setting->date_format, strtotime($quotation->created_at->toDateString()))); ?></td>
                            <td><?php echo e($quotation->reference_no); ?></td>
                            <td><?php echo e($quotation->lead->name); ?></td>
                            <td><?php echo e($quotation->lead->company); ?></td>
                            <?php if($quotation->stage == 1): ?>
                              <td><div class="badge badge-danger">Unapproved</div></td>
                            <?php elseif($quotation->stage == 2): ?>
                              <td><div class="badge badge-success">Approved</div></td>
                            <?php else: ?>
                              <td><div class="badge badge-danger">Pending</div></td>
                            <?php endif; ?>
                            <td><?php echo e($quotation->grand_total); ?></td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="sales-latest">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                        <tr>
                          <th><?php echo e(trans('file.date')); ?></th>
                          <th><?php echo e(trans('file.reference')); ?></th>
                          <th><?php echo e(trans('file.customer')); ?></th>
                          <th>Sale Status</th>
                          <th>Payment Status</th>
                          <th><?php echo e(trans('file.grand total')); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $recent_sale; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e(date($general_setting->date_format, strtotime($sale->created_at->toDateString()))); ?></td>
                            <td><?php echo e($sale->reference_no); ?></td>
                            <td><?php echo e($sale->customer->name); ?></td>
                            <?php if($sale->sale_status == 1): ?>
                              <td><div class="badge badge-success">Completed</div></td>
                            <?php else: ?>
                              <td><div class="badge badge-danger">Pending</div></td>
                            <?php endif; ?>

                            <?php if($sale->payment_status == 1): ?>
                              <td><div class="badge badge-danger">Pending</div></td>
                            <?php elseif($sale->payment_status == 2): ?>
                              <td><div class="badge badge-warning">Due</div></td>
                            <?php elseif($sale->payment_status == 3): ?>
                              <td><div class="badge badge-warning">Partial</div></td>
                            <?php else: ?>
                              <td><div class="badge badge-success">Paid</div></td>
                            <?php endif; ?>
                            <td><?php echo e($sale->grand_total); ?></td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="project-latest">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                        <tr>
                          <th>Project Name</th>
                          <th>Sale Reference</th>
                          <th>Customer</th>
                          <th>Company</th>
                          <th>Progress</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Grand Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $recent_project; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php
                            $sales = App\Sale::where('id',$project->sales_id)->first();
                          ?>
                          <tr>
                            <td><?php echo e($project->project_name); ?></td>
                            <td><?php echo e($sales->reference_no); ?></td>
                            <td><?php echo e($project->customer->name); ?></td>
                            <td><?php echo e($project->customer->company_name); ?></td>
                            <td>
                              <progress id="file"  value="<?php echo e($project->progress); ?>" max="100"> <?php echo e($project->progress); ?>% </progress> <?php echo e($project->progress); ?>%
                            </td>
                            <td><?php echo e(date($general_setting->date_format, strtotime($project->start_date))); ?></td>
                            <td><?php echo e(date($general_setting->date_format, strtotime($project->end_date))); ?></td>
                            <td><?php echo e($sales->grand_total); ?> BDT</td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="ticket-latest">
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                        <tr>
                          <th><?php echo e(trans('file.date')); ?></th>
                          <th>Subject</th>
                          <th>Project Name</th>
                          <th>Customer Name</th>
                          <th> Employee</th>
                          <th> Priority</th>
                          <th> Description</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $recent_ticket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e(date($general_setting->date_format, strtotime($ticket->created_at->toDateString()))); ?></td>
                            <td><?php echo e($ticket->subject); ?></td>
                            <td><?php echo e($ticket->project->project_name); ?></td>
                            <td><?php echo e($ticket->customer->name); ?></td>
                            <td><?php echo e($ticket->employee->name); ?></td>
                            <?php if($ticket->priority == 1): ?>
                              <td>High</td>
                            <?php else: ?>
                              <td>Low</td>
                            <?php endif; ?>
                            <td><?php echo Str::limit($ticket->description, 30, ' ...'); ?></td>
                          </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h4><?php echo e(trans('file.yearly report')); ?></h4>
                </div>
                <div class="card-body">
                  <canvas id="saleChart" data-sale_chart_value = "<?php echo e(json_encode($yearly_sale_amount)); ?>" data-purchase_chart_value = "<?php echo e(json_encode($monthly_lead)); ?>" data-label1="Total Lead" data-label2="Total Sales"></canvas>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>
      
<script type="text/javascript">
    // Show and hide color-switcher
    $(".color-switcher .switcher-button").on('click', function() {
        $(".color-switcher").toggleClass("show-color-switcher", "hide-color-switcher", 300);
    });

    // Color Skins
    $('a.color').on('click', function() {
        /*var title = $(this).attr('title');
        $('#style-colors').attr('href', 'css/skin-' + title + '.css');
        return false;*/
        $.get('setting/general_setting/change-theme/' + $(this).data('color'), function(data) {
        });
        var style_link= $('#custom-style').attr('href').replace(/([^-]*)$/, $(this).data('color') );
        $('#custom-style').attr('href', style_link);
    });

    $(".date-btn").on("click", function() {
        $(".date-btn").removeClass("active");
        $(this).addClass("active");
        var start_date = $(this).data('start_date');
        var end_date = $(this).data('end_date');
        $.get('dashboard-filter/' + start_date + '/' + end_date, function(data) {
            dashboardFilter(data);
        });
    });

    function dashboardFilter(data){
        $('.revenue-data').hide();
        $('.revenue-data').html(parseFloat(data[0]).toFixed(2));
        $('.revenue-data').show(500);

        $('.return-data').hide();
        $('.return-data').html(parseFloat(data[1]).toFixed(2));
        $('.return-data').show(500);

        $('.profit-data').hide();
        $('.profit-data').html(parseFloat(data[2]).toFixed(2));
        $('.profit-data').show(500);

        $('.purchase_return-data').hide();
        $('.purchase_return-data').html(parseFloat(data[3]).toFixed(2));
        $('.purchase_return-data').show(500);
    }
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\somporko\resources\views/index.blade.php ENDPATH**/ ?>