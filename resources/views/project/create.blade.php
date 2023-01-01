@extends('layout.main') @section('content')
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Add Project </h4>
                        </div>
                        <div class="card-body">
                            <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                            {!! Form::open(['route' => 'project.store', 'method' => 'post', 'files' => true]) !!}
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label> Name *</strong> </label>
                                        <input type="text" name="project_name" required class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <label>Customer *</label>
                                        <select required name="customer_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Lead Status...">
                                            @foreach($lims_customer_list as $customer)
                                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Lead *</label>
                                        <select required name="lead_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Lead Status...">
                                            @foreach($lims_lead_list as $lead)
                                                <option value="{{$lead->id}}">{{$lead->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    {{--<div class="form-group">--}}
                                        {{--<label>Sales *</label>--}}
                                        {{--<select required name="sale_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Lead Status...">--}}
                                            {{--@foreach($lims_sale_list as $sale)--}}
                                                {{--<option value="{{$sale->id}}">{{$sale->id}}</option>--}}
                                            {{--@endforeach--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Progress *</strong> </label>
                                        <input type="text" name="progress" required class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Start Date *</strong> </label>
                                        <input type="date" name="start_date" required class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>End Date *</strong> </label>
                                        <input type="date" name="end_date" required class="form-control">
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