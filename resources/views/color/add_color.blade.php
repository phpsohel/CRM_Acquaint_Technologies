@extends('layout.main')

@section('content')

<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Add Color</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                        <form id="product-form" action="{{ route('save-color') }}" method="POST">
                        	@csrf
                            <div class="row">
                               
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Color Name *</strong> </label>
                                        <input type="text" name="color_name" class="form-control" id="name" aria-describedby="name" required>
                                        <span class="validation-msg" id="name-error"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Description</strong> </label>
                                        
                                        <textarea name="color_description" class="form-control"></textarea>
                                        <span class="validation-msg" id="name-error"></span>
                                    </div>
                                </div>
                            <div class="form-group">
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    
    <div class="table-responsive">
        <table id="product-data-table" class="table" style="width: 100%">
            <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    
                    <th class="not-exported">Action</th>
                </tr>
            </thead>
            <tbody>
            	@php($i=1)
            	@foreach($color as $row)
            	<tr>
            		<td></td>
            		<td>{{ $i }}</td>
            		<td>{{ $row->color_name }}</td>
            		<td>{{ $row->color_description }}</td>
            		<td>
            			<a type="button" class="btn btn-primary" href="{{ route('edit-color', $row->id) }}">Edit</a>
            			<a type="button" class="btn btn-primary" href="{{ route('delete-color', $row->id) }}">Delete</a>
            		</td>
            	</tr>
            	@php($i++)
            	@endforeach
            </tbody>
            
        </table>
    </div>
</section>


@endsection