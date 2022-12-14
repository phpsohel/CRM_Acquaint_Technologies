@extends('layout.main') 
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
                    <div class="col-lg-3 col-md-3 col-12">
                       <h4 class=""> Lead List</h4>
                    </div> 
                    <div class="col-lg-5 col-md-5 col-12">
                        <div class="form-group">
                            <input type="text" class="form-control searchingdata" placeholder="Searching Name or Email Or Mobile Or Company Name">

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="full-right">
                            @if(in_array("lead-add", $all_permission))
                            <a  href="{{route('lead.create')}}" class="btn btn-info"><i class="dripicons-plus"></i>Add Lead </a>
                            <a href="#" data-toggle="modal" data-target="#importLead" class="btn btn-primary"><i class="dripicons-copy"></i>Import Lead</a>
                            @endif
                        </div>
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
                            <th>Stage</th>
                            <th>Date</th>
                            <th>Company</th>
                            <th>Phone</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Lead Status</th>
                            <th>Lead Category</th>
                            <th>Employee</th>
                            <th>Next Reminder Date</th>
                        </tr>
                        </thead>
                        <tbody class="tr_search_wise_data_show">
                        @foreach($lims_lead_all as $key=>$lead)
                            @php
                          // dd($lead);
                           $remainder = \App\Remainder::where('lead_id',$lead->id)->first();
                            //dd($remainder);
                            @endphp
                            <tr data-id="{{$lead->id}}">
                                <td>{{++$i}}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{trans('file.action')}}
                                            <span class="caret"></span>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                            <li>
                                               
                                                <a href="{{route('lead.details', $lead->id)}}" class="btn btn-link"><i class="fa fa-bars"></i> Details</a>
                                            </li>
        
                                           @if(in_array("lead-edit", $all_permission))
                                                <li>
                                                    <a href="{{ route('lead.edit',$lead->id) }}" class="edit-btn btn btn-link"><i class="fa fa-edit"></i>Edit data</a>
                                                </li>
                                               
                                            @endif
                                        
                                            @if(in_array("remainder-add", $all_permission))
                                            <li>
                                                <a href="{{ route('addremainderLeadId',$lead->id) }}" class="btn btn-link"><i class="fa fa-plus"></i>Add Remainder data</a>
                                            </li>
                                            @endif
        
                                            @if(in_array("lead-delete", $all_permission))
                                                <li>
                                                    <a  href="{{route('lead.destroy', $lead->id)}}" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> {{trans('file.delete')}}</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </td>
                                @if($lead->stage == 1 )
                                <td>
                                    <a href="#" class="btn btn-danger btn-xs"><strong> Unapproved</strong></a>
                                </td>
                                @elseif($lead->stage == 2)
                                <td>
                                    <a href="#" class="btn btn-success btn-xs"> <strong>Approved</strong></a>
                                </td>
                                @else
                                <td>
                                    <a href="#" class="btn btn-warning btn-xs"> <strong>Pending</strong></a>
                                </td>
                                @endif
                                <td>{{ \Carbon\Carbon::parse($lead->created_at)->format('Y-m-d') }}</td>
                                <td>{{ $lead->company  ?? ''}}</td>
                                <td>{{ $lead->phone_number?? '' }}</td>
                                <td>{{ $lead->name ?? ''}}</td>
                                <td>{{ $lead->email ?? '' }}</td>
                                <td>{{ $lead->address ?? '' }}</td>
                                 @if($lead->lead_status_id == null)
                                     <td></td>
                                @else
                                    <td>{{ $lead->lead_status->status_name }}</td>
                                @endif
                                @if($lead->lead_category_id == null)
                                  <td></td>
                                 @else
                                <td>{{ $lead->lead_category->lead_cat_name ?? '' }}</td>
                                @endif
                                
                                
        
                                @if($lead->employee_id == null)
                                    <td></td>
                                @else
                                    <td>{{ $lead->employee->name ?? ''}}</td>
                                @endif
        
                                @if($remainder == null)
                                <td></td>
                                @else
                                <td>{{ \Carbon\Carbon::parse($remainder->noti_datetime)->format('Y-m-d') }}</td>
                                @endif
                                
                            </tr>
                            @include('lead.get_modal_update_data')
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $lims_lead_all->links() }}
            </div>
        </div>
      
    </section>

  @include('lead.import_lead_modal')

 
   
@endsection
@section('js')
<script type="text/javascript">

    $("ul#lead").siblings('a').attr('aria-expanded','true');
    $("ul#lead").addClass("show");
    $("ul#lead #employee-menu").addClass("active");

    function confirmDelete() {
        if (confirm("Are you sure want to delete?")) {
            return true;
        }
        return false;
    }

      
</script>
    <script>
        $(document).on('keyup', '.searchingdata', function(){
            var searchingdata = $(this).val();
            console.log(searchingdata);
            $.ajax({
                type: 'get',
                url: "{{ route('lead.get_leade_by_ajax') }}",
                dataType: 'HTML',
                data: {
                    searchingdata:searchingdata
                },
                'global': false,
                asyn: true,
                success: function(data) {
                    $(".tr_search_wise_data_show").html(data)
                    console.log(data)
                },
                error: function(response) {
                    console.log(response);
                }
            });
        });
    </script>

@endsection

