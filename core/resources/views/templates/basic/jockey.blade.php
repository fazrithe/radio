@extends($activeTemplate.'layouts.frontend')

@section('content')
@php
    $bread = getContent('breadcrumb.content',true);
    $radio = getContent('radio_jockey.content',true)->data_values;
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

<!-- rj section start -->
    <section class="pt-100 pb-100 bg_img overlay--two" style="background-image: url({{sectionImage('radio_jockey',$radio->background_image)}});">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <div class="section-header text-center">
              <h2 class="section-title text-uppercase">{{__($radio->title)}}</h2>
              <div class="equalizer">
                <span class="equalizer-item equalizer-1"></span>
                <span class="equalizer-item equalizer-2"></span>
                <span class="equalizer-item equalizer-3"></span>
                <span class="equalizer-item equalizer-4"></span>
                <span class="equalizer-item equalizer-5"></span>				
                <span class="equalizer-item equalizer-6"></span>
              </div>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row justify-content-center gy-4">
          
          @foreach ($jockeys as $jockey)    
          <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="rj-single">
              <div class="thumb">
                <img src="{{asset(getImage('assets/images/rj_image/'.$jockey->image),'600x600')}}" alt="@lang('image')">
                <div class="overlay-content">
                  <h4><a href="{{route('jockey.details',$jockey->id)}}">{{__($jockey->fullname)}}</a></h4>
                  <span class="designation mt-1">{{__($jockey->designation)}}</span>
                </div>
                <ul class="social-links">
                  @foreach ($jockey->socials as $social)
                  <li><a href="{{$social->url}}">@php echo $social->icon; @endphp</a></li>
                  @endforeach
                 
                </ul>
              </div>
            </div>
          </div>
          @endforeach

          {{ $jockeys->links('admin.partials.paginate') }}
        
        </div>
      </div>
    </section>
    <!-- rj section end -->

@endsection