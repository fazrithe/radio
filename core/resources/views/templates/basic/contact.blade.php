@extends($activeTemplate.'layouts.frontend')

@section('content')
@php
    $bread = getContent('breadcrumb.content',true);
    $contact = getContent('contact_us.content',true);
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


    <!-- contact section start -->
    <section class="pt-100 pb-100 bg_img overlay--one" style="background-image: url({{sectionImage('contact_us',$contact->data_values->background_image)}});">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10">
            <div class="contact-wrapper">
              <div class="row gy-4">
                <div class="col-lg-4">
                  <div class="contact-item">
                    <div class="icon">
                      <i class="las la-phone-volume"></i>
                    </div>
                    <div class="content">
                      <h6 class="caption">@lang('Phone number')</h6>
                      <p><a href="tel:{{$contact->data_values->contact_number}}">{{$contact->data_values->contact_number}}</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="contact-item">
                    <div class="icon">
                      <i class="las la-envelope"></i>
                    </div>
                    <div class="content">
                      <h6 class="caption">@lang('Email Address')</h6>
                      <p><a href="mailto:demo@gmail.com">{{__($contact->data_values->email_address)}}</a></p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4">
                  <div class="contact-item">
                    <div class="icon">
                      <i class="las la-map-marked-alt"></i>
                    </div>
                    <div class="content">
                      <h6 class="caption">@lang('Address')</h6>
                      <p>{{__($contact->data_values->contact_details)}}</p>
                    </div>
                  </div>
                </div>
              </div><!-- row end -->
              <form class="mt-5" action="" method="POST">
                  @csrf
                <div class="row">
                  <div class="col-lg-6 form-group">
                    <label>@lang('Name')</label>
                    <input type="text" name="name" placeholder="@lang('Enter full name')" class="form--control">
                  </div>
                  <div class="col-lg-6 form-group">
                    <label>@lang('Email')</label>
                    <input type="text" name="email" placeholder="@lang('Enter email address')" class="form--control">
                  </div>
                  <div class="col-lg-12 form-group">
                    <label>@lang('Subject')</label>
                    <input type="text" name="subject" placeholder="@lang('Enter Subject')" class="form--control">
                  </div>
                  <div class="col-lg-12 form-group">
                    <label>@lang('Message')</label>
                    <textarea name="message" placeholder="@lang('Message')" class="form--control"></textarea>
                  </div>
                  <div class="col-lg-12">
                    <button type="submit" class="btn btn--base">@lang('Message Now')</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- contact section end -->
@endsection
