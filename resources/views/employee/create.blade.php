@extends('layout.main') @section('content')
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>{{trans('file.Add Employee')}}</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small class="text-danger">{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                        {!! Form::open(['route' => 'employees.store', 'method' => 'post', 'files' => true]) !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{trans('file.name')}} <sup class="text-danger">*</sup></strong> </label>
                                    <input type="text" name="employee_name" value="{{ old('employee_name') }}" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{trans('file.Email')}} <sup class="text-danger">*</sup></label>
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="example@example.com" required class="form-control">
                                    @if($errors->has('email'))
                                   <span>
                                       <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>{{trans('file.Phone Number')}} <sup class="text-danger">*</sup></label>
                                    <input type="text" name="phone_number" value="{{ old('phone_number') }}" required class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>{{trans('file.Address')}}</label>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label>{{trans('file.Image')}}</label>
                                    <input type="file" name="image" class="form-control">
                                    @if($errors->has('image'))
                                   <span>
                                       <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            
                            
                              
                             
                            </div>
                            <div class="col-md-6">
                             
                                <div id="" class="">
                                  
                                    <div class="form-group">
                                        <label>{{trans('file.UserName')}} <sup class="text-danger">*</sup></label>
                                        <input type="text" name="name" value="{{ old('name') }}" required class="form-control" required>
                                        @if($errors->has('name'))
                                       <span>
                                           <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>{{trans('file.Password')}} <sup class="text-danger">*</sup></label>
                                        <input required type="password" name="password" value="{{ old('password') }}" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>{{trans('file.Role')}} <sup class="text-danger">*</sup></label>
                                        <select name="role_id" class="selectpicker form-control" required>
                                            @foreach($lims_role_list as $role)
                                            <option value="{{$role->id}}" {{ old('role_id') == $role->id ? 'Selected':'' }}>{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>{{trans('file.Department')}} <sup class="text-danger">*</sup></label>
                                        <select class="form-control selectpicker" name="department_id" required>
                                            @foreach($lims_department_list as $department)
                                            <option value="{{$department->id}}" {{ old('department_id') == $department->id ? "Selected" :'' }} >{{$department->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                
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