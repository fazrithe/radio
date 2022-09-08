@php
    $brand = getContent('brand.content',true);
    $brands = getContent('brand.element');
@endphp
    <!-- brand section start -->
    <section class="brand-section bg_img overlay--two" style="background-image: url({{sectionImage('brand',$brand->data_values->background_image,'1920x50')}});">
      <div class="container">
        <div class="row justify-content-between align-items-center">
          <div class="col-xxl-5 col-xl-5">
            <h2 class="section-title">{{__($brand->data_values->title)}}</h2>
            <p class="mt-3">{{__($brand->data_values->description)}}</p>
          </div>
          <div class="col-xxl-6 col-xl-7 mt-xl-0 mt-4">
            <div class="brand-slider">
              @foreach ($brands as $item)
                <div class="single-slide">
                  <div class="brand-item">
                    <img src="{{sectionImage('brand',$item->data_values->brand,'100x100')}}" alt="@lang('image')">
                  </div>
                </div><!-- single-slide end -->
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- brand section end -->
