 @if(Session('success'))
      <div class="form-group col-sm-4">
            <div class="alert alert-primary" role="alert">
                     {{ Session('success') }}
                </div>
           </div>
  @endif

   @if(Session('alert'))
      <div class="form-group col-sm-4">
            <div class="alert alert-danger" role="alert">
                     {{ Session('alert') }}
                </div>
           </div>
  @endif


@if($errors->any())
	@foreach($errors->all() as $error)
      <div class="form-group col-sm-4">
            <div class="alert alert-danger" role="alert">
                     {{ $error }}
                </div>
           </div>
    @endforeach
 @endif