@extends($activeTemplate.'layouts.frontend')
@section('content')
    @php
    $banners = getContent('banner.element');
    @endphp
    <!-- hero section start -->
    <section class="hero">
        <div class="hero-slider">
            @foreach ($banners as $item)
                <div class="single-slide bg_img"
                    style="background-image: url({{ sectionImage('banner', $item->data_values->background_image) }});">
                    <div class="container">
                        <div class="row {{ $loop->even ? 'justify-content-end' : '' }}">
                            <div class="col-lg-4 {{ $loop->even ? 'text-end' : '' }}">
                                <h2 class="hero__title" data-animation="fadeInUp" data-delay=".6s">
                                    {{ __($item->data_values->title) }}</h2>
                            </div>
                        </div>
                    </div>
                </div><!-- single-slide end -->
            @endforeach

        </div>
    </section>
    <!-- hero section end -->


    <!-- poll box start -->
    <button type="button" class="poll-open-btn bg--base">@lang('Vote')</button>
    <div class="poll-box">
        <button type="button" class="poll-close-btn bg--base"><i class="las la-times"></i></button>
        <div class="poll-box__header">
            <h5 class="title">{{ __(@$polls->question) }}</h5>
        </div>
        <form action="{{ route('poll',$polls??0) }}" method="post">
            @csrf
            <div class="poll-box__body">
                @php
                    $total = @$polls->pollLogs ? $polls->pollLogs->count() : 0;
                    $choice = $polls ? $polls->choice : [];
                    $pollsLog = $polls ? @$polls->pollLogs->where('ip',request()->ip())->first()->result : null;

                @endphp

                @foreach ($choice as $key => $poll)
                    @php
                        $count = $polls->pollLogs->where('result',$poll)->count();

                        if ($count == 0) {
                            $percent = 0;
                        }else{
                            $percent = ($count / $total) * 100;
                        }
                    @endphp
                    <div class="progress poll--progess mb-2">
                        <span class="poll-percentage">{{$percent.'%'}}</span>
                        <div class="form-check custom-radio">
                            <input class="form-check-input" type="radio" name="radioPoll" id="pollYes-{{$loop->iteration}}"
                                value="{{ $key }}">
                            <label class="form-check-label" for="pollYes-{{$loop->iteration}}">
                                {{ $poll }}
                            </label>
                        </div>
                        <div class="progress-bar" role="progressbar" style="width: {{$percent}}%" aria-valuenow="{{$percent}}" aria-valuemin="0"
                            aria-valuemax="100"></div>
                    </div>
                @endforeach



                <p>@lang('You Voted : '){{@$pollsLog}}</p>
            </div>
            <div class="poll-box__footer text-end">
                <input type="submit" value="Vote" class="btn btn-sm btn--base px-4">
            </div>
        </form>
    </div>
    <!-- poll box end -->

    @if ($sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @include($activeTemplate.'sections.'.$sec)
        @endforeach
    @endif
@endsection


@push('style')
    <style>
        /* poll box  css start */
        .poll-box {
            background-color: #0b2740;
            border-radius: 8px;
            -webkit-border-radius: 8px;
            -moz-border-radius: 8px;
            -ms-border-radius: 8px;
            -o-border-radius: 8px;
            position: fixed;
            bottom: 30px;
            left: -450px;
            width: 420px !important;
            z-index: 99;
            border: 1px solid rgba(232, 69, 69, 0.45);
            -webkit-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
        }

        @media (max-width: 480px) {
            .poll-box {
                width: 300px !important;
            }
        }

        .poll-box.active {
            left: 0;
        }

        .poll-box .poll-close-btn {
            position: absolute;
            top: -15px;
            right: -15px;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 35px;
            height: 35px;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
        }

        .poll-box__header {
            padding: 1.25rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.15);
        }

        .poll-box__header .title::before {
            content: '- ';
        }

        .poll-box__body {
            padding: 20px;
        }

        .poll-box .poll--progess {
            height: 35px;
            position: relative;
            background-color: #0f375a;
        }

        .poll-box .poll--progess .form-check {
            position: absolute;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
            left: 15px;
        }

        .poll-box .poll--progess .poll-percentage {
            position: absolute;
            top: 50%;
            right: 10px;
            font-size: 14px;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .poll-box .poll--progess .progress-bar {
            background-color: #134470;
        }

        .poll-box__footer {
            padding: 20px;
        }

        .poll-open-btn {
            position: fixed;
            left: 0;
            bottom: 20%;
            z-index: 9;
            color: #fff;
            border-radius: 0 999px 999px 0;
            -webkit-border-radius: 0 999px 999px 0;
            -moz-border-radius: 0 999px 999px 0;
            -ms-border-radius: 0 999px 999px 0;
            -o-border-radius: 0 999px 999px 0;
            padding: 6px 25px;
            box-shadow: 5px 0 5px rgba(232, 69, 69, 0.45);
        }

        .custom-radio {
            position: relative;
            padding-left: 0;
        }

        .custom-radio input[type=radio] {
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
            visibility: hidden;
            cursor: pointer;
        }

        .custom-radio input[type=radio]:checked~label::before {
            border-width: 2px;
            border-color: #e84545;
        }

        .custom-radio input[type=radio]:checked~label::after {
            opacity: 1;
        }

        .custom-radio label {
            margin-bottom: 0;
            position: relative;
            padding-left: 20px;
            font-size: 0.9375rem;
        }

        .custom-radio label::before {
            position: absolute;
            content: '';
            top: 6px;
            left: 0;
            width: 15px;
            height: 15px;
            border: 1px solid #888888;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
            -webkit-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
        }

        .custom-radio label::after {
            position: absolute;
            content: '';
            top: 10px;
            left: 4px;
            width: 7px;
            height: 7px;
            background-color: #e84545;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            -ms-border-radius: 50%;
            -o-border-radius: 50%;
            opacity: 0;
            -webkit-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
        }

        .custom-radio.style--two label::before {
            top: 5px;
        }

        .custom-radio.style--two label::after {
            top: 9px;
        }

    </style>
@endpush

@push('script')
    <script>
        'use strict'
        $('.poll-open-btn').on('click', function() {
            $('.poll-box').addClass('active');
        });
        $('.poll-close-btn').on('click', function() {
            $('.poll-box').removeClass('active');
        });

    </script>
@endpush
