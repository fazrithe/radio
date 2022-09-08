@extends($activeTemplate.'layouts.frontend')

@section('content')

    @php
    $bread = getContent('breadcrumb.content', true);
    @endphp

    <!-- inner hero section start -->
    <section class="inner-hero bg_img"
        style="background-image: url({{ sectionImage('breadcrumb', $bread->data_values->background_image) }}) ;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h2 class="page-title text-center">{{ __($page_title) }}</h2>
                    <ul class="page-breadcrumb justify-content-center">
                        <li><a href="{{ route('home') }}">@lang('Home')</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- inner hero section end -->


    <section class="pt-100 pb-100 bg_img overlay--one">
        <div class="container">
            <div class="row gy-4">
                <div class="col-md-12">
                    <p class="text-white"> @php echo __($policy->description) @endphp </p>
                </div>
            </div>
        </div>
    </section>

@endsection
