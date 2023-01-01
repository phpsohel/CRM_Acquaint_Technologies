@extends('layout.main') @section('content')

@if($errors->has('unit_code'))
<div class="alert alert-danger alert-dismissible text-center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ $errors->first('unit_code') }}</div>
@endif
@if($errors->has('unit_name'))
<div class="alert alert-danger alert-dismissible text-center">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ $errors->first('unit_name') }}</div>
@endif
@if(session()->has('message'))
  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div> 
@endif
@if(session()->has('delete'))
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('delete') }}</div>
@endif
@if(session()->has('not_permitted'))
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div> 
@endif

<section>
    <div class="container-fluid">
        <a href="#" data-toggle="modal" data-target="#createModal" class="btn btn-info"><i class="dripicons-plus"></i> Add Thana</a>&nbsp;
        {{-- <a href="#" data-toggle="modal" data-target="#importUnit" class="btn btn-primary"><i class="dripicons-copy"></i> Import Thana</a> --}}

    </div>
    <div class="table-responsive">
        <table id="unit-table" class="table">
            <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th>{{trans('file.name')}}</th>
                    <th class="not-exported">{{trans('file.action')}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($thanas as $key=>$thana)
                <tr data-id="{{$thana->id}}">
                    <td>{{$key}}</td>
                    <td>{{ $thana->name ?? '' }}</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{trans('file.action')}}
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu edit-options dropdown-menu-right dropdown-default" user="menu">
                                <li>
                                    <button type="button" class="open-EditUnitDialog btn btn-link" data-toggle="modal" data-target="#edit-role{{ $thana->id }}"><i class="dripicons-document-edit"></i> {{trans('file.edit')}}
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <button type="submit" class="open-EditUnitDialog btn btn-link" data-toggle="modal" data-target="#delete_modal{{ $thana->id }}"><i class=" dripicons-trash"></i> {{trans('file.delete')}}</button>
                                </li>
                                
                            </ul>
                        </div>
                    </td>
                </tr>
               
                @include('thana.edit_modal')
                @include('thana.delete_modal')
                @endforeach
            </tbody>
        </table>
    </div>
</section>
<!-- Modal -->

<div id="createModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
           <form action="{{ route('thana.store') }}" method="POST">
            @csrf
            @method('POST')
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">Add Thana</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
            </div>
            <div class="modal-body">
                <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                <div class="form-group">
                    <label>Thana Name *</label>
                    {{Form::text('name',null,array('required' => 'required', 'class' => 'form-control'))}}
                    @if($errors->has('name'))
                    <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary">
            </div>
       </form>
    </div>
</div>
</div>



<div id="importUnit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
      <div class="modal-content">
        {!! Form::open(['route' => 'unit.import', 'method' => 'post', 'files' => true]) !!}
        <div class="modal-header">
          <h5 id="exampleModalLabel" class="modal-title"> {{trans('file.Import Unit')}}</h5>
          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
        </div>
        <div class="modal-body">
            <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
            <p>{{trans('file.The correct column order is')}} (unit_code*, unit_name*, base_unit [unit code], operator, operation_value) {{trans('file.and you must follow this')}}.</p>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>{{trans('file.Upload CSV File')}} *</label>
                        {{Form::file('file', array('class' => 'form-control','required'))}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label> {{trans('file.Sample File')}}</label>
                        <a href="public/sample_file/sample_unit.csv" class="btn btn-info btn-block btn-md"><i class="dripicons-download"></i>  {{trans('file.Download')}}</a>
                    </div>
                </div>
            </div>
            <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary">
        </div>
        {{ Form::close() }}
      </div>
    </div>
</div>


@endsection

@section('js')
@include('layout.all_data_table_js')
<script type="text/javascript">
    $("ul#setting").siblings('a').attr('aria-expanded','true');
    $("ul#setting").addClass("show");
    $("ul#setting #unit-menu").addClass("active");

    var unit_id = [];
    var user_verified = <?php echo json_encode(env('USER_VERIFIED')) ?>;
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".operator").hide();
    $(".operation_value").hide();
     function confirmDelete() {
        if (confirm("Are you sure want to delete?")) {
            return true;
        }
        return false;
    }
// $(document).ready(function() {
//     $('.open-EditUnitDialog').on('click', function() {
//         var url = "unit/"
//         var id = $(this).data('id').toString();
//         url = url.concat(id).concat("/edit");

