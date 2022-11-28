@extends('layouts.app')
@section('content')

@if(session()->has('message'))
 <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div> 
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->is_active)
                    You are Expired! Please contact with admin to renew date.
                    @else
                    You are logged in but id is not activated! Please contact with admin.
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script type="text/javascript">
    alert('You are Expired! Please contact with admin to renew date.');
</script> -->
@endsection
