@extends('admin.layouts.app')

@section('panel')


    <div class="row mb-30">
        <div class="col-xl-12 col-lg-12 col-md-12 mb-30">
            <div class="card b-radius--10 overflow-hidden box--shadow1">
                <div class="card-body p-0">
                    <div class="p-3 bg--white">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="image-upload">
                                            <div class="thumb">
                                                <div class="avatar-preview">
                                                    <div class="profilePicPreview">
                                                        <button type="button" class="remove-image"><i
                                                                class="fa fa-times"></i></button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="">@lang('Radio Jockey')</label>
                                            <input type="text" value="{{ $archive->jockey_name }}" class="form-control"
                                                readonly>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="">@lang('Event Name')</label>
                                            <input type="text" name="event_name" value="{{ $archive->event_name }}"
                                                class="form-control" readonly>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="">@lang(' Event Week Name')</label>

                                            <input type="text" name="week_name" value="{{ $archive->week_name }}"
                                                class="form-control" readonly>

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">@lang('Event Start Time')</label>
                                            <input type="text" name="start_time"
                                                value="{{ \Carbon\Carbon::parse($archive->start_time)->format('H:i a') }}"
                                                class="form-control" readonly>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">@lang('Event End Time')</label>
                                            <input type="text" name="end_time"
                                                value="{{ \Carbon\Carbon::parse($archive->end_time)->format('H:i a') }}"
                                                class="form-control" readonly>
                                        </div>

                                        <div class="col-12 d-flex flex-wrap mb-4">
                                            <h6 class="w-100 mb-3">@lang('Please upload a radio file / Or a link')</h6>
                                            <div class="form-group d-flex mr-4">
                                                <input type="radio" name="same" id="checkbox1" class="url"
                                                    {{ $archive->url != null ? 'checked' : '' }}>
                                                <label for="checkbox1" class="d-block align-self-center m-0">@lang('Radio
                                                    Url')</label>
                                            </div>
                                            <div class="form-group d-flex">
                                                <input type="radio" name="same" id="checkbox2" class="url"
                                                    {{ $archive->input_file != null ? 'checked' : '' }}>
                                                <label for="checkbox2" class="d-block align-self-center m-0">@lang('Radio
                                                    File')</label>
                                            </div>

                                            <div class="w-100 input_url {{ $archive->url != null ? 'd-block' : 'd-none' }}">
                                                @if($archive->url != null)
                                                <input type="text" name="url" class="form-control" placeholder="@lang('Input Radio Url')" value="{{$archive->url}}">
                                                @endif
                                            </div>

                                            <div class="w-100 input_file {{ $archive->input_file != null ? 'd-block' : 'd-none' }}">
                                               
                                                <input type="file" class="form-control form--control mb-3" name="audio"
                                                    value="{{ $archive->input_file }}">

                                                @if ($archive->input_file != null)
                                                    <audio controls>
                                                        <source src="{{asset('assets/event_audio/'.$archive->input_file)}}">
                                                    </audio>
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Update Event" class="form-control btn btn--primary">
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection

@push('style')
    <style>
        input.url {
            height: 25px !important;
            width: 30px !important;
            margin-right: 15px !important;
        }

    </style>
@endpush

@push('breadcrumb-plugins')
    <a href="{{ route('admin.event.archive') }}" class="btn btn--primary">@lang('Back') <i class="las la-reply"></i></a>
@endpush
@push('style-lib')


    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/timepicker.min.css') }}">


@endpush

@push('script')
    <script src="{{ asset('assets/admin/js/vendor/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/timepicker.min.js') }}"></script>
    <script>
        'use strict '
        $('.timepicker').timepicker({
            timeFormat: 'h:mm p',
            dropdown: true,
            scrollbar: true
        });
        var value = "{{ $archive->url }}";
        var input = `<input type="text" name="url" class="form-control" placeholder="@lang('Input Radio Url')" value=${value}>`;
        var file = `  <input type="file" class="form-control form--control" name="audio">`;

        $('#checkbox1').on('click', function() {
            $('.input_url').html(input)
            $('.input_file').children().remove();
            $('.input_url').removeClass('d-none');
        })
        $('#checkbox2').on('click', function() {
            $('.input_file').html(file)
            $('.input_url input').remove();
            $('.input_file').removeClass('d-none');

        })

    </script>
@endpush


@push('style')

    <style>
        .profilePicPreview {
            background-image: url("{{ getImage('assets/images/program/' . $archive->image) }}");
            background-position: center;
        }

    </style>

@endpush
