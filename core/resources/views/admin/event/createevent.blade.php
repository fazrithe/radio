@extends('admin.layouts.app')

@section('panel')

    <div class="row mb-none-30 justify-content-center">

        <div class="col-lg-12 pl-lg-5">
            <div class="card b-radius--10 overflow-hidden box--shadow1">
                <div class="card-body p-0">
                    <div class="p-3 bg--white">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-4">

                                    <div class="form-group mt-3">
                                        <div class="image-upload">
                                            <div class="thumb">
                                                <div class="avatar-preview">
                                                    <div class="profilePicPreview">
                                                        <button type="button" class="remove-image"><i
                                                                class="fa fa-times"></i></button>
                                                    </div>
                                                </div>
                                                <div class="avatar-edit">
                                                    <input type="file" class="profilePicUpload" name="image"
                                                        id="profilePicUpload1" accept=".png, .jpg, .jpeg" required>
                                                    <label for="profilePicUpload1" class="bg--primary">@lang('Upload Program
                                                        Images')</label>
                                                    <small class="mt-2 text-facebook">@lang('Supported files'): <b>jpeg,
                                                            jpg</b>.
                                                        @lang('Image will be resized into')
                                                        {{ imagePath()['program']['size'] }}px
                                                    </small>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="">@lang('Radio Jockey')</label>
                                            <select name="jockey_id" id="jockey" class="form-control" required>
                                                <option value="">@lang('Select Radio jockey')</option>
                                                @foreach ($jockeys as $jockey)
                                                    <option value="{{ $jockey->id }}">
                                                        {{ $jockey->full_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="">@lang('Event Name')</label>
                                            <input type="text" name="event_name" class="form-control"
                                                placeholder="@lang('Event Name"') value="{{ old('event_name') }}" required>
                                                </div>

                                                <div class="form-group col-md-12">
                                                        <label for="">@lang(' Event Week Name')</label>
                                                    <select name="week_name" id="" class="form-control">
                                                        <option value="saturday">@lang('Saturday')</option>
                                                        <option value="sunday">@lang('Sunday')</option>
                                                        <option value="monday">@lang('Monday')</option>
                                                        <option value="tuesday">@lang('Tuesday')</option>
                                                        <option value="wednesday">@lang('Wednesday')</option>
                                                        <option value="thursday">@lang('Thursday')</option>
                                                        <option value="friday">@lang('Friday')</option>
                                                    </select>
                                            

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">@lang('Event Start Time')</label>
                                            <input type="text" name="start_time" id="" class="form-control timepicker"
                                                value="{{ old('start_time') }}" autocomplete="off"
                                                placeholder="@lang('Event Start Time')" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">@lang('Event End Time')</label>
                                            <input type="text" name="end_time" class="form-control timepicker"
                                                value="{{ old('end_time') }}" autocomplete="off"
                                                placeholder="@lang('Event End Time')" required>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <input type="submit" class="form-control btn btn--primary" value="Create Event">
                            </div>


                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('style-lib')


    <link rel="stylesheet" href="{{ asset('assets/admin/css/vendor/timepicker.min.css') }}">


@endpush

@push('script')
    <script src="{{ asset('assets/admin/js/vendor/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/admin/js/vendor/timepicker.min.js') }}"></script>
    <script>
        'use strict'
        $('.datepicker-here').datepicker();
        $('.timepicker').timepicker({
            timeFormat: 'h:mm p',
            dropdown: true,
            scrollbar: true
        });

    </script>
@endpush


@push('style')

    <style>
        span {
            font-size: 0.75rem;
            color: black;
        }

    </style>

@endpush
