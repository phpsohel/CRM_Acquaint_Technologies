@foreach($lims_lead_all as $key=>$lead)
@php
// dd($lead);
$remainder = \App\Remainder::where('lead_id',$lead->id)->first();
//dd($remainder);
@endphp
<tr data-id="{{$lead->id}}">
    <td>{{++$i}}</td>
    <td>
        <div class="btn-group" >
            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{trans('file.action')}}
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <style>
                .drop_down_class {
                
                  width: 200px;
                  height: 55px;
                  overflow-x: hidden;
                  overflow-y: scroll;
                }
                </style>
            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default drop_down_class" user="menu" >
                <li>
                    {{--<a href="'.route('product-detail', $product->id).'" class="btn btn-link"><i class="fa fa-bars"></i> '.'Detail'.'</a>--}}
                    <a href="{{route('lead.details', $lead->id)}}" class="btn btn-link"><i class="fa fa-bars"></i> Details</a>
                </li>

             
                    <li>
                        <a href="{{ route('lead.edit',$lead->id) }}" class="edit-btn btn btn-link"><i class="fa fa-edit"></i>Edit data</a>
                          {{-- <button type="button" class="edit-btn btn btn-link" data-toggle="modal" data-target="#editModal_{{ $lead->id }}"><i class="dripicons-document-edit"></i> {{trans('file.edit')}}</button> --}}
                    </li>
           
           
                <li>
                    <a href="{{ route('addremainderLeadId',$lead->id) }}" class="btn btn-link"><i class="fa fa-plus"></i>Add Remainder data</a>
                </li>
            

           
                    <li>
                        <a  href="{{route('lead.destroy', $lead->id)}}" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> {{trans('file.delete')}}</a>
                    </li>
              
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
    <td>{{ $lead->company }}</td>
    <td>{{ $lead->phone_number }}</td>
    <td>{{ $lead->name }}</td>
    <td>{{ $lead->email }}</td>
    
    <td>{{ $lead->address }}</td>
     @if($lead->lead_status_id == null)
         <td></td>
    @else
        <td>{{ $lead->lead_status->status_name }}</td>
    @endif
    @if($lead->lead_category_id == null)
      <td></td>
     @else
    <td>{{ $lead->lead_category->lead_cat_name }}</td>
    @endif
    
    

    @if($lead->employee_id == null)
        <td></td>
    @else
        <td>{{ $lead->employee->name}}</td>
    @endif

    @if($remainder == null)
    <td></td>
    @else
    <td>{{ \Carbon\Carbon::parse($remainder->noti_datetime)->format('Y-m-d') }}</td>
    @endif
    
</tr>

@endforeach
