 <?php $__env->startSection('content'); ?>

    
        
    

    <section class="forms">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header mt-2">
                    <h3 class="text-center">Lead Status Report</h3>
                </div>
                <?php echo Form::open(['route' => 'report.lead_status', 'method' => 'post']); ?>

                <div class="row mb-3">
                    <div class="col-md-3" style="margin-left: 30px;">
                        <div class="form-group row">
                            <label class="d-tc"><strong><?php echo e(trans('file.Choose Your Date')); ?></strong> &nbsp;</label>
                            <div class="d-tc">
                                <div class="input-group">
                                    <input type="text" class="daterangepicker-field form-control" value="<?php echo e($start_date); ?> To <?php echo e($end_date); ?>" required />
                                    <input type="hidden" name="start_date" value="<?php echo e($start_date); ?>" />
                                    <input type="hidden" name="end_date" value="<?php echo e($end_date); ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group row">
                            <label class="d-tc"><strong> Select Employee</strong> &nbsp;</label>
                            <div class="d-tc">
                                <input type="hidden" name="employee_id_hidden" value="<?php echo e($employee_id); ?>" />
                                <select id="employee_id" name="employee_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" >
                                    <option value="0">All Employee</option>
                                    <?php $__currentLoopData = $lims_employee_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($employee->id); ?>"><?php echo e($employee->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group row">
                            <label class="d-tc"><strong> Select Lead Status</strong> &nbsp;</label>
                            <div class="d-tc">
                                <input type="hidden" name="lead_status_id_hidden" value="<?php echo e($lead_status_id); ?>" />
                                <select id="lead_status_id" name="lead_status_id" class="selectpicker form-control" data-live-search="true" data-live-search-style="begins" >
                                    <option value="0">All Lead Source</option>
                                    <?php $__currentLoopData = $lims_status_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lead_cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($lead_cat->id); ?>"><?php echo e($lead_cat->status_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2" style="margin-top: 30px;">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit"><?php echo e(trans('file.submit')); ?></button>
                        </div>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
        <div class="table-responsive">
            <table id="report-table" class="table table-hover">
                <thead>
                <tr>
                <tr>
                    <th class="not-exported"></th>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Company</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Lead Status</th>
                    <th>Employee</th>
                    <th>Stage</th>
                </tr>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $lims_lead_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$lead): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr data-id="<?php echo e($lead->id); ?>">
                        <td><?php echo e($key); ?></td>
                        <td><?php echo e(date($general_setting->date_format, strtotime($lead->date))); ?></td>
                        <td><?php echo e($lead->name); ?></td>
                        <td><?php echo e($lead->company); ?></td>
                        <td><?php echo e($lead->email); ?></td>
                        <td><?php echo e($lead->phone_number); ?></td>
                        <td><?php echo e($lead->address); ?></td>
                        <td><?php echo e($lead->lead_status->status_name); ?></td>
                        <td><?php echo e($lead->employee->name); ?></td>

                        <?php if($lead->stage == 1 ): ?>
                            <td>
                                <a href="#" class="btn btn-danger"><strong> Unapproved</strong></a>
                            </td>
                        <?php elseif($lead->stage == 2): ?>
                            <td>
                                <a href="#" class="btn btn-success"> <strong>Approved</strong></a>
                            </td>
                        <?php else: ?>
                            <td>
                                <a href="#" class="btn btn-warning"> <strong>Pending</strong></a>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </section>


    <script type="text/javascript">
        $("ul#report").siblings('a').attr('aria-expanded','true');
        $("ul#report").addClass("show");
        $("ul#report #sale-report-menu").addClass("active");

        $('#employee_id').val($('input[name="employee_id_hidden"]').val());
        $('#lead_status_id').val($('input[name="lead_status_id_hidden"]').val());
        $('.selectpicker').selectpicker('refresh');

        $('#report-table').DataTable( {
            "order": [],
            'language': {
                'lengthMenu': '_MENU_ <?php echo e(trans("file.records per page")); ?>',
                "info":      '<small><?php echo e(trans("file.Showing")); ?> _START_ - _END_ (_TOTAL_)</small>',
                "search":  '<?php echo e(trans("file.Search")); ?>',
                'paginate': {
                    'previous': '<i class="dripicons-chevron-left"></i>',
                    'next': '<i class="dripicons-chevron-right"></i>'
                }
            },
            'columnDefs': [
                {
                    "orderable": false,
                    'targets': 0
                },
                {
                    'render': function(data, type, row, meta){
                        if(type === 'display'){
                            data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                        }

                        return data;
                    },
                    'checkboxes': {
                        'selectRow': true,
                        'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
                    },
                    'targets': [0]
                }
            ],
            'select': { style: 'multi',  selector: 'td:first-child'},
            'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
            dom: '<"row"lfB>rtip',
            buttons: [
                {
                    extend: 'pdf',
                    text: '<?php echo e(trans("file.PDF")); ?>',
                    exportOptions: {
                        columns: ':visible:not(.not-exported)',
                        rows: ':visible'
                    },
                    action: function(e, dt, button, config) {
                        datatable_sum(dt, true);
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(this, e, dt, button, config);
                        datatable_sum(dt, false);
                    },
                    footer:true
                },
                {
                    extend: 'csv',
                    text: '<?php echo e(trans("file.CSV")); ?>',
                    exportOptions: {
                        columns: ':visible:not(.not-exported)',
                        rows: ':visible'
                    },
                    action: function(e, dt, button, config) {
                        datatable_sum(dt, true);
                        $.fn.dataTable.ext.buttons.csvHtml5.action.call(this, e, dt, button, config);
                        datatable_sum(dt, false);
                    },
                    footer:true
                },
                {
                    extend: 'print',
                    text: '<?php echo e(trans("file.Print")); ?>',
                    exportOptions: {
                        columns: ':visible:not(.not-exported)',
                        rows: ':visible'
                    },
                    action: function(e, dt, button, config) {
                        datatable_sum(dt, true);
                        $.fn.dataTable.ext.buttons.print.action.call(this, e, dt, button, config);
                        datatable_sum(dt, false);
                    },
                    footer:true
                },
                {
                    extend: 'colvis',
                    text: '<?php echo e(trans("file.Column visibility")); ?>',
                    columns: ':gt(0)'
                }
            ],
            drawCallback: function () {
                var api = this.api();
                datatable_sum(api, false);
            }
        } );

        function datatable_sum(dt_selector, is_calling_first) {
            if (dt_selector.rows( '.selected' ).any() && is_calling_first) {
                var rows = dt_selector.rows( '.selected' ).indexes();

                $( dt_selector.column( 2 ).footer() ).html(dt_selector.cells( rows, 2, { page: 'current' } ).data().sum().toFixed(2));
                $( dt_selector.column( 3 ).footer() ).html(dt_selector.cells( rows, 3, { page: 'current' } ).data().sum());
                $( dt_selector.column( 4 ).footer() ).html(dt_selector.cells( rows, 4, { page: 'current' } ).data().sum().toFixed(2));
            }
            else {
                $( dt_selector.column( 2 ).footer() ).html(dt_selector.column( 2, {page:'current'} ).data().sum().toFixed(2));
                $( dt_selector.column( 3 ).footer() ).html(dt_selector.column( 3, {page:'current'} ).data().sum());
                $( dt_selector.column( 4 ).footer() ).html(dt_selector.column( 4, {page:'current'} ).data().sum().toFixed(2));
            }
        }

        $(".daterangepicker-field").daterangepicker({
            callback: function(startDate, endDate, period){
                var start_date = startDate.format('YYYY-MM-DD');
                var end_date = endDate.format('YYYY-MM-DD');
                var title = start_date + ' To ' + end_date;
                $(this).val(title);
                $('input[name="start_date"]').val(start_date);
                $('input[name="end_date"]').val(end_date);
            }
        });

    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/acquqkkb/public_html/atechcrm/resources/views/report/lead_status_report.blade.php ENDPATH**/ ?>