@extends('admin.layouts.app')

@section('panel')
@if ($general->sys_version)
<div class="row">
    <div class="col-md-12">

        <div class="card text-white bg-warning mb-3">
            <div class="card-header">
                <h3 class="card-title"> @lang('New Version Available') <button
                    class="btn btn--dark float-right">@lang('Version')
                    {{ json_decode($general->sys_version)->version }}</button> </h3>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-dark">@lang('What is the Update ?')</h5>
                    <p>
                        <pre class="font-20">{{ @json_decode($general->sys_version)->details }}</pre>
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="row">
        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--gradi-44 b-radius--10 box-shadow">
                <div class="icon">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="numbers">
                        <span class="amount">{{ $admin_data['event'] }}</span>
                    </div>
                    <div class="desciption">
                        <span class="text--small">@lang('Total Events')</span>
                    </div>
                    <a href="{{ route('admin.event.all') }}"
                    class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--gradi-7 b-radius--10 box-shadow">
                <div class="icon">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="numbers">

                        <span class="amount">{{ $admin_data['radio_jockey'] }}</span>

                    </div>
                    <div class="desciption">
                        <span class="text--small">@lang('Total Jockey')</span>
                    </div>

                    <a href="{{ route('admin.radio.jockey') }}"
                    class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--gradi-7 b-radius--10 box-shadow">
                <div class="icon">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="numbers">

                        <span class="amount">{{ $admin_data['archive'] }}</span>

                    </div>
                    <div class="desciption">
                        <span class="text--small">@lang('Total Archive Event')</span>
                    </div>

                    <a href="{{ route('admin.event.archive') }}"
                    class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->
        <div class="col-xl-3 col-lg-4 col-sm-6 mb-30">
            <div class="dashboard-w1 bg--gradi-2 b-radius--10 box-shadow">
                <div class="icon">
                    <i class="fa fa-globe"></i>
                </div>
                <div class="details">
                    <div class="numbers">

                        <span class="amount">{{ $admin_data['archive_url'] }}</span>

                    </div>
                    <div class="desciption">
                        <span class="text--small">@lang('Pending Archive url')</span>
                    </div>

                    <a href="{{ route('admin.archive.event.no_url') }}"
                    class="btn btn-sm text--small bg--white text--black box--shadow3 mt-3">@lang('View All')</a>
                </div>
            </div>
        </div><!-- dashboard-w1 end -->


    </div><!-- row end-->


    <div class="row mb-none-30 mt-5">
        <div class="col-xl-12 col-lg-12 mb-30">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h5 class="card-title">@lang('Events')</h5>
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

                                    <td data-label="User">
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

                                    <td data-label="Event name">{{ $event->event_name }}</td>
                                    <td data-label="Event Date">{{ $event->week_name }}</td>

                                    <td data-label="Start Time">
                                        {{ \Carbon\Carbon::parse($event->start_time)->format('H:i a') }}</td>
                                        <td data-label="End Time">
                                            {{ \Carbon\Carbon::parse($event->end_time)->format('H:i a') }}</td>
                                            <td data-label="Action">

                                                <a href="{{ route('admin.event.details', $event->id) }}" class="icon-btn mr-1"
                                                    data-toggle="tooltip" title="Details" data-original-title="Details">
                                                    <i class="las la-desktop text--shadow"></i>
                                                </a>


                                                <a href="javascript:void(0)" class="icon-btn btn--danger delete"
                                                data-toggle="tooltip" title="Delete" data-original-title="Delete"
                                                data-event="{{ $event->id }}">
                                                <i class="las la-trash"></i></i>
                                            </a>

                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td class="text-muted text-center" colspan="100%">{{ $empty_message }}</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                            </table><!-- table end -->
                        </div>
                    </div>

                </div>
            </div>


            <div class="col-xl-12 col-lg-12 mb-30">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">@lang('Radio Jockey')</h5>
                        <div class="table-responsive--md  table-responsive">
                            <table class="table table--light style--two">
                                <thead>
                                    <tr>
                                        <th scope="col">@lang('Jockey')</th>
                                        <th scope="col">@lang('Email')</th>
                                        <th scope="col">@lang('Phone')</th>
                                        <th scope="col">@lang('Joined At')</th>
                                        <th scope="col">@lang('Action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($jockeys as $user)
                                    <tr>
                                        <td data-label="@lang('User')">
                                            <div class="user">
                                                <div class="thumb"><img
                                                    src="{{ getImage('assets/images/rj_image/' . $user->image) }}"
                                                    alt="image"></div>
                                                    <span class="@lang('name')">{{ $user->full_name }}</span>
                                                </div>
                                            </td>

                                            <td data-label="@lang('Email')">{{ $user->email }}</td>

                                            <td data-label="@lang('Phone')">{{ $user->phone }}</td>
                                            <td data-label="@lang('Joined At')">{{ showDateTime($user->created_at) }}</td>
                                            <td data-label="@lang('Action')">
                                                <a href="{{ route('admin.radio.jockey.details', $user->id) }}" class="icon-btn"
                                                    data-toggle="tooltip" title="" data-original-title="Details">
                                                    <i class="las la-desktop text--shadow"></i>
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

                    </div>
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
                        <form action="{{ route('admin.event.all') }}" method="POST">
                            <div class="modal-body">
                                <div class="container-fluid">
                                    @csrf
                                    @method('DELETE')
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

            <div class="modal fade" tabindex="-1" role="dialog" id="cronModal">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">@lang('Cron Job Setting Instruction')</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h4 class="text-danger text-center">@lang('Please Set The Cron Job')</h4>
                            <p class="cron mb-2 text-justify">@lang('To Automate the events archived we need to set the cron job. Set The cron time as minimum as possible. Once per 5-10 minutes is ideal.')</p>
                            <div class="input-group mb-3">
                                <label for="" class="w-100 font-weight-bold">@lang('Cron Command')</label>
                                <input type="text" class="form-control form-control-lg copyinput" value="{{'curl -s '. route('cron') }}" readonly>
                                <div class="input-group-append">
                                    <button class="btn btn--primary copy" type="button"><i class="la la-copy"></i></button>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn--secondary" data-dismiss="modal">@lang('Close')</button>
                        </div>
                    </div>
                </div>
            </div>

            @endsection

            @push('style')

            <style>
                .name {
                    color: blue;
                }
                .cron{
                    font-size: 20px;
                }

            </style>

            @endpush
            @push('breadcrumb-plugins')
            <h6 class="text--info">
                @if($general->last_cron == null)
                @lang('Cron Not Set Up Yet')
                @else
                @lang('Last Cron Run '){{\Carbon\Carbon::parse($general->last_cron)->diffForHumans()}}

                @endif
            </h6>
            @endpush

            @push('script')

            <script>
                'use strict'

                @if((now()->diffInMinutes(\Carbon\Carbon::parse($general->last_cron)) > 15) || $general->last_cron == null))
                $(function() {
                    const modal = $('#cronModal');

                    modal.modal('show');
                })
                @endif

                var copyButton = document.querySelector('.copy');
                var copyInput = document.querySelector('.copyinput');
                copyButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    var text = copyInput.select();
                    document.execCommand('copy');
                });
                copyInput.addEventListener('click', function() {
                    this.select();
                });

                $('.delete').on('click', function() {
                    var modal = $('#deleteModal');
                    var event_id = $(this).data('event');
                    modal.find('input[name=event]').val(event_id);
                    modal.modal('show');
                })

                </script>

                @endpush
