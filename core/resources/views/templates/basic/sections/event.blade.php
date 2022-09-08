 @php
     $event = getContent('event.content', true)->data_values;
     $archives = App\Models\Archive::where('url', '!=', null)
        ->orWhere('input_file','!=',null)
         ->latest()
         ->take(10)
         ->get();
 @endphp

 <!-- event section start -->
 <section class="pt-100 pb-100 bg_img overlay--two"
     style="background-image: url({{ sectionImage('event', $event->background_image) }});">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-lg-6">
                 <div class="section-header text-center">
                     <h2 class="section-title text-uppercase">{{ __($event->title) }}</h2>
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
         <div class="row gy-4">
             @foreach ($archives as $archive)
                 <div class="col-xl-6">
                     <div class="event-card rounded-3">
                         <div class="thumb">
                             <img src="{{ getImage('assets/images/program/' . $archive->image) }}"
                                 alt="@lang('image')" class="rounded-2">
                         </div>
                         <div class="content">
                             <h4>{{ __($archive->event_name) }}</h4>
                             <ul class="event-details-list mt-3">

                                 <li>
                                     <span class="caption">@lang('Date')</span>
                                     <span class="value">{{ $archive->created_at->format('d M Y') }}</span>
                                 </li>
                                 <li>
                                     <span class="caption">@lang('Time')</span>
                                     <span class="value">{{ \Carbon\Carbon::parse($archive->start_time)->format('H:i a') . __(' TO ') . \Carbon\Carbon::parse($archive->end_time)->format('H:i a') }}</span>
                                 </li>
                             </ul>
                         </div>
                         <div class="right">
                             <div onclick="play(this.getAttribute('data-audio'),this,this.getAttribute('id'))" class="event_audio style--two" data-audio="
                             @if($archive->url != null)
                                @php
                                      echo $archive->url;
                                @endphp
                            @else
                                @php
                                     echo asset(imagePath()['event_audio']['path'].'/'.$archive->input_file);
                                @endphp
                            @endif
                             " id="audio-{{$loop->iteration}}">
                                 <div class="event_controls">
                                     <div class="event_container">
                                         <div class="play event_play"></div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             @endforeach

         </div>
     </div>
 </section>
 <!-- event section end -->

 @push('style')
     <style>
.event_audio.style--two .event_container {
    width: 120px;
    height: 50px;
    background-color: #e84545;
    margin-top: 0;
    margin-right: 0;
    -webkit-transform: translateY(0);
    -ms-transform: translateY(0);
    transform: translateY(0);
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    -ms-border-radius: 5px;
    -o-border-radius: 5px;
}

.event_container {
    width: 150px;
    height: 150px;
    background-color: transparent;
    border-radius: 50%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    margin-top: -30px;
    margin-right: -53px;
    display: inline-flex;
    justify-content: center;
    align-items: center;
    position: relative;
    -webkit-transform: translateY(42px);
    -ms-transform: translateY(42px);
    transform: translateY(42px);
}

.event_audio.style--two .event_controls .event_play.play {
    border: 8px solid #0000;
    border-left: 15px solid white;
}


.event_audio .event_controls .event_play.play {
    cursor: pointer;
    position: relative;
    left: 10px;
    height: 0;
    width: 0;
    border: 12px solid #0000;
    border-left: 18px solid white;
}

.play-container .event_play {
    position: relative;
    z-index: 2;
}

.event_audio .event_controls {
    display: flex;
}
.event_controls {
    display: flex;
    align-items: flex-end;
}


.event_audio .event_controls .event_play.pause {
    height: 15px;
    width: 20px;
    cursor: pointer;
    position: relative;
    left: 5px;
    top: -3px;
}

.event_audio .event_controls .event_play.pause:before {
    position: absolute;
    top: 0;
    left: 0px;
    background: white;
    content: "";
    height: 20px;
    width: 3px;
}

.event_audio .event_controls .event_play.pause:after {
    position: absolute;
    top: 0;
    right: 8px;
    background: white;
    content: "";
    height: 20px;
    width: 3px;
}

.event_audio .event_controls .event_play.pause:hover {
    transform: scale(1.1);
}
     </style>
 @endpush


@push('script')
    <script>
        'use stirct'
        var allId = [];
        var prev = '';
        var audioPlay = '';
        var parentAudio = '';
        function play(audio, element,id){
            $('#'+allId[0]).find('.event_play').removeClass('pause').addClass('play');
            if(allId.includes(id)){
                audioPlay.pause();
                allId = [];
                return false;
            }else{
                if(allId.length >= 1){
                    prev.pause();
                    $('#'+id).find('.event_play').removeClass('pause').addClass('play');
                }
                audioPlay = new Audio(audio);
                audioPlay.play();
                prev = audioPlay;
                $('#'+id).find('.event_play').removeClass('play').addClass('pause');
            }
           
            allId[0] = id;
            
        }
        
         
    </script>
@endpush