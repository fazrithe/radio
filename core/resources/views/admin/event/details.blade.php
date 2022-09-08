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
                                                <div class="avatar-edit">
                                                    <input type="file" class="profilePicUpload" name="image"
                                                        id="profilePicUpload1" accept=".png, .jpg, .jpeg">
                                                    <label for="profilePicUpload1" class="bg--primary">@lang('Update Program
                                                        Images')</label>
                                                    <small class="mt-2 text-facebook">@lang('Supported files'): <b>@lang('jpeg,
                                                            jpg')</b>.
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
                                            <select name="radio_jockey_id" id="" class="form-control">
                                                @foreach ($jockeys as $jockey)
                                                    <option value="{{ $jockey->id }}"
                                                        {{ $jockey->id == $event->radio_jockey_id ? 'selected' : '' }}>
                                                        {{ $jockey->email }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label for="">@lang('Event Name')</label>
                                            <input type="text" name="event_name" value="{{ $event->event_name }}"
                                                class="form-control">
                                        </div>

                                           <div class="form-group col-md-12">
                                                        <label for="">@lang(' Event Week Name')</label>
                                                    <select name="week_name" id="" class="form-control">
                                                        <option value="saturday" {{$event->week_name == 'saturday' ? 'selected':''}}>@lang('Saturday')</option>
                                                        <option value="sunday" {{$event->week_name == 'sunday' ? 'selected':''}}>@lang('Sunday')</option>
                                                        <option value="monday" {{$event->week_name == 'monday' ? 'selected':''}}>@lang('Monday')</option>
                                                        <option value="tuesday" {{$event->week_name == 'tuesday' ? 'selected':''}}>@lang('Tuesday')</option>
                                                        <option value="wednesday" {{$event->week_name == 'wednesday' ? 'selected':''}}>@lang('Wednesday')</option>
                                                        <option value="thursday" {{$event->week_name == 'thursday' ? 'selected':''}}>@lang('Thursday')</option>
                                                        <option value="friday" {{$event->week_name == 'friday' ? 'selected':''}}>@lang('Friday')</option>
                                                    </select>
                                            

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">@lang('Event Start Time')</label>
                                            <input type="text" name="start_time"
                                                value="{{ \Carbon\Carbon::parse($event->start_time)->format('h:i a') }}"
                                                class="form-control timepicker">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for="">@lang('Event End Time')</label>
                                            <input type="text" name="end_time"
                                                value="{{ \Carbon\Carbon::parse($event->end_time)->format('h:i a') }}"
                                                class="form-control timepicker">
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

@push('breadcrumb-plugins')
    <a href="{{ route('admin.event.all') }}" class="btn btn--primary">@lang('Back') <i class="las la-reply"></i></a>
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

    </script>
@endpush


@push('style')

    <style>
        .profilePicPreview {
            background-image: url("{{ getImage('assets/images/program/' . $event->image) }}");
            background-position: center;
        }

    </style>

@endpush
