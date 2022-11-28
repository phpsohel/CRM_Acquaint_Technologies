@extends('layout.main')

@section('content')


<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Edit Color</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                        <form id="product-form" action="{{ route('update-color') }}" method="POST">
                        	@csrf
                        	<input type="hidden" name="id" value="{{ $row->id }}">
                            <div class="row">
                               
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Color Name *</strong> </label>
                                        <input type="text" name="color_name" class="form-control" id="name" aria-describedby="name" required value="{{ $row->color_name }}">
                                        <span class="validation-msg" id="name-error"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Description</strong> </label>
                                        
                                        <textarea name="color_description" class="form-control">{{ $row->color_description }}</textarea>
                                        <span class="validation-msg" id="name-error"></span>
                                    </div>
                                </div>
                            <div class="form-group">
                                
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection