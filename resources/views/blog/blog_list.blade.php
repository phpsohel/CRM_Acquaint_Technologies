@extends('layout.main')

@section('content')
 <div class="card-header d-flex align-items-center">
         <h4>Blog List</h4>

		<hr>
		<a href="{{route('add-blog')}}" class="btn btn-info" style="float: right"><i class="dripicons-plus"></i>Create Blog</a>
</div>
<section>
    
    <div class="table-responsive">
        <table id="product-data-table" class="table" style="width: 100%">
            <thead>
                <tr>
                    <th class="not-exported"></th>
                    <th>#</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Blog</th>
                    
                    <th class="not-exported">Action</th>
                </tr>
            </thead>
            <tbody>
            	@php($i=1)
            	@foreach($blogs as $row)
            	<tr>
            		<td></td>
            		<td>{{ $i }}</td>
            		<td>{{ $row->blog_title }}</td>
            		<td><img src="{{ $row->blog_image }}" style="height: 50px; width: 100px;"></td>
            		<td>{{ $row->blog }}</td>
            		<td>
            			<a type="button" class="btn btn-primary" href="{{ route('edit-blog', $row->id) }}">Edit</a>
            			<a type="button" class="btn btn-primary" href="{{ route('delete-blog', $row->id) }}">Delete</a>
            		</td>
            	</tr>
            	@php($i++)
            	@endforeach
            </tbody>
            
        </table>
    </div>
</section>


@endsection