//         $.get(url, function(data) {
//             $("input[name='unit_code']").val(data['unit_code']);
//             $("input[name='unit_name']").val(data['unit_name']);
//             $("input[name='operator']").val(data['operator']);
//             $("input[name='operation_value']").val(data['operation_value']);
//             $("input[name='unit_id']").val(data['id']);
//             $("#base_unit_edit").val(data['base_unit']);
//             if(data['base_unit']!=null)
//             {
//                 $(".operator").show();
//                 $(".operation_value").show();
//             }
//             else
//             {
//                 $(".operator").hide();
//                 $(".operation_value").hide();
//             }
//             $('.selectpicker').selectpicker('refresh');

//         });
//     });

//     $.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//         }
//     });

//     $( "#select_all" ).on( "change", function() {
//         if ($(this).is(':checked')) {
//             $("tbody input[type='checkbox']").prop('checked', true);
//         } 
//         else {
//             $("tbody input[type='checkbox']").prop('checked', false);
//         }
//     });

//     $("#export").on("click", function(e){
//         e.preventDefault();
//         var unit = [];
//         $(':checkbox:checked').each(function(i){
//           unit[i] = $(this).val();
//         });
//         $.ajax({
//            type:'POST',
//            url:'/exportunit',
//            data:{

//                 unitArray: unit
//             },
//            success:function(data){
//             alert('Exported to CSV file successfully! Click Ok to download file');
//             window.location.href = data;
//            }
//         });
//     });

//     $('.open-CreateUnitDialog').on('click', function() {
//         $(".operator").hide();
//         $(".operation_value").hide();
        
//     });

//     $('#base_unit_create').on('change', function() {
//         if($(this).val()){
//             $("#createModal .operator").show();
//             $("#createModal .operation_value").show();
//         }
//         else{
//             $("#createModal .operator").hide();
//             $("#createModal .operation_value").hide();
//         }
//     });

//     $('#base_unit_edit').on('change', function() {
//         if($(this).val()){
//             $("#editModal .operator").show();
//             $("#editModal .operation_value").show();
//         }
//         else{
//             $("#editModal .operator").hide();
//             $("#editModal .operation_value").hide();
//         }
//     });
// });

    $('#unit-table').DataTable( {
        "order": [],
        'language': {
            'lengthMenu': '_MENU_ {{trans("file.records per page")}}',
             "info":      '<small>{{trans("file.Showing")}} _START_ - _END_ (_TOTAL_)</small>',
            "search":  '{{trans("file.Search")}}',
            'paginate': {
                    'previous': '<i class="dripicons-chevron-left"></i>',
                    'next': '<i class="dripicons-chevron-right"></i>'
            }
        },
        'columnDefs': [
            {
                "orderable": false,
                'targets': [0, 2]
            },
            {
                'render': function(data, type, row, meta){
                    if(type === 'display'){
                        data = '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>';
                    }

                   return data;
                },
                'checkboxes': {
                   'selectRow': true,
                   'selectAllRender': '<div class="checkbox"><input type="checkbox" class="dt-checkboxes"><label></label></div>'
                },
                'targets': [0]
            }
        ],
        'select': { style: 'multi',  selector: 'td:first-child'},
        'lengthMenu': [[10, 25, 50, -1], [10, 25, 50, "All"]],
        dom: '<"row"lfB>rtip',
        buttons: [
            {
                extend: 'pdf',
                text: '{{trans("file.PDF")}}',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                extend: 'csv',
                text: '{{trans("file.CSV")}}',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                extend: 'print',
                text: '{{trans("file.Print")}}',
                exportOptions: {
                    columns: ':visible:Not(.not-exported)',
                    rows: ':visible'
                },
            },
            {
                text: '{{trans("file.delete")}}',
                className: 'buttons-delete',
                action: function ( e, dt, node, config ) {
                    if(user_verified == '1') {
                        unit_id.length = 0;
                        $(':checkbox:checked').each(function(i){
                            if(i){
                                unit_id[i-1] = $(this).closest('tr').data('id');
                            }
                        });
                        if(unit_id.length && confirm("Are you sure want to delete?")) {
                            $.ajax({
                                type:'POST',
                                url:'unit/deletebyselection',
                                data:{
                                    unitIdArray: unit_id
                                },
                                success:function(data){
                                    alert(data);
                                }
                            });
                            dt.rows({ page: 'current', selected: true }).remove().draw(false);
                        }
                        else if(!unit_id.length)
                            alert('No unit is selected!');
                    }
                    else
                        alert('This feature is disable for demo!');
                }
            },
            {
                extend: 'colvis',
                text: '{{trans("file.Column visibility")}}',
                columns: ':gt(0)'
            },
        ],
    } );
</script>
@endsection