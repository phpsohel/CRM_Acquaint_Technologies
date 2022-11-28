@extends('layout.main') @section('content')
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header ">
                            <h4>Add Lead </h4>
                            <div class="card-title">
                              
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="italic"><small class=" text-danger">{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                            {!! Form::open(['route' => 'lead.store', 'method' => 'post', 'files' => true]) !!}
                            <div class="row">
                                <div class="col-lg-12 col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">

                                                    <div class="form-group">
                                                        <label>Company <sup class="text-danger">*</sup></label>
                                                        <input type="text" name="company" value="{{ old('company') }}"  required class="form-control" >
                                                        @if($errors->has('company'))
                                                        <span class="text-danger"> {{ $errors->first('company') }}</span>
                                                         @endif
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label> Name <sup class="text-danger">*</sup></strong> </label>
                                                        <input type="text" name="name" value="{{ old('name') }}" required class="form-control">
                                                        @if($errors->has('name'))
                                                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                                                         @endif
                                                    </div>
                
                
                                                    <div class="form-group">
                                                        <label>Phone Number <sup class="text-danger">*</sup></label>
                                                        <input type="text" name="phone_number" value="{{ old('phone_number') }}"  required class="form-control" >
                                                        @if($errors->has('phone_number'))
                                                        <span class="text-danger"> {{ $errors->first('phone_number') }}</span>
                                                         @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Select Upazila <sup class="text-danger">*</sup></label>
                                                        <select  name="thana_id" required  class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Upazila">
                                                            @foreach($thanas as $thana)
                                                                <option value="{{$thana->id}}" {{ $thana->id==old('thana_id') ? "Selected":'' }} >{{$thana->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('thana_id'))
                                                        <span class="text-danger"> {{ $errors->first('thana_id') }}</span>
                                                         @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label> Address <sup class="text-danger">*</sup></strong> </label>
                                                        <input type="text" name="address" value="{{ old('address') }}" required class="form-control">
                                                        @if($errors->has('address'))
                                                        <span class="text-danger"> {{ $errors->first('address') }}</span>
                                                         @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email </label>
                                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" >
                                                        @if($errors->has('email'))
                                                        <span class="text-danger"> {{ $errors->first('email') }}</span>
                                                         @endif
                                                    </div>
                
                                                    @php
                                                        $date = \Carbon\Carbon::now()->format('Y-m-d');
                                                    @endphp
                
                
                                                    <div class="form-group">
                                                        <label>Date </label>
                                                        <input type="date" name="date"   value="{{$date}}" class="form-control" >
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <textarea name="description"  class="form-control" rows="3">{{ old('description') }}</textarea>
                                                    </div>
                
                                                </div>
                
                                                <div class="col-md-6">
                                                   
                                                    {{--<div class="form-group">--}}
                                                        {{--<label>Designation </label>--}}
                                                        {{--<select  id="designation"  name="designation" class="form-control selectpicker" title="Select Designation">--}}
                                                            {{--<option  value="Chairman">Chairman</option>--}}
                                                            {{--<option  value="Chief Executive Officer (CEO)">Chief Executive Officer (CEO)</option>--}}
                                                            {{--<option  value="Managing Director (MD)">Managing Director (MD)</option>--}}
                                                            {{--<option  value="Manager">Manager</option>--}}
                                                            {{--<option  value="General Manager">General Manager</option>--}}
                                                            {{--<option  value="Assistant Manager">Assistant Manager</option>--}}
                                                            {{--<option  value="IT Executive">IT Executive</option>--}}
                                                            {{--<option  value="Sales Manager">Sales Manager</option>--}}
                                                            {{--<option  value="Sales Executive">Sales Executive</option>--}}
                                                            {{--<option  value="Executive">Executive</option>--}}
                                                            {{--<option  value="other">other</option>--}}
                                                        {{--</select>--}}
                                                        {{--</select>--}}
                                                    {{--</div>--}}
                
                                                     <div class="form-group" >
                                                        <label>Designation </label>
                                                        <input type="text" name="designation" value="{{ old('designation') }}"  placeholder="Designation"  class="form-control" >
                                                    </div>
                
                
                
                                                    <div class="form-group">
                                                        <label>Another Email</label>
                                                        <input type="email" name="another_email" value="{{ old('another_email') }}"  placeholder="If have a another Email"  class="form-control" >
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label>Another Phone Number</label>
                                                        <input type="text" name="another_phone_no" value="{{ old('another_phone_no') }}" placeholder="If have a another Phone No" class="form-control" >
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label>Lead Category <sup class="text-danger">*</sup></label>
                
                                                        <select  name="lead_category_id" required class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Lead Category...">
                                                            @foreach($lims_lead_category_list as $lead_category)
                                                                <option value="{{$lead_category->id}}"{{ $lead_category->id == old('lead_category_id') ? 'Selected':'' }} >{{$lead_category->lead_cat_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('lead_category_id'))
                                                        <span class="text-danger"> {{ $errors->first('lead_category_id') }}</span>
                                                         @endif
                
                                                    </div>
                
                                                    <div class="form-group">
                                                        <label>Lead Status <sup class="text-danger">*</sup></label>
                                                        <select  name="lead_status_id" required class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Lead Status...">
                                                            @foreach($lims_lead_status_list as $lead_status)
                                                                <option value="{{$lead_status->id}}" {{ $lead_status->id == old('lead_status_id') ? 'Selected':'' }}>{{$lead_status->status_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('lead_status_id'))
                                                        <span class="text-danger"> {{ $errors->first('lead_status_id') }}</span>
                                                         @endif
                                                    </div>
                
                
                
                
                                                    <div class="form-group">
                                                        <label>Lead Source <sup class="text-danger">*</sup></label>
                                                        <select  name="lead_source_id" required class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Lead Source...">
                                                            @foreach($lims_lead_source_list as $lead_source)
                                                                <option value="{{$lead_source->id}}" {{ $lead_source->id == old('lead_source_id')? "Selected":'' }}>{{$lead_source->source_name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('lead_source_id'))
                                                        <span class="text-danger"> {{ $errors->first('lead_source_id') }}</span>
                                                         @endif
                
                                                    </div>
                
                
                                                    <div class="form-group">
                                                        <label>Employee <sup class="text-danger">*</sup></label>
                                                        <select  name="employee_id" required  class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Employee...">
                                                            @foreach($lims_employee_list as $employee)
                                                                <option value="{{$employee->id}}" {{ $employee->id==old('employee_id') ? "Selected":'' }} >{{$employee->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('employee_id'))
                                                        <span class="text-danger"> {{ $errors->first('employee_id') }}</span>
                                                         @endif
                                                    </div>

                                                 
                
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                                <br>
                                <div class="col-md-12 mt-2" id="diffPrice-option">
                                    <h5>
                                        <input name="is_remainder"   type="checkbox" id="is-diffPrice" value="1">&nbsp;
                                        Add Reminder
                                    </h5>
                                </div>


                                <div class="col-md-12 row" id="diffPrice-section">
                                    <div class="col-md-5">

                                        <div class="form-group">
                                            <label> Notification Datetime </strong> </label>
                                            <input type="date" name="noti_datetime" value="{{ old('noti_datetime') }}" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Follow Up User </label>
                                            <select  name="user_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select User...">
                                                @foreach($lims_user_list as $user)
                                                    <option value="{{$user->id}}"{{ $user->id == old('user_id')? "Selected":'' }} >{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label> Details</label>
                                            <textarea name="remainder_description"  class="form-control" rows="3">{{ old('remainder_description') }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-4">
                                        <a href="{{ URL::Previous() }}" class="btn btn-info btn-sm float-left"><i class="fa fa-undo px-2"></i>Back</a>
                                        <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary btn-sm float-right">
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
    $("#diffPrice-section").hide();
       // $("#other").hide();

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

    //  $('select[name="designation"]').on('change', function() {
    //
    //     if($(this).val() == 'other'){
    //         $('#other').show(400);
    //     }
    //     else{
    //         $('#other').hide(400);
    //
    //
    //     }
    // });



    $("input[name='is_remainder']").on("change", function () {
        if ($(this).is(':checked')) {
            $("#diffPrice-section").show(300);
        }
        else
            $("#diffPrice-section").hide(300);
    });

</script>
@endsection