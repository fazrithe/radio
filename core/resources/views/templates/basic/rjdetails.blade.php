@extends($activeTemplate.'layouts.frontend')

@section('content')
@php
    $bread = getContent('breadcrumb.content',true);
@endphp

    <!-- inner hero section start -->
    <section class="inner-hero bg_img" style="background-image: url({{sectionImage('breadcrumb',$bread->data_values->background_image)}});">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6">
            <h2 class="page-title text-center">{{__($page_title)}}</h2>
            <ul class="page-breadcrumb justify-content-center">
              <li><a href="{{route('home')}}">@lang('Home')</a></li>
            
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero section end --> 

    <!-- profile section start -->
    <section class="pt-100 pb-100 bg_img overlay--one" style="background-image: url({{sectionImage('breadcrumb',$bread->data_values->background_image)}});">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-lg-12">
            <div class="profile-wrapper">
              <div class="row align-items-end">
                <div class="col-lg-3 col-md-5">
                  <div class="thumb">
                    <img src="{{asset(getImage('assets/images/rj_image/'.$jockey->image),'600x600')}}" alt="@lang('image')">
                  </div>
                </div>
                <div class="col-lg-9 col-md-7 ps-md-4 mt-md-0 mt-4">
                  <div class="content">
                    <h2 class="rj-name">{{__($jockey->fullname)}}</h4>
                    <span>{{__($jockey->designation)}}</span>
                    <ul class="social-links-list mt-3">
                        @foreach ($jockey->socials as $social)    
                        <li><a href="{{$social->url}}" class="rounded-2">
                        
                        @php
                            echo $social->icon;
                        @endphp
                        
                        </a></li>
                        @endforeach
                      
                    </ul>
                  </div>
                </div>
              </div><!-- row end -->
              <div class="row mt-5">
                <div class="col-lg-12">
                  <h3>@lang('About') {{__($jockey->fullname)}}</h3>
                  <p class="mt-3">{{__($jockey->about)}}</p>
                  

                  <h3 class="mt-5 mb-3">@lang('Education Experience')</h3>
                  <div class="row gy-4">
                    <div class="col-lg-12">
                      <div class="resume-card">
                        <div class="icon">
                          <i class="las la-school"></i>
                        </div>
                        <div class="content">
                          <span class="resume-duration font-size--14px">{{$jockey->education->from_year .' To '. $jockey->education->to_year}}</span>
                          <h5 class="title">
                              {{__($jockey->education->name)}}
                           
                          </h5>
                          <p class="mt-3 font-size--14px">{{__($jockey->education->about_institution)}}</p>
                        </div>
                      </div><!-- resume-card end -->
                    </div>
                   
                  </div><!-- row end -->

                  <h3 class="mt-5 mb-3">@lang('Work Experience')</h3>
                  <div class="row gy-4">
                    @foreach ($jockey->experience as $exp)
                    <div class="col-lg-6">
                      <div class="resume-card">
                        <div class="icon">
                          <i class="las la-school"></i>
                        </div>
                        <div class="content">
                          <span class="resume-duration font-size--14px">{{$exp->from_year_ex .' To '. $exp->to_year_ex}}</span>
                          <h5 class="title">
                            {{__($exp->name)}}
                          </h5>
                          <p class="mt-3 font-size--14px">{{__($exp->responsibility)}}</p>
                        </div>
                      </div><!-- resume-card end -->
                    </div>
                    @endforeach
                    
                  </div><!-- row end -->
                </div>
              </div>
            </div>
          </div>
        </div><!-- row end -->
        <h3 class="mb-4">{{__($jockey->fullname . ' Gallary')}}</h3>
        <div class="row gy-4">
        @foreach ($jockey->gallary as $item)    
        <div class="col-lg-4 col-sm-6">
          <div class="schedule-card">
            <div class="schedule-card__thumb">
              <img src="{{getImage('assets/images/rj_gallary/'.$jockey->email.'/'.$item)}}" alt="@lang('image')">
              <a href="{{getImage('assets/images/rj_gallary/'.$jockey->email.'/'.$item)}}" class="view-details-btn" data-rel="lightcase:myCollection:slideshow"><i class="las la-plus"></i></a>
            </div>
          </div>
        </div>
        @endforeach
      
        </div>
      </div>
    </section>
    <!-- profile section end -->
@endsection

@push('script')
    <script>
      'use strict'
	      $('a[data-rel^=lightcase]').lightcase();
    </script>
@endpush