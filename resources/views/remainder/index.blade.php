@extends('layout.main')
@section('css')
<link rel="stylesheet" href="{{ asset('public/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/css/select2-bootstrap4.min.css') }}">
@endsection
@section('content')
@if($errors->has('name'))
<div class="alert alert-danger alert-dismissible text-center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ $errors->first('name') }}</div>
@endif
@if($errors->has('image'))
<div class="alert alert-danger alert-dismissible text-center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ $errors->first('image') }}</div>
@endif
@if($errors->has('email'))
<div class="alert alert-danger alert-dismissible text-center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ $errors->first('email') }}</div>
@endif
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{!! session()->get('message') !!}</div>
@endif
@if(session()->has('not_permitted'))
<div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif
<section>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-lg-4 col-md-3">
                    <h4 class=""> Lead Remainder List</h4>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="form-group">
                        <input type="text" class=" form-control searchingdata" placeholder="Searching User Name Or Lead Company">
                        {{-- <select
                            name="lead_id"
                            class="form-control searchingdata" data-size="5"
                            data-live-search="true" >
                            @foreach ($lims_lead_list as $lims_lead)
                                <option value="{{ $lims_lead->id }}" class="">{{ $lims_lead->company ?? '
                                ' }}</option>

                        @endforeach
                        </select> --}}



                    </div>
                </div>
                <div class="col-lg-4 col-md-3">
                    @if(in_array("employees-add", $all_permission))

                    {{-- <a href="{{route('remainder.create')}}" class="btn btn-info "><i class="dripicons-plus"></i>Add Reminder </a>
                    --}}
                    @endif
                </div>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="" class="table table-bordered table-sm table-striped text-nowrap">
                    <thead>
                        <tr>
                            <th class="not-exported">SL</th>
                            <th class="not-exported">{{trans('file.action')}}</th>
                            <th>Status</th>
                            <th>User</th>
                            <th> Notification Date</th>
                            <th> Lead Person</th>
                            <th>Company Name</th>
                            <th>Mobile No</th>
                            <th>Address</th>
                            <th>Employee Name</th>
                            <th>Details</th>


                        </tr>
                    </thead>
                    <tbody class="tr_search_wise_data_show">
                        @foreach($lims_remainder_all as $key=>$remainder)

                        <tr data-id="{{$remainder->id}}">
                            <td>{{++$i}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{trans('file.action')}}
                                        <span class="caret"></span>
                                        <span class="sr-only">Toggle Dropdown</span>
                                    </button>
                                    <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                        {{-- @if(in_array("employees-edit", $all_permission))
                                        @if(Auth()->user()->id == 1 || $remainder->noti_datetime == date('Y-m-d')) --}}
                                      
                                        <li>
                                            <a class="edit_btn btn btn-link" href="{{ route('remainder.edit',$remainder->id) }}"><i class="dripicons-document-edit"></i> {{trans('file.edit')}}</a>
                                        </li>
                                      
                                        {{-- @endif
                                        @endif --}}
                                        @if(in_array("remainder-add", $all_permission))
                                        <li>
                                            <a href="{{ route('addremainderLeadId',$remainder->lead_id) }}" class="btn btn-link" target="_blank"><i class="fa fa-plus"></i>Add Remainder data</a>
                                        </li>
                                        @endif

                                        {{-- @if(Auth()->user()->id == 1 || $remainder->noti_datetime == date('Y-m-d')) --}}
                                        <li>
                                            <a href="{{route('remainder.changestatus', $remainder->id)}}" class="btn btn-link"> <i class="fa fa-edit"></i>Change Status</a>
                                        </li>
                                        {{-- @endif --}}
                                        @if(in_array("employees-delete", $all_permission))

                                            <li>
                                                <a class="btn btn-link" data-toggle="modal" data-target="#myModal{{ $remainder->id }}"><i class=" dripicons-trash"></i> Delete</a>
                                            </li>

                                        @endif
                                    </ul>
                                </div>
                            </td>
                            <td>
                                @if($remainder->stage == 0)
                                <strong class="" style="color: red">RE <i class="fa fa-times-circle px-2" aria-hidden="true"></i></strong>
                                @else
                                <strong style="color: green">RE <i class="fa fa-check-square px-2" aria-hidden="true"></i></strong>
                                @endif

                            <td>
                                {{ $remainder->user->name ?? '' }}
                            </td>
                            <td>{{ \Carbon\Carbon::parse($remainder->noti_datetime)->format('Y-m-d') }}</td>
                            <td>{{ $remainder->lead->name ?? '' }} </td>
                            <td>{{ $remainder->lead->company ?? '' }}</td>
                            <td>{{ $remainder->lead->phone_number ?? '' }}</td>
                            <td>{{ $remainder->lead->address ?? '' }}</td>
                            <td>{{ $remainder->lead->employee->name ?? '' }}</td>

                            <td>{!! Str::limit($remainder->description, 50, ' ...') !!}</td>


                        </tr>
                        @include('remainder.modal_for_update')
                        @include('remainder.deleted_modal')

                        @endforeach
                    </tbody>
                </table>
                <br>
                <br>
            </div>
            {{ $lims_remainder_all->links() }}
        </div>
    </div>

</section>


@endsection

@section('js')
<script src="{{ asset('public/js/select2.full.min.js') }}"></script>

<script>
    $("ul#lead").siblings('a').attr('aria-expanded', 'true');
    $("ul#lead").addClass("show");
    $("ul#lead #employee-menu").addClass("active");

    $(document).on('keyup', '.searchingdata', function() {
        var searchingdata = $('.searchingdata').val();

        console.log(searchingdata);
        $.ajax({
            type: 'get'
            , url: "{{ route('getRemainderData') }}"
            , dataType: 'HTML'
            , data: {
                searchingdata: searchingdata
            }
            , 'global': false
            , asyn: true
            , success: function(data) {
                $(".tr_search_wise_data_show").html(data)
                console.log(data)
            }
            , error: function(response) {
                console.log(response);
            }
        });
    });

</script>


@endsection
