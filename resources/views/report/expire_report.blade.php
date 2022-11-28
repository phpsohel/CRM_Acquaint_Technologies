@extends('layout.main') @section('content')
<section class="forms">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header mt-2">
                <h3 class="text-center">Expire Report</h3>
            </div>
            <form method="POST" action="{{ route('expire-date-filter') }}">
            	@csrf
            <div class="col-md-6 offset-md-3 mt-3 mb-3">
                <div class="form-group row">
                    <label class="d-tc mt-2"><strong>{{trans('Choose Date Range')}}</strong> &nbsp;</label>
                    <div class="d-tc">
                        <div class="input-group">
                            <input type="date" class="form-control" name="start_date" required value="{{ $start_date }}" />TO
                            <input type="date" class="form-control" name="end_date" required=""  value="{{ $end_date }}" />
                            
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">{{trans('file.submit')}}</button>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            </form>
        </div>
    </div>
    <div class="table-responsive mb-4">
        <table id="example" class="table table-hover">
            <thead>
                <tr>
                    
                    <th>{{trans('Purchase Date')}}</th>
                    <th>{{trans('Purchase Reference')}} </th>
                    <th>{{trans('Product')}} </th>
                    <th>{{trans('Expire Date')}}</th>
                    <th>{{trans('Quantity')}}</th>
                    <!-- <th>{{trans('file.Paid By')}}</th> -->
                    <!-- <th>{{trans('file.Amount')}}</th> -->
                    <!-- <th>{{trans('file.Created By')}}</th> -->
                </tr>
            </thead>
            <tbody>
                
                @foreach($purchase as $row)
                <tr>
                	
                    <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                    <td>{{ $row->reference_no }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ date('d-m-Y', strtotime($row->expire_date)) }}</td>
                    <td>{{ $row->qty }}</td>
                    
                    <!-- <td></td> -->
                    <!-- <td></td> -->
                    <!-- <td></td> -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
<script type="text/javascript">
 $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );

</script>
@endsection