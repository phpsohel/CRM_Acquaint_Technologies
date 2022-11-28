@extends('layout.main') @section('content')
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Add Ticket </h4>
                        </div>
                        <div class="card-body">
                            <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                            {!! Form::open(['route' => 'ticket.store', 'method' => 'post', 'files' => true]) !!}
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Subject *</strong> </label>
                                        <input type="text" name="subject" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Project Name *</strong> </label>
                                        <input type="text" name="project_id" value="{{$lims_project_list->project_name}}"  readonly required class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Customer *</label>
                                        <input type="text" name="customer_id" value="{{$lims_customer_list->name}}"  readonly required class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-5">

                                    <div class="form-group">
                                        <label>Priority *</label>
                                        <select required name="priority" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select One ...">
                                            <option value="1">High</option>
                                            <option value="0">Low</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Department *</label>
                                        <select required name="department_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Department ...">
                                            @foreach($lims_department_list as $department)
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Employee *</label>
                                        <select required name="employee_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select User ...">
                                            @foreach($lims_employee_list as $employee)
                                                <option value="{{$employee->id}}">{{$employee->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Attachment </strong> </label>
                                        <input type="file" name="attachment"  class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <input type="hidden" name="project_id" value="{{$lims_project_list->id}}">
                                        <input type="hidden" name="customer_id" value="{{$lims_customer_list->id}}">
                                    </div>
                                </div>


                                <div class="col-md-12">
                                    <div class="form-group mt-4">
                                        <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 
@endsection
@section('js')
<script type="text/javascript">
    $("ul#hrm").siblings('a').attr('aria-expanded','true');
    $("ul#hrm").addClass("show");
    $("ul#hrm #employee-menu").addClass("active");

    $('#warehouse').hide();
    $('#biller').hide();

    $('select[name="customer_id"]').val($('input[name="customer_id_hidden"]').val());

    $('input[name="user"]').on('change', function() {
        if ($(this).is(':checked')) {
            $('#user-input').show(400);
            $('input[name="name"]').prop('required',true);
            $('input[name="password"]').prop('required',true);
            $('select[name="role_id"]').prop('required',true);
        }
        else{
            $('#user-input').hide(400);
            $('input[name="name"]').prop('required',false);
            $('input[name="password"]').prop('required',false);
            $('select[name="role_id"]').prop('required',false);
            $('select[name="warehouse_id"]').prop('required',false);
            $('select[name="biller_id"]').prop('required',false);
        }
    });

    $('select[name="role_id"]').on('change', function() {
        if($(this).val() > 2){
            $('#warehouse').show(400);
            $('#biller').show(400);
            $('select[name="warehouse_id"]').prop('required',true);
            $('select[name="biller_id"]').prop('required',true);
        }
        else{
            $('#warehouse').hide(400);
            $('#biller').hide(400);
            $('select[name="warehouse_id"]').prop('required',false);
            $('select[name="biller_id"]').prop('required',false);
        }
    });
</script>
@endsection