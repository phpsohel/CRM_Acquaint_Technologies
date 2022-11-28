@extends('layout.main') @section('content')

@if(session()->has('message'))
  <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div> 
@endif
@if(session()->has('not_permitted'))
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div> 
@endif
<section class="forms">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        <h4>Report Setting</h4>
                    </div>
                    <div class="card-body">
                        <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                        {!! Form::open(['route' => 'report-setting-store', 'files' => true, 'method' => 'post']) !!}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Company Name *</label>
                                        <input type="text" name="company_name" class="form-control" value="@if($lims_general_setting_data){{$lims_general_setting_data->company_name}}@endif" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Address *</label>
                                        <input type="text" name="address" class="form-control" value="@if($lims_general_setting_data){{$lims_general_setting_data->address}}@endif" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone *</label>
                                        <input type="text" name="phone" class="form-control" value="@if($lims_general_setting_data){{$lims_general_setting_data->phone}}@endif" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input type="text" name="email" class="form-control" value="@if($lims_general_setting_data){{$lims_general_setting_data->email}}@endif" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Fax *</label>
                                        <input type="text" name="fax" class="form-control" value="@if($lims_general_setting_data){{$lims_general_setting_data->fax}}@endif" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Website *</label>
                                        <input type="text" name="website" class="form-control" value="@if($lims_general_setting_data){{$lims_general_setting_data->website}}@endif" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Company Logo *</label>
                                        <input type="file" name="site_logo" class="form-control" value=""/>
                                    </div>
                                    @if($errors->has('site_logo'))
                                   <span>
                                       <strong>{{ $errors->first('site_logo') }}</strong>
                                    </span>
                                    @endif
                                </div>
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{trans('file.Developed By')}}</label>
                                        <input type="text" name="developed_by" class="form-control" value="{{$lims_general_setting_data->developed_by}}">
                                    </div>
                                </div>   
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Logo Position</label>
                                        @if($lims_general_setting_data->logo_position == 1)
                                        <input class="form-control"type="radio" id="center" name="position" value="1" checked>
                                        <label for="center">Center</label><br>
                                        <input class="form-control"  type="radio" id="left" name="position" value="0">
                                        <label for="left">Left</label><br>
                                        @else
                                        <input class="form-control"type="radio" id="center" name="position" value="1">
                                        <label for="center">Center</label><br>
                                        <input class="form-control"  type="radio" id="left" name="position" value="0" checked="">
                                        <label for="left">Left</label><br>
                                        @endif
                                    </div>
                                </div>  

                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Text Size</label>
                                        @if($lims_general_setting_data->text_font == 0)
                                        <input class="form-control"type="radio" id="small" name="text_font" value="0" checked>
                                        <label for="center">Small</label><br>
                                        <input class="form-control"  type="radio" id="medium" name="text_font" value="1">
                                        <label for="left">Medium</label><br>
                                        <input class="form-control"  type="radio" id="large" name="text_font" value="2">
                                        <label for="left">Large</label><br>
                                        @elseif($lims_general_setting_data->text_font == 1)
                                        <input class="form-control"type="radio" id="small" name="text_font" value="0">
                                        <label for="center">Small</label><br>
                                        <input class="form-control"  type="radio" id="medium" name="text_font" value="1" checked>
                                        <label for="left">Medium</label><br>
                                        <input class="form-control"  type="radio" id="large" name="text_font" value="2">
                                        <label for="left">Large</label><br>
                                        @else
                                        <input class="form-control"type="radio" id="small" name="text_font" value="0">
                                        <label for="center">Small</label><br>
                                        <input class="form-control"  type="radio" id="medium" name="text_font" value="1">
                                        <label for="left">Medium</label><br>
                                        <input class="form-control"  type="radio" id="large" name="text_font" value="2" checked>
                                        <label for="left">Large</label><br>
                                        @endif        
                                    </div>
                                </div>   

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Text Font</label>
                                        @if($lims_general_setting_data->text_format == 0)
                                        <input class="form-control"type="radio" id="Arial" name="text_format" value="0" checked>
                                        <label for="center">Arial</label><br>
                                        <input class="form-control"  type="radio" id="medium" name="text_format" value="1">
                                        <label for="left">Times New Roman</label><br>
                                        <input class="form-control"  type="radio" id="large" name="text_format" value="2">
                                        <label for="left">Lucida Console</label><br>
                                        @elseif($lims_general_setting_data->text_format == 1)
                                        <input class="form-control"type="radio" id="small" name="text_format" value="0">
                                        <label for="center">Arial</label><br>
                                        <input class="form-control"  type="radio" id="medium" name="text_format" value="1" checked>
                                        <label for="left">Times New Roman</label><br>
                                        <input class="form-control"  type="radio" id="large" name="text_format" value="2">
                                        <label for="left">Lucida Console</label><br>
                                        @else
                                        <input class="form-control"type="radio" id="small" name="text_format" value="0">
                                        <label for="center">Arial</label><br>
                                        <input class="form-control"  type="radio" id="medium" name="text_format" value="1">
                                        <label for="left">Times New Roman</label><br>
                                        <input class="form-control"  type="radio" id="large" name="text_format" value="2" checked>
                                        <label for="left">Lucida Console</label><br>
                                        @endif        
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary">
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection
@section('js')
<script type="text/javascript">
    $("ul#setting").siblings('a').attr('aria-expanded','true');
    $("ul#setting").addClass("show");
    $("ul#setting #general-setting-menu").addClass("active");

    $("select[name=invoice_format]").on("change", function (argument) {
        if($(this).val() == 'standard') {
            $("#state").addClass('d-none');
            $("input[name=state]").prop("required", false);
        }
        else if($(this).val() == 'gst') {
            $("#state").removeClass('d-none');
            $("input[name=state]").prop("required", true);
        }
    })
    if($("input[name='timezone_hidden']").val()){
        $('select[name=timezone]').val($("input[name='timezone_hidden']").val());
        $('select[name=staff_access]').val($("input[name='staff_access_hidden']").val());
        $('select[name=date_format]').val($("input[name='date_format_hidden']").val());
        $('select[name=invoice_format]').val($("input[name='invoice_format_hidden']").val());
        if($("input[name='invoice_format_hidden']").val() == 'gst') {
            $('select[name=state]').val($("input[name='state_hidden']").val());
            $("#state").removeClass('d-none');
        }
        $('.selectpicker').selectpicker('refresh');
    }

    $('.theme-option').on('click', function() {
        $.get('general_setting/change-theme/' + $(this).data('color'), function(data) {
        });
        var style_link= $('#custom-style').attr('href').replace(/([^-]*)$/, $(this).data('color') );
        $('#custom-style').attr('href', style_link);
    });

    
</script>
@endsection