@extends('layout.main')

@section('content')

<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Create Blog</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                        <form id="product-form" action="{{ route('update-blog') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $blog->id }}">
                            <div class="row">
                               
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Blog Title *</strong> </label>
                                        <input type="text" name="blog_title" class="form-control" id="blog_title" aria-describedby="blog_title" value="{{ $blog->blog_title }}" required>
                                        <span class="validation-msg" id="blog_title-error"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Blog Image *</strong> </label>
                                        <input type="hidden" name="blog_image_old" value="{{ $blog->blog_image }}">
                                        <input type="file" name="blog_image" class="form-control" id="blog_image" aria-describedby="blog_image">
                                        <span class="validation-msg" id="blog_image-error"></span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Blog</strong> </label>
                                        
                                        <textarea name="blog" class="form-control">{{ $blog->blog }}</textarea>
                                        <span class="validation-msg" id="blog-error"></span>
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




@endsection