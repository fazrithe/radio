@extends('admin.layouts.app')

@section('panel')

    <form action="{{ route('admin.radio.jockey.update', [$jockey->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-30">


            <div class="col-xl-3 col-lg-5 col-md-5 mb-30"> 

                <div class="card b-radius--10 overflow-hidden box--shadow1">
                    <div class="card-body p-0">
                        <div class="p-3 bg--white">
                            <div class="form-group">
                                <div class="image-upload">
                                    <div class="thumb">
                                        <div class="avatar-preview">
                                            <div class="profilePicPreview-rj">
                                                <button type="button" class="remove-image"><i
                                                        class="fa fa-times"></i></button>
                                            </div>
                                        </div>
                                        <div class="avatar-edit">
                                            <input type="file" class="profilePicUpload" name="image" id="profilePicUpload-user"
                                                accept=".png, .jpg, .jpeg">
                                            <label for="profilePicUpload-user" class="bg--primary">@lang('Upload Profile
                                                Images')</label>
                                            <small class="mt-2 text-facebook">@lang('Supported files'): <b>@lang('jpeg, jpg')</b>.
                                                @lang('Image will
                                                be resized into') {{ imagePath()['rj_image']['size'] }}@lang('px') </small>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-15">
                                <h4 class="">{{ $jockey->full_name }}</h4>
                                <span class="text--small">@lang('Joined At')
                                    <strong>{{ date('d M, Y h:i A', strtotime($jockey->created_at)) }}</strong></span>
                                <div>
                                    @foreach ($jockey->socials as $social)
                                        <a href="{{ $social->url }}" title="{{ $social->title }}" class="badge social "
                                            style="background:#{{ $social->bgcolor }}"><?= $social->icon ?></a>
                                                @endforeach
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                           
                                  
                        
                    </div>

                        <div class="col-xl-9 col-lg-7 col-md-7">

                            <div class="row mb-none-30">

                            </div>


                            <div class="card mt-40">
                                <div class="card-body">
                                    <h5 class="card-title mb-50 border-bottom pb-2">{{ $jockey->full_name }} @lang('Information')</h5>

                                   

                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group ">
                                                    <label class="form-control-label font-weight-bold">@lang('First Name') <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="firstname"
                                                           value="{{ $jockey->firstname }}">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="form-control-label  font-weight-bold">@lang('Last Name') <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="lastname" value="{{ $jockey->lastname }}">
                                                </div>
                                            </div>

                                            <div class="col">
                                                <div class="form-group">
                                                    <label class="form-control-label  font-weight-bold">@lang('Designation') <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="designation" value="{{ $jockey->designation }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group ">
                                                    <label class="form-control-label font-weight-bold">@lang('Email') <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="email" name="email" value="{{ $jockey->email }}">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label  font-weight-bold">@lang('Mobile Number') <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="text" name="phone" value="{{ $jockey->phone }}">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="form-control-label  font-weight-bold">@lang('About Jockey')<span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="about" id="" cols="30" rows="5">{{ $jockey->about }}</textarea>
                                                </div>
                                            </div>

                                             <div class="col-md-6">
                                                 <h3>@lang('Education')</h3>
                                                 
                                           
                                                <div class="education my-3">
                                                    
                                                <h5>@lang('Academic')</h5>
                                               
                                                    <div class="form-group">
                                                        <label for="">@lang('Institution Name')</label>
                                                        <input type="text" name="institution[name]" id="" required value="{{ __($jockey->education->name) }}" class="form-control">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">@lang('From Year')</label>
                                                                <input type="text" name="institution[from_year]" id="" required value="{{ $jockey->education->from_year }}" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">@lang('To Year')</label>
                                                                <input type="text" name="institution[to_year]" id="" required value="{{ $jockey->education->to_year }}" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    


                                                    <div class="form-group">
                                                        <label for="">@lang('About Institution')</label>
                                                        <textarea name="institution[about_institution]" id="" cols="30" rows="5" class="form-control">{{ __($jockey->education->about_institution) }}</textarea>
                                                    </div>


                                                </div>
                                            
                                            </div>


                                             <div class="col-md-6">
                                                 <h3>@lang('Experience') <a href="" class="btn btn--primary" id="exadd"><i class="fa fa-plus"></i> @lang('Add Another')</a></h3>
                                                 <div class="extraex">

                                                 </div>
                                                @foreach ($jockey->experience as $ex)
                                                <div class="education my-3">
                                                <h5>@lang('Experience') {{ $loop->iteration }}</h5>
                                                    @php
                                                        $lastiteration = $loop->count;
                                                    @endphp
                                                    <div class="form-group">
                                                        <label for="">@lang('Institution Name')</label>
                                                        <input type="text" name="company[{{ $loop->iteration }}][name]" id="" required value="{{ $ex->name }}" class="form-control">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">@lang('From Year')</label>
                                                                <input type="text" name="company[{{ $loop->iteration }}][from_year_ex]" id="" required value="{{ $ex->from_year_ex }}" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label for="">@lang('To Year')</label>
                                                                <input type="text" name="company[{{ $loop->iteration }}][to_year_ex]" id="" required value="{{ $ex->to_year_ex }}" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    


                                                    <div class="form-group">
                                                        <label for="">@lang('About Institution')</label>
                                                        <textarea name="company[{{ $loop->iteration }}][responsibility]" id="" cols="30" rows="5" class="form-control">{{ $ex->responsibility }}</textarea>
                                                    </div>


                                                </div>
                                            @endforeach
                                            </div>

                                        </div>
                                        <div class="row my-4" id="gallary">
                                        @foreach ($jockey->gallary as $key => $gallary)
                                            @php
                                                $lastiterationGallary = $loop->count;
                                                
                                            @endphp
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="image-upload">
                                                        <div class="thumb">
                                                            <div class="avatar-preview">
                                                                <div class="profilePicPreview" style='background:url("{{ getImage('assets/images/rj_gallary/' . $jockey->email . '/' . $gallary) }}") '>
                                                                    <button type="button" class="remove-image"><i
                                                                            class="fa fa-times"></i></button>
                                                                </div>
                                                            </div>
                                                            <div class="avatar-edit">
                                                            <input type="file" class="profilePicUpload" name="gallary[]" id="profilePicUpload{{ $key }}" value="" accept=".png, .jpg, .jpeg">
                                                            <label for="profilePicUpload{{ $key }}" class="bg--primary">@lang('Upload Gallery Images')</label>
                                                                <small class="mt-2 text-facebook">@lang('Supported files'): <b>@lang('jpeg, jpg')</b>. @lang('Image will
                                                                    be resized into') {{ imagePath()['rj_image']['size'] }}px </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                        <button type="button" class="btn btn--primary mb-4" id="gallary_add"> <i
                                    class="fa fa-plus"></i> @lang('Add Image (if Required)')</button>

                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn--primary btn-block btn-lg">@lang('Update Radio Jockey')
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>



                   

@endsection

@push('script')
                    <script>
                        'use strict'
                         var exlast = "{{ $lastiteration + 1 }}";
                         var incr = "{{ $lastiterationGallary + 1 }}";
                        $(function(){
                            $('#exadd').on('click',function(e){                      
                                e.preventDefault();
                                $('.extraex').append(`
                                    <h5>Academic ${++exlast}</h5>
                                    <div class="form-group col-lg-12">
                                              <label>Institution Name</label>
                                              <input class="form-control" type="text" name="institution[${exlast}][name]" required>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="row">

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="">From year</label>
                                                            <input type="text" id="yearPicker" name="institution[${exlast}][from_year]" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for="">To year</label>
                                                            <input type="text" id="yearPicker" name="institution[${exlast}][to_year]" class="form-control" required>
                                                        </div>
                                                    
                                                    </div>  

                                                </div>
                                                
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label for="">About Institution</label>
                                                  <textarea name="institution[${exlast}][about_institution]" id="" cols="30" rows="10" class="form-control" required></textarea>
                                                </div>
                                            </div>
                                
                                
                                
                                `);
                            })

            
                $('#gallary_add').on('click', function() {
                    $('#gallary').append(`
                                            <div class="col-md-4">
                                                            <div class="form-group">
                                                                    <div class="image-upload">
                                                                        <div class="thumb">
                                                                            <div class="avatar-preview">
                                                                                <div class="profilePicPreview">
                                                                                    <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="avatar-edit">
                                                                                <input type="file" class="profilePicUpload" name="gallary[]" id="profilepicupload${incr}" accept=".png, .jpg, .jpeg" required>
                                                                                <label for="profilepicupload${incr}" class="bg--primary">Upload Gallary Images</label>
                                                                                <small class="mt-2 text-facebook">Supported files: <b>jpeg, jpg</b>. Image will be resized into {{ imagePath()['rj_gallary']['size'] }}px </small>


                                                                                
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                        
                                        
                                        
                                        `);
                    incr++;
                     upload();
                })
            })

        function upload() {
            function proPicURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var preview = $(input).parents('.thumb').find('.profilePicPreview');
                        $(preview).css('background-image', 'url(' + e.target.result + ')');
                        $(preview).addClass('has-image');
                        $(preview).hide();
                        $(preview).fadeIn(65);
                    }
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".profilePicUpload").on('change', function() {
                proPicURL(this);
            });

            $(".remove-image").on('click', function() {
                $(this).parents(".profilePicPreview").css('background-image', 'none');
                $(this).parents(".profilePicPreview").removeClass('has-image');
                $(this).parents(".thumb").find('input[type=file]').val('');
            });
        }

                    </script>
@endpush

@push('style')
                    <style>
                    
                    .social{
                        color: #ffffff;
                        padding: 10px 15px;
                        font-size: 16px;
                        margin:10px 2px;
                    }

                     .social:hover{
                        background: #7367f0;
                        color: #ffffff;
                        padding: 10px 15px;
                        font-size: 16px
                    }
                    
                    .gallery-card {
                    position: relative;
                }

                .gallery-card:hover .view-btn {
                    opacity: 1;
                    visibility: visible;
                }

                .gallery-card .view-btn {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.65);
                    color: #ffffff;
                    display: -ms-flexbox;
                    display: flex;
                    -ms-flex-wrap: wrap;
                    flex-wrap: wrap;
                    justify-content: center;
                    align-items: center;
                    font-size: 42px;
                    opacity: 0;
                    visibility: none;
                    -webkit-transition: all 0.3s;
                    -o-transition: all 0.3s;
                    transition: all 0.3s;
                }
                    
                    </style>    
@endpush

@push('style')

                    <style>
                        .profilePicPreview{
                            background-position: center;
                        }
                        .profilePicPreview-rj{
                            width: 100%;
                            height: 310px;
                            display: block;
                            border: 3px solid #f1f1f1;
                            box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.25);
                            border-radius: 10px;
                            background-size: cover !important;
                            background-position: top;
                            background-repeat: no-repeat;
                            position: relative;
                            overflow: hidden;
                            background-image: url("{{ getImage('assets/images/rj_image/' . $jockey->image) }}");
                        }
                    </style>

@endpush
