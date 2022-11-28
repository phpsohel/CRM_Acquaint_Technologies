@extends('layout.main') @section('content')
    <section class="forms">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header d-flex align-items-center">
                            <h4>Add Ticket Replies </h4>
                        </div>
                        <div class="card-body">
                            <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                            {!! Form::open(['route' => 'ticket_replies.store', 'method' => 'post', 'files' => true]) !!}
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Ticket *</label>
                                        <select required name="ticket_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select  Ticket...">
                                            @foreach($lims_ticket_list as $ticket)
                                                <option value="{{$ticket->id}}">{{$ticket ->subject}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Employee *</label>
                                        <select required name="employee_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select User ...">
                                            @foreach($lims_emoloyee_list as $employee)
                                                <option value="{{$employee->id}}">{{$employee->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Attachment </strong> </label>
                                        <input type="file" name="attachment"  class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="description" class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mt-4">
                                        <input type="submit" value="{{trans('file.submit')}}" class="btn btn-primary">
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
        $("ul#hrm").siblings('a').attr('aria-expanded','true');
        $("ul#hrm").addClass("show");
        $("ul#hrm #employee-menu").addClass("active");

        $('#warehouse').hide();
        $('#biller').hide();

        $('input[name="user"]').on('change', function() {
            if ($(this).is(':checked')) {
                $('#user-input').show(400);
                $('input[name="name"]').prop('required',true);
                $('input[name="password"]').prop('required',true);
                $('select[name="role_id"]').prop('required',true);
            }
            else{
                $('#user-input').hide(400);
                $('input[name="name"]').prop('required',false);
                $('input[name="password"]').prop('required',false);
                $('select[name="role_id"]').prop('required',false);
                $('select[name="warehouse_id"]').prop('required',false);
                $('select[name="biller_id"]').prop('required',false);
            }
        });

        $('select[name="role_id"]').on('change', function() {
            if($(this).val() > 2){
                $('#warehouse').show(400);
                $('#biller').show(400);
                $('select[name="warehouse_id"]').prop('required',true);
                $('select[name="biller_id"]').prop('required',true);
            }
            else{
                $('#warehouse').hide(400);
                $('#biller').hide(400);
                $('select[name="warehouse_id"]').prop('required',false);
                $('select[name="biller_id"]').prop('required',false);
            }
        });
    </script>
@endsection