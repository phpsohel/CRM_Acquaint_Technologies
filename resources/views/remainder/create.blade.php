@extends('layout.main') @section('content')
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>@if($item->id) Update @else Add @endif Reminder </h4>
                    </div>
                    <div class="card-body">
                        @if($item->id)
                        {!! Form::open(['route' => ['remainder.update',$item->id], 'method' => 'put', 'files' => true]) !!}
                        @else
                        {!! Form::open(['route' => 'remainder.store', 'method' => 'post', 'files' => true]) !!}
                        @endif
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="card">
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label>Lead Name :</label>
                                            <input type="hidden" class="" name="lead_id" value="{{ $lead->id ?? '' }}">
                                            <strong class="">{{ $lead->name ?? '' }}</strong>
                                        </div>
                                        <div class="form-group">
                                            <label for=""> Lead Company Name :</label>
                                            <strong class="">{{ $lead->company ?? '' }}</strong>

                                        </div>


                                        <div class="form-group">
                                            <label> Notification Date *</strong> </label>
                                            <input type="date" name="noti_datetime" value="{{ old('noti_datetime',$item->noti_datetime) }}" required class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label> Details</label>
                                            <textarea name="description" class="form-control" rows="3">{{ old('description',$item->description) }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Follow Up User </label>
                                            <select required name="user_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select User...">
                                                @foreach($lims_user_list as $user)
                                                <option value="{{$user->id}}" {{ old('user_id', $item->user_id) == $user->id ? 'selected' : '' }}>{{$user->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Stage </label>
                                            {{--<input type="hidden" name="stage"/>--}}
                                            <select required id="stage" name="stage" class="form-control selectpicker">
                                                <option value="0" {{ old('stage',$item->stage)==0 ? "Selected":'' }}>Incomplete</option>
                                                <option value="1" {{ old('stage',$item->stage)==1 ? "Selected":'' }}>Complete</option>

                                            </select>
                                        </div>
                                        <div class="form-group mt-4">
                                            <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary">
                                        </div>
                                    </div>
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

<script type="text/javascript">
    $("ul#hrm").siblings('a').attr('aria-expanded', 'true');
    $("ul#hrm").addClass("show");
    $("ul#hrm #employee-menu").addClass("active");

    $('#warehouse').hide();
    $('#biller').hide();


    // Description

    $('input[name="user"]').on('change', function() {
        if ($(this).is(':checked')) {
            $('#user-input').show(400);
            $('input[name="name"]').prop('required', true);
            $('input[name="password"]').prop('required', true);
            $('select[name="role_id"]').prop('required', true);
        } else {
            $('#user-input').hide(400);
            $('input[name="name"]').prop('required', false);
            $('input[name="password"]').prop('required', false);
            $('select[name="role_id"]').prop('required', false);
            $('select[name="warehouse_id"]').prop('required', false);
            $('select[name="biller_id"]').prop('required', false);
        }
    });

    $('select[name="role_id"]').on('change', function() {
        if ($(this).val() > 2) {
            $('#warehouse').show(400);
            $('#biller').show(400);
            $('select[name="warehouse_id"]').prop('required', true);
            $('select[name="biller_id"]').prop('required', true);
        } else {
            $('#warehouse').hide(400);
            $('#biller').hide(400);
            $('select[name="warehouse_id"]').prop('required', false);
            $('select[name="biller_id"]').prop('required', false);
        }
    });

</script>
@endsection
