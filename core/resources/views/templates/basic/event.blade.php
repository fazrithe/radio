<div class="tab-pane fade show active" id="day-{{ $tab }}" role="tabpanel"
    aria-labelledby="day-{{ $tab }}-tab">
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
                            <img src="{{ getImage('assets/images/rj_image/' . $event->jockey->image, '') }}"
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
