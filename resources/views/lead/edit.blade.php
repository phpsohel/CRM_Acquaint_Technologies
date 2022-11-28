@extends('layout.main') @section('content')
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            
                            <h4 class="card-title ">Update Lead </h4>
                            <div class="card-tools">
                            
                            </div>

                        </div>
                        <div class="card-body">
                            <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                          
                            {!! Form::open(['route' =>  ['lead.update', $lead->id], 'method' => 'put', 'files' => true]) !!}
                            <div class="row">
                                <div class="col-md-5">

                                    <div class="form-group">
                                        <label>Company <sup class="text-danger">*</sup></label>
                                        <input type="text" name="company" value="{{ $lead->company ?? '' }}"  required class="form-control" >
                                        @if($errors->has('company'))
                                        <span class="text-danger"> {{ $errors->first('company') }}</span>
                                         @endif
                                    </div>

                                    <div class="form-group">
                                        <label> Name <sup class="text-danger">*</sup></strong> </label>
                                        <input type="text" name="name" value="{{ $lead->name ?? '' }}" required class="form-control">
                                        @if($errors->has('name'))
                                        <span class="text-danger"> {{ $errors->first('name') }}</span>
                                         @endif
                                    </div>


                                    <div class="form-group">
                                        <label>Phone Number <sup class="text-danger">*</sup></label>
                                        <input type="text" name="phone_number" value="{{ $lead->phone_number ?? '' }}"  required class="form-control" >
                                        @if($errors->has('phone_number'))
                                        <span class="text-danger"> {{ $errors->first('phone_number') }}</span>
                                         @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Select Upazila <sup class="text-danger">*</sup></label>
                                        <select  name="thana_id" required  class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Upazila">
                                            @foreach($thanas as $thana)
                                                <option value="{{$thana->id}}" {{ $thana->id== $lead->thana_id ? "Selected":'' }} >{{$thana->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('thana_id'))
                                        <span class="text-danger"> {{ $errors->first('thana_id') }}</span>
                                         @endif
                                    </div>
                                    <div class="form-group">
                                        <label> Address <sup class="text-danger">*</sup></strong> </label>
                                        <input type="text" name="address" value="{{ $lead->address ?? '' }}" required class="form-control">
                                        @if($errors->has('address'))
                                        <span class="text-danger"> {{ $errors->first('address') }}</span>
                                         @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input type="email" name="email" value="{{ $lead->email ?? '' }}" class="form-control" >
                                        @if($errors->has('email'))
                                        <span class="text-danger"> {{ $errors->first('email') }}</span>
                                         @endif
                                    </div>

                                    @php
                                        $date = \Carbon\Carbon::now()->format('Y-m-d');
                                    @endphp


                                    <div class="form-group">
                                        <label>Date </label>
                                        <input type="date" name="date"   value="{{$lead->date ?? ''}}" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description"  class="form-control" rows="3">{{ $lead->description ?? '' }}</textarea>
                                    </div>

                                </div>

                                <div class="col-md-5">

                                     <div class="form-group" >
                                        <label>Designation </label>
                                        <input type="text" name="designation" value="{{ $lead->designation ?? '' }}"  placeholder="Designation"  class="form-control" >
                                    </div>



                                    <div class="form-group">
                                        <label>Another Email</label>
                                        <input type="email" name="another_email" value="{{ $lead->another_email ?? '' }}"  placeholder="If have a another Email"  class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label>Another Phone Number</label>
                                        <input type="text" name="another_phone_no" value="{{ $lead->another_phone_no ?? '' }}" placeholder="If have a another Phone No" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label>Lead Category <sup class="text-danger">*</sup></label>

                                        <select  name="lead_category_id" required class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Lead Category...">
                                            @foreach($lims_lead_category_list as $lead_category)
                                                <option value="{{$lead_category->id}}" {{ $lead->lead_category_id== $lead_category->id ? "Selected" : '' }}>{{$lead_category->lead_cat_name}}</option>
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
                                                <option value="{{$lead_status->id}}" {{ $lead->lead_status_id == $lead_status->id ? "selected" : '' }} >{{$lead_status->status_name}}</option>
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
                                                <option value="{{$lead_source->id}}"{{ $lead->lead_source_id == $lead_source->id ? "Selected":'' }} >{{$lead_source->source_name}}</option>
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
                                                <option value="{{$employee->id}}" {{ $lead->employee_id == $employee->id ? 'Selected':'' }} >{{$employee->name}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('employee_id'))
                                        <span class="text-danger"> {{ $errors->first('employee_id') }}</span>
                                         @endif
                                    </div>
                              
                                    
                                    <div class="form-group">
                                        <label>Stage <sup class="text-danger">*</sup></label>
                                        <select  name="stage" class="form-control "  required="true">
                                       
                                            <option value="1"{{ $lead->stage==1 ? "Selected":'' }} >Unapproved</option>
                                            <option value="2"{{ $lead->stage==2 ? "Selected":'' }} >Approved</option>
                                            <option value="3" {{ $lead->stage==3 ? "Selected":'' }}>Pending</option>
                                        </select>
                                        
                                    </div>

                                </div>
                                <br>
                             
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