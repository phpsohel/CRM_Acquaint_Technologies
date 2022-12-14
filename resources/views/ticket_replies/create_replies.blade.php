@extends('layout.main') @section('content')
    @if($errors->has('name'))
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ $errors->first('name') }}</div>
    @endif
    @if($errors->has('image'))
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ $errors->first('image') }}</div>
    @endif
    @if($errors->has('email'))
        <div class="alert alert-danger alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ $errors->first('email') }}</div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{!! session()->get('message') !!}</div>
    @endif
    @if(session()->has('not_permitted'))
        <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
    @endif
    <style>
        .badge.badge-primary {
            background-color: #0da9ef;
        }
        .with-badge .badge {
            position: absolute;
            top: 50%;
            right: 1.15rem;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }
        .list-group-item i {
            margin-top: -4px;
            margin-right: 8px;
            font-size: 1.1em;
        }
        .comment {
            display: block;
            position: relative;
            margin-bottom: 30px;
            padding-left: 66px
        }

        .comment .comment-author-ava {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 50px;
            border-radius: 50%;
            overflow: hidden
        }

        .comment .comment-author-ava>img {
            display: block;
            width: 100%
        }

        .comment .comment-body {
            position: relative;
            padding: 24px;
            border: 1px solid #e1e7ec;
            border-radius: 7px;
            background-color: #fff
        }

        .comment .comment-body::after,
        .comment .comment-body::before {
            position: absolute;
            top: 12px;
            right: 100%;
            width: 0;
            height: 0;
            border: solid transparent;
            content: '';
            pointer-events: none
        }

        .comment .comment-body::after {
            border-width: 9px;
            border-color: transparent;
            border-right-color: #fff
        }

        .comment .comment-body::before {
            margin-top: -1px;
            border-width: 10px;
            border-color: transparent;
            border-right-color: #e1e7ec
        }

        .comment .comment-title {
            margin-bottom: 8px;
            color: #606975;
            font-size: 14px;
            font-weight: 500
        }

        .comment .comment-text {
            margin-bottom: 12px
        }

        .comment .comment-footer {
            display: table;
            width: 100%
        }

        .comment .comment-footer>.column {
            display: table-cell;
            vertical-align: middle
        }

        .comment .comment-footer>.column:last-child {
            text-align: right
        }

        .comment .comment-meta {
            color: #9da9b9;
            font-size: 13px
        }

        .comment .reply-link {
            transition: color .3s;
            color: #606975;
            font-size: 14px;
            font-weight: 500;
            letter-spacing: .07em;
            text-transform: uppercase;
            text-decoration: none
        }

        .comment .reply-link>i {
            display: inline-block;
            margin-top: -3px;
            margin-right: 4px;
            vertical-align: middle
        }

        .comment .reply-link:hover {
            color: #0da9ef
        }

        .comment.comment-reply {
            margin-top: 30px;
            margin-bottom: 0
        }

        @media (max-width: 576px) {
            .comment {
                padding-left: 0
            }
            .comment .comment-author-ava {
                display: none
            }
            .comment .comment-body {
                padding: 15px
            }
            .comment .comment-body::before,
            .comment .comment-body::after {
                display: none
            }
        }
    </style>

    <div class="container padding-bottom-3x mb-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                <div class="table-responsive margin-bottom-2x">
                    <table class="table margin-bottom-none">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Project</th>
                            <th>Subject</th>
                            <th style="width: 40%">Description</th>
                            <th>Attachment</th>
                            <th>Priority</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                         <td>{{date($general_setting->date_format, strtotime($lims_ticket_list->created_at->toDateString())) }}</td>
                            <td>{{$lims_ticket_list->project->project_name}}</td>
                            <td>{{$lims_ticket_list->subject}}</td>
                            <td> {!! $lims_ticket_list->description !!}</td>
                            <td><a target="_blank"  href="{{ URL::to('/')."/public/ticket/attachment/".$lims_ticket_list->attachment}}">{{$lims_ticket_list->attachment}} </a></td>
                            @if($lims_ticket_list->priority == 1 )
                            <td><strong>High</strong></td>
                                @else
                                <td><strong>Low</strong></td>
                                @endif
                        </tr>
                        </tbody>
                        {{--ticket_repliesDownload--}}
                    </table>
                </div>
                <!-- Messages-->
                @foreach($lims_ticket_replies_list as $ticket_reply)
                <div class="comment">
                    <div class="comment-author-ava"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Avatar"></div>
                    <div class="comment-body">
                        <div class="comment-footer"><span class="comment-meta">Date:{{ date($general_setting->date_format, strtotime($ticket_reply->created_at->toDateString())) .' '. $ticket_reply->created_at->toTimeString() }}</span></div>
                        <p class="comment-text">{{$ticket_reply->description}}</p>
                        @if($ticket_reply->attachment)
                            <div class="comment-footer"><span class="comment-meta"> Attachment  :  </span>  <a target="_blank"  href="{{ URL::to('/')."/public/ticket/attachment/".$ticket_reply->attachment}}">{{$ticket_reply->attachment}}</a></div>
                       @endif
                        <div class="comment-footer"><span class="comment-meta">{{Auth::user()->name}}</span></div>
                    </div>
                </div>
                @endforeach


                <!-- Reply Form-->
                <h5 class="mb-30 padding-top-1x">Leave Message</h5>
                {!! Form::open(['route' => 'ticket_replies.store', 'method' => 'post', 'files' => true]) !!}
                    <div class="form-group">
                        <textarea class="form-control form-control-rounded" name="description" id="review_text" rows="8" placeholder="Write your message here..." required=""></textarea>
                    </div>

                    <div class="form-group">
                    <label>Attachment </label>
                    <input type="file" name="attachment"  class="form-control">
                   </div>
                    <div class="form-group">
                        <input type="hidden" name="ticket_id" value="{{$lims_ticket_list->id}}">
                        <input type="hidden" name="employee_id" value="{{$lims_employee_list->id}}">
                    </div>
                    <div class="text-right">
                        <button class="btn btn-outline-primary" type="submit">Submit Message</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection