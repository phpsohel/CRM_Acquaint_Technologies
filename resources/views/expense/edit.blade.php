@extends('layout.main') @section('content')
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('message') }}</div>
@endif
@if(session()->has('not_permitted'))
<div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif
<section>
    <div class="container-fluid card p-4">
        {!! Form::open(['route' => ['expenses.update',$item->id], 'method' => 'put']) !!}
        <div class="row">
            <div class="col-md-12 form-group">
                <input type="hidden" name="expense_id">
                <label>{{trans('file.reference')}}</label>
                <p id="reference">{{'er-' . date("Ymd") . '-'. date("his")}}</p>
            </div>
            <div class="col-md-6 form-group">
                <label>{{trans('file.Expense Category')}} <span class="text-danger">*</span> </label>
                <select name="expense_category_id" class="form-control" required title="Select Expense Category...">
                    @foreach($lims_expense_category_list as $expense_category)
                    <option value="{{$expense_category->id }}" {{ $expense_category->id == $item->expense_category_id ? "Selected":'' }}>{{ $expense_category->name ?? ''}}</option>
                    @endforeach
                </select>
            </div>
            <div class=" col-md-6 form-group">
                <label>{{trans('Employee Name')}} <span class="text-danger">*</span></label>

                <select name="user_id" class="selectpicker form-control" required data-live-search="true" data-live-search-style="begins" title="Select Employee...">
                    @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $item->user_id ? "Selected":'' }}>{{$user->name ?? ''}}</option>

                    @endforeach
                </select>

            </div>
            <div class="col-md-6 form-group">
                <label>{{trans('file.Amount')}} *</label>
                <input type="number" name="amount" value="{{ $item->amount ?? '' }}" step="any" required class="form-control">

            </div>
            <div class="col-md-6 form-group">
                <label> {{trans('file.Account')}}</label>
                <select class="form-control selectpicker" name="account_id">
                    @foreach($accounts as $account)
                    <option value="{{$account->id}}" {{ $account->id == $item->account_id ? "Selected": '' }}>{{ $account->name ?? ''}} [{{$account->account_no}}]</option>


                    @endforeach
                </select>
            </div>
            <div class="col-md-6 form-group">

                <label>{{trans('file.Note')}}</label>
                <textarea name="note" rows="3" class="form-control">{{ $item->note ?? '' }}</textarea>

            </div>
            <div class="col-md-6 form-group"></div>
            <div class="col-md-6 form-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</section>
@endsection

