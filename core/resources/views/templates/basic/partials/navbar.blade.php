      <!-- header-section start  -->
  <header class="header">
    <div class="header__bottom">
      <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-xl p-0 align-items-center">
          <a class="site-logo site-title" href="{{route('home')}}">
            <img src="{{asset('assets/images/logoIcon/logo.png')}}" alt="@lang('site-logo')">
            <div class="equalizer">
              <span class="equalizer-item equalizer-1"></span>
              <span class="equalizer-item equalizer-2"></span>
              <span class="equalizer-item equalizer-3"></span>
              <span class="equalizer-item equalizer-4"></span>
              <span class="equalizer-item equalizer-5"></span>
              <span class="equalizer-item equalizer-6"></span>
              <span class="equalizer-item equalizer-7"></span>
              <span class="equalizer-item equalizer-8"></span>
              <span class="equalizer-item equalizer-9"></span>
              <span class="equalizer-item equalizer-10"></span>
              <span class="equalizer-item equalizer-11"></span>
              <span class="equalizer-item equalizer-12"></span>
              <span class="equalizer-item equalizer-none"></span>
            </div>
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="menu-toggle"></span>
          </button>
          <div class="collapse navbar-collapse mt-lg-0 mt-3" id="navbarSupportedContent">
            <ul class="navbar-nav main-menu ms-auto align-items-center">
              <li><a href="{{route('home')}}">{{__('Home')}}</a></li>
              @foreach ($pages as $page)
                  @if($page->name = 'contact')
                    @continue
                  @endif
                  <li><a href="{{route('pages',$page->slug)}}">{{__($page->name)}}</a></li>
              @endforeach

              <li><a href="{{route('events')}}">@lang('Archive Events')</a></li>
              <li><a href="{{route('jockey')}}">@lang('All Jockey')</a></li>
              <li><a href="{{route('jockey')}}">@lang('Blog')</a></li>
              <li><a href="{{route('contact')}}">@lang('Contact')</a></li>
              <li class="nav-right">
                <select name="language" class="langSel select">
                  @foreach ($language as $lang)
                  <option value="{{$lang->code}}" {{session('lang') == $lang->code ? 'selected' : ''}}>{{__($lang->name)}}</option>
                  @endforeach
                </select>
              </li>
            </ul>
          </div>
        </nav>
      </div>
    </div><!-- header__bottom end -->
  </header>
  <!-- header-section end  -->
