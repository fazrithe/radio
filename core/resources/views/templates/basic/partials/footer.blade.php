@php
    $footer =getContent('footer.content',true)->data_values;
    $socials =getContent('social_icon.element');
    $policies = getContent('policy.element');
@endphp
<!-- footer section start -->
<footer class="footer bg_img" style="background-image: url({{sectionImage('footer', $footer->background_image)}});">
  <div class="footer__top">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 text-center">
          <a href="{{route('home')}}"><img src="{{asset('assets/images/logoIcon/logo.png')}}" alt="@lang('image')"></a>
          <p class="mt-3">{{__($footer->description)}}</p>
          <ul class="social-links-list justify-content-center mt-3">
            @foreach ($socials as $icon)
              <li>
                <a href="{{$icon->data_values->url}}">
                @php
                  echo $icon->data_values->social_icon;
               @endphp
              </a>
            </li>
            @endforeach

          </ul>
        </div>
      </div>
    </div>
  </div><!-- footer__top end -->
  <div class="footer__bottom">
    <div class="container">
      <div class="row">
        <div class="col-lg-5 col-md-6 order-lg-1 order-2 text-md-start text-center">
          <p>@lang('Copyrights') © @php echo date('Y'); @endphp by <a href="{{route('home')}}" class="text--base">{{$general->sitename}}</a>. @lang('All Rights Reserved').</p>
        </div>
        <div class="col-lg-2 text-center order-lg-2 order-1">
          <div class="scroll-to-top">
            <i class="las la-angle-double-up"></i>
          </div>
        </div>
        <div class="col-lg-5 col-md-6 order-lg-3 order-3">
          <ul class="footer-short-list d-flex flex-wrap justify-content-md-end justify-content-center">
            @foreach ($policies as $policy)  
              <li><a href="{{route('policy',[$policy->id,slug($policy->data_values->title)])}}">{{__($policy->data_values->title)}}</a></li>
            @endforeach

          </ul>
        </div>
      </div>  
    </div>
  </div>
</footer>
<!-- footer section end -->