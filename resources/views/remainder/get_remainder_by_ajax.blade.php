@forelse($lims_remainder_all as $key=>$remainder)
        
<tr data-id="{{$remainder->id}}">
    <td>{{++$i}}</td>
    <td>
        <div class="btn-group" >
            <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{trans('file.action')}}
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu" style="height: 150px;over-flow:hidden">
                   @if(Auth()->user()->id == 1 || $remainder->noti_datetime == date('Y-m-d'))
                    <li>
                        <a  class="edit_btn btn btn-link" href="{{ route('remainder.edit',$remainder->id) }}" ><i class="dripicons-document-edit"></i> {{trans('file.edit')}}</a>
                    </li>
                    @endif

                  
                    <li>
                        <a href="{{ route('addremainderLeadId',$remainder->lead_id) }}" class="btn btn-link" target="_blank"><i class="fa fa-plus"></i>Add Remainder data</a>
                    </li>

                    @if(Auth()->user()->id == 1 || $remainder->noti_datetime == date('Y-m-d'))
                    <li>
                        <a href="{{route('remainder.changestatus', $remainder->id)}}" class="btn btn-link"> <i class="fa fa-edit"></i>Change Status</a>
                    </li>
                    @endif
             
                    <li>
                        <a href="{{route('remainder.destroy', $remainder->id)}}" class="btn btn-link" onclick="return confirmDelete()"><i class="dripicons-trash"></i> {{trans('file.delete')}}</a>
                    </li>
            
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
@empty
<tr class="">
    <th class="text-danger text-center" colspan="8">
        <h4 class="">Table Data is Not Available</h4>
    </th>
</tr>
@endforelse