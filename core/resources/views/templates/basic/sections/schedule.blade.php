 @php
     $schedule = getContent('schedule.content', true)->data_values;
     $events = App\Models\Event::where('week_name',now()->format('l'))->get();

 @endphp
 <!-- schedule section start -->
 <section class="pt-100 pb-100 bg_img overlay--one"
     style="background-image: url({{ sectionImage('schedule', $schedule->background_image) }});">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-lg-6">
                 <div class="section-header text-center">
                     <h2 class="section-title text-uppercase">{{ __($schedule->title) }}</h2>
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
         <div class="row">
             <div class="col-lg-12">
                 <ul class="nav nav-tabs custom--tab mb-5 justify-content-center" id="scheduleTab" role="tablist">
                     <li class="nav-item" role="presentation">
                         <button class="nav-link active day" id="day-1-tab" data-bs-toggle="tab" data-bs-target="#day-1"
                             type="button" role="tab" aria-controls="day-1" aria-selected="true"
                             data-value="{{ now()->format('l') }}" data-tab="1">{{ __(now()->format('l')) }}</button>
                     </li>
                     <li class="nav-item" role="presentation">
                         <button class="nav-link day" id="day-2-tab" data-bs-toggle="tab" data-bs-target="#day-2"
                             type="button" role="tab" aria-controls="day-2" aria-selected="false"
                             data-value="{{ now()->addDay(1)->format('l') }}"
                             data-tab="2">{{ __(now()->addDay(1)->format('l')) }}</button>
                     </li>
                     <li class="nav-item" role="presentation">
                         <button class="nav-link day" id="day-3-tab" data-bs-toggle="tab" data-bs-target="#day-3"
                             type="button" role="tab" aria-controls="day-3" aria-selected="false"
                             data-value="{{ now()->addDays(2)->format('l') }}"
                             data-tab="3">{{ __(now()->addDays(2)->format('l')) }}</button>
                     </li>

                     <li class="nav-item" role="presentation">
                         <button class="nav-link day" id="day-4-tab" data-bs-toggle="tab" data-bs-target="#day-4"
                             type="button" role="tab" aria-controls="day-4" aria-selected="false"
                             data-value="{{ now()->addDays(3)->format('l') }}"
                             data-tab="4">{{ __(now()->addDays(3)->format('l')) }}</button>
                     </li>
                     <li class="nav-item" role="presentation">
                         <button class="nav-link day" id="day-5-tab" data-bs-toggle="tab" data-bs-target="#day-5"
                             type="button" role="tab" aria-controls="day-5" aria-selected="false"
                             data-value="{{ now()->addDays(4)->format('l') }}"
                             data-tab="5">{{ __(now()->addDays(4)->format('l')) }}</button>
                     </li>
                     <li class="nav-item" role="presentation">
                         <button class="nav-link day" id="day-6-tab" data-bs-toggle="tab" data-bs-target="#day-6"
                             type="button" role="tab" aria-controls="day-6" aria-selected="false"
                             data-value="{{ now()->addDays(5)->format('l') }}"
                             data-tab="6">{{ __(now()->addDays(5)->format('l')) }}</button>
                     </li>
                     <li class="nav-item" role="presentation">
                         <button class="nav-link day" id="day-7-tab" data-bs-toggle="tab" data-bs-target="#day-7"
                             type="button" role="tab" aria-controls="day-7" aria-selected="false"
                             data-value="{{ now()->addDays(6)->format('l') }}"
                             data-tab="7">{{ __(now()->addDays(6)->format('l')) }}</button>
                     </li>
                 </ul>

                 <div class="tab-content" id="scheduleTabContent">

                     <div class="tab-pane fade show active" id="day-1" role="tabpanel" aria-labelledby="day-1-tab">
                         <div class="row gy-4">
                             @foreach ($events as $event)
                                 <div class="col-lg-4 col-md-6">
                                     <div class="schedule-card">
                                         <div class="schedule-card__thumb">
                                             <img src="{{ getImage('assets/images/program/' . $event->image, '600x600') }}"
                                                 alt="@lang('image')">
                                             
                                             <div class="overlay-content">
                                                 <h3 class="schedule-name">{{ __($event->event_name) }}</h3>
                                                 <p class="time">
                                                     
                                                     {{ \Carbon\Carbon::parse($event->start_time)->format('H:i a') . __(' TO ') . \Carbon\Carbon::parse($event->end_time)->format('H:i a') }}
                                                 </p>
                                             </div>
                                             
                                         </div>
                                         <div class="rj">
                                             <div class="thumb">
                                                 <img src="{{ getImage('assets/images/rj_image/' . $event->jockey->image, '600x600') }}"
                                                     alt="@lang('image')">
                                             </div>
                                             <div class="content">
                                                 <h5 class="name">{{ __($event->jockey->fullname) }}</h5>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             @endforeach
                         </div>
                     </div>



                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- schedule section end -->


 @push('script')
     <script>
             'use strict'
         $(function() {
             $('.day').on('click', function() {
                 var dayOfWeek = $(this).data('value');
                 var tab = $(this).data('tab');

                 $.ajax({
                     method: 'GET',
                     url: "{{ route('event') }}",
                     data: {
                         inputValue: dayOfWeek,
                         tab: tab
                     },
                     success: function(response) {
                         $('#scheduleTabContent').html(response)
                     }
                 })
             })
         })

     </script>
 @endpush
