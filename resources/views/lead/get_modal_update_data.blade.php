<div id="editModal_{{ $lead->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">Update Lead</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="dripicons-cross"></i></span></button>
            </div>
            <div class="modal-body">
                <p class="italic"><small>{{trans('file.The field labels marked with * are required input fields')}}.</small></p>
                {!! Form::open(['route' => ['lead.update', $lead->id], 'method' => 'put', 'files' => true]) !!}
                <div class="row">
                    <div class="col-md-6">


                        <div class="form-group">
                            <label>Company *</label>
                            <input type="text" name="company" value="{{ $lead->company ?? '' }}"  required class="form-control company" >
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="lead_id" />
                            <label> Name *</strong> </label>
                            <input type="text" name="name" value="{{ $lead->name ?? '' }}" required class="form-control name">
                        </div>

                        <div class="form-group">
                            <label>Email </label>
                            <input type="email" name="email" value="{{ $lead->email ?? '' }}"   class="form-control email" >
                        </div>
                        <div class="form-group">
                            <label>Phone Number *</label>
                            <input type="text" name="phone_number" value="{{ $lead->phone_number ?? '' }}"  required class="form-control phone_number" >
                        </div>
                        <div class="form-group">
                            <label> Address *</strong> </label>
                            <input type="text" name="address" value="{{ $lead->address ?? '' }}" required class="form-control address">
                        </div>



                        <div class="form-group">
                            <label>Employee </label>
                            <select  name="employee_id" class="form-control" >
                                @foreach($lims_employee_list as $employee)
                                    <option selected value="{{$employee->id}}" {{ $lead->employee_id == $employee->id ? "Selected" : '' }}>{{$employee->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Date </label>
                            <input type="date" name="date" value="{{ $lead->date ?? '' }}"  class="form-control" >
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" value="{{ $lead->description ?? '' }}" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Designation </label>
                            <input type="text" name="designation" value="{{ $lead->designation ?? '' }}" class="form-control" >
                        </div>


                        <div class="form-group">
                            <label>Another Email </label>
                            <input type="email" name="another_email" value="{{ $lead->another_email ?? '' }}"   class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Another Phone Number </label>
                            <input type="text" name="another_phone_no" value="{{ $lead->another_phone_no ?? '' }}"   class="form-control" >
                        </div>
                        <div class="form-group">
                            <label>Lead Category </label>

                            <select  name="lead_category_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Lead Category...">
                                @foreach($lims_lead_category_list as $lead_category)
                                    <option selected value="{{$lead_category->id}}" {{ $lead->lead_category_id == $lead_category->id ? "Selected" : '' }}>{{$lead_category->lead_cat_name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label>Lead Status </label>
                            <select  name="lead_status_id" class="form-control" data-live-search="true" data-live-search-style="begins" title="Select Lead Status...">
                                @foreach($lims_lead_status_list as $lead_status)
                                    <option selected value="{{$lead_status->id}}">{{$lead_status->status_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Lead Source </label>
                            <select  name="lead_source_id" class="form-control" data-live-search="true" data-live-search-style="" title="Select Lead Source...">
                                @foreach($lims_lead_source_list as $lead_source)
                                    <option selected value="{{$lead_source->id}}">{{$lead_source->source_name}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="form-group">
                            <label>Stage *</label>
                            <select  name="stage" class="form-control selectpicker"  required="true">
                                <option value=""> Please select one</option>
                                <option value="1">Unapproved</option>
                                <option value="2">Approved</option>
                                <option value="3">Pending</option>
                            </select>
                            
                        </div>

                    </div>


                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">{{trans('file.submit')}}</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>