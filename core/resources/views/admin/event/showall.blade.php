@extends('admin.layouts.app')

@section('panel')


    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('Jockey')</th>
                                    <th scope="col">@lang('Event name')</th>
                                    <th scope="col">@lang('Event Day')</th>
                                    <th scope="col">@lang('Start Time')</th>
                                    <th scope="col">@lang('End Time')</th>
                                    <th scope="col">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($events as $event)
                                    <tr>

                                        <td data-label="@lang('User')">
                                            <div class="user">
                                                <div class="thumb"><img
                                                        src="{{ getImage('assets/images/rj_image/' . $event->jockey->image) }}"
                                                        alt="@lang('image')"></div>
                                                <a class="joc"
                                                    href="{{ route('admin.radio.jockey.details', $event->jockey->id) }}">
                                                    <span class="name">{{ $event->jockey->full_name }}</span>
                                                </a>
                                            </div>
                                        </td>

                                        <td data-label="@lang('Event_name')">{{ __($event->event_name) }}</td>
                                        <td data-label="@lang('Event Day')">{{ __($event->week_name) }}</td>

                                        <td data-label="@lang('Start_time')">{{ \Carbon\Carbon::parse($event->start_time)->format('H:i a') }}</td>
                                        <td data-label="@lang('End_time')">{{ \Carbon\Carbon::parse($event->end_time)->format('H:i a') }}</td>
                                        <td data-label="@lang('Action')">

                                            <a href="{{ route('admin.event.details', $event->id) }}" class="icon-btn mr-1"
                                                data-toggle="tooltip" title="Details" data-original-title="Details">
                                                <i class="las la-desktop text--shadow"></i>
                                            </a>


                                            <a href="javascript:void(0)" class="icon-btn btn--danger delete" data-toggle="tooltip"
                                            title="Delete" data-original-title="Delete" data-event="{{$event->id}}" data-url="{{route('admin.event.delete',$event->id)}}">
                                                <i class="las la-trash"></i></i>
                                            </a>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ __($empty_message) }}</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table><!-- table end -->
                    </div>
                </div>
                <div class="card-footer py-4">
                    {{ $events->links('admin.partials.paginate') }}
                </div>
            </div><!-- card end -->
        </div>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Delete Events')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form  method="POST">
                    <div class="modal-body">
                        <div class="container-fluid">
                            @csrf
                            <input type="hidden" class="form-control" id="event" value="" name="event">
                            <p class="text--danger font-weight-bold">@lang('Are you sure to delete this Event') ?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--danger">@lang('Delete Event') </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection



@push('breadcrumb-plugins')
<a href="{{route('admin.event.create')}}" class="btn btn--primary float-sm-right ml-4">@lang('Create Events')</a>
    <form action="{{ route('admin.event.search',request('search'))}}" method="GET" class="form-inline float-sm-right bg--white">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="@lang('Event name')"
                value="{{ $search ?? '' }}">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>

@endpush


@push('style')

    <style>
        .name {
            color: blue;
        }

    </style>

@endpush


@push('script')

    <script>
        'use strict'

        $('.delete').on('click',function(){
            var modal = $('#deleteModal');
            var event_id = $(this).data('event');
            modal.find('input[name=event]').val(event_id);
            modal.find('form').attr('action',$(this).data('url'));
            modal.modal('show');
        })



    </script>

@endpush
