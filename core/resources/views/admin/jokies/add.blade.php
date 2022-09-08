
@extends('admin.layouts.app')

@section('panel')

    <div class="row mb-none-30 justify-content-center">
        <div class="col-lg-12 col-md-12 mb-30">
            <div class="card">
                <div class="card-body">

                   
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col">
                                <div class="from-group">
                                    <label>@lang('First Name') </label>
                                    <input type="text" name="fname"  placeholder="@lang('First Name')"
                                        value="{{ old('fname') }}" class="form-control" required>
                                </div>
                            </div>


                            <div class="col">
                                <div class="from-group">
                                    <label>@lang('Last Name') </label>
                                    <input type="text" name="lname"  placeholder="@lang('Last Name')"
                                        value="{{ old('lname') }}" class="form-control" required>
                                </div>
                            </div>

                            <div class="col">
                                <div class="from-group">
                                    <label>@lang('Designation') </label>
                                    <input type="text" name="designation" placeholder="@lang('designation')"
                                        value="{{ old('designation') }}" class="form-control" required>
                                </div>
                            </div>

                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <div class="from-group">
                                    <label>@lang('Email') </label>
                                    <input type="text" name="email" placeholder="@lang('Email')" value="{{ old('email') }}"
                                        class="form-control" required>
                                </div>
                            </div>


                            <div class="col">
                                <div class="from-group">
                                    <label>@lang('Phone') </label>
                                    <input type="text" name="phone" placeholder="@lang('Phone')" value="{{ old('phone') }}"
                                        class="form-control" required>
                                </div>
                            </div>

                        </div>


                        <div class="row mb-3">

                            <div class="col-md-4">

                                <div class="form-group mt-3">
                                    <div class="image-upload">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <div class="profilePicPreview">
                                                    <button type="button" class="remove-image"><i
                                                            class="fa fa-times"></i></button>
                                                </div>
                                            </div>
                                            <div class="avatar-edit">
                                                <input type="file" class="profilePicUpload" name="image"
                                                    id="profilePicUpload1" accept=".png, .jpg, .jpeg" required>
                                                <label for="profilePicUpload1" class="bg--primary">@lang('Upload Profile
                                                    Images')</label>
                                                <small class="mt-2 text-facebook">@lang('Supported files'): <b>@lang('jpeg, jpg')</b>. @lang('Image
                                                    will
                                                    be resized into') {{imagePath()['rj_image']['size'] }}px </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="col">
                                <div class="from-group">
                                    <label>@lang('About')</label>
                                    <textarea name="about"  cols="30" rows="16"
                                        class="form-control" required placeholder="@lang('About Jockey')"></textarea>
                                </div>

                            </div>

                        </div>



                        <div class="row" id="addAnother">
                            <div class="col-md-12">
                                <h3>@lang('Academic')</h3>

                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>@lang('Institution Name')</label>
                                                <input class="form-control" type="text" name="institution[name]"
                                                    required placeholder="@lang('Institution Name')">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">@lang('From year')</label>
                                                <input type="text" name="institution[from_year]"
                                                    class="form-control" required placeholder="@lang('From Year')">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">@lang('To year')</label>
                                                <input type="text" name="institution[to_year]"
                                                    class="form-control" required placeholder="@lang('To Year')">
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">@lang('About Institution')</label>
                                        <textarea name="institution[about_institution]"  cols="30" rows="10"
                                            class="form-control" required placeholder="@lang('About Institution')"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="row" id="addExperience">
                            <div class="col-md-12">
                                <h3>Experice</h3>
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>@lang('Company Name')</label>
                                                <input class="form-control" type="text" name="company[1][name]" required placeholder="@lang('Comapny Name')">
                                            </div>

                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">@lang('From year')</label>
                                                <input type="text" name="company[1][from_year_ex]"
                                                    class="form-control" required placeholder="@lang('Starting Year')">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="form-group">
                                                <label for="">@lang('To year')</label>
                                                <input type="text" name="company[1][to_year_ex]"
                                                    class="form-control" required placeholder="@lang('End year')">
                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">@lang('Job Responsibility')</label>
                                        <textarea name="company[1][responsibility]" cols="30" rows="10"
                                            class="form-control" required placeholder="@lang('Job Responsibility')"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <button type="button" class="action-button previous_button cmn-btn2" id="expericen_add"> <i
                                class="fa fa-plus"></i> @lang('Add Experice (if Required)')</button>

                        


                        <div class="row" id="gallary">
                            <div class="col-md-3">
                                <div class="form-group mt-3">
                                    <div class="image-upload">
                                        <div class="thumb">
                                            <div class="avatar-preview">
                                                <div class="profilePicPreview">
                                                    <button type="button" class="remove-image"><i
                                                            class="fa fa-times"></i></button>
                                                </div>
                                            </div>

                                            <div class="avatar-edit">
                                                <input type="file" class="profilePicUpload" name="gallary[]"
                                                    id="profilePicUpload2" accept=".png, .jpg, .jpeg" multiple="multiple" required>
                                                <label for="profilePicUpload2" class="bg--primary">@lang('Upload Gallary
                                                    Images')</label>
                                                <small class="mt-2 text-facebook">@lang('Supported files'): <b>@lang('jpeg, jpg')</b>. @lang('Image
                                                    will
                                                    be resized into') {{ imagePath()['rj_gallary']['size'] }}px </small>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <button type="button" class="action-button previous_button cmn-btn2 mb-4" id="gallary_add"> <i
                                class="fa fa-plus"></i> @lang('Add Image (if Required)')</button>

                        <input type="submit" class="form-control btn btn--primary" value="Add jockey">

                    </form>
                </div>
                <!-- End Multi step form -->

            </div>
        </div>
    </div>
    </div>
@endsection

@push('breadcrumb-plugins')
    <a href="{{route('admin.radio.jockey')}}" class="btn btn--primary float-sm-right"> <i class="las la-reply"></i> @lang('Go Back')</a>
@endpush


@push('script')

    <script>
        'use strict'
        var j = 1;
        $('#expericen_add').on('click', function() {
            $('#addExperience').append(`
                              
                              
                              
                              <div class="col-md-12">
                                              <h3>Experice` + ++j + `</h3>

                                                

                                                    <div class="col-lg-12">
                                                        <div class="row">
                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label>@lang('Company Name')</label>
                                                                    <input class="form-control" type="text" name="company[${j}][name]" required placeholder="Company Name">
                                                                </div>
                                                            </div>

                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="">@lang('From year')</label>
                                                                    <input type="text" id="yearPicker" name="company[${j}][from_year_ex]" class="form-control" required placeholder="From year">
                                                                </div>
                                                            </div>

                                                            <div class="col">
                                                                <div class="form-group">
                                                                    <label for="">@lang('To year')</label>
                                                                    <input type="text" id="yearPicker" name="company[${j}][to_year_ex]" class="form-control" required placeholder="to Year">
                                                                </div>
                                                            
                                                            </div>  

                                                        </div>
                                                        
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                          <label for="">@lang('Job Resposibility')</label>
                                                          <textarea name="company[${j}][responsibility]" id="" cols="30" rows="10" class="form-control" required placeholder="Responsibilities"></textarea>
                                                        </div>
                                                    </div>
                                            </div>
                              
                              
                              
                              `);
        });

        var incr = 3;
        $('#gallary_add').on('click', function() {
            $('#gallary').append(`
                                

                                    <div class="col-md-3">
                                                    <div class="form-group mt-3">
                                                            <div class="image-upload">
                                                                <div class="thumb">
                                                                    <div class="avatar-preview">
                                                                        <div class="profilePicPreview">
                                                                            <button type="button" class="remove-image"><i class="fa fa-times"></i></button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="avatar-edit">
                                                                        <input type="file" class="profilePicUpload" name="gallary[]" id="profilepicupload${i}" accept=".png, .jpg, .jpeg" required>
                                                                        <label for="profilepicupload${i}" class="bg--primary">Upload Gallary Images</label>
                                                                        <small class="mt-2 text-facebook">Supported files: <b>jpeg, jpg</b>. Image will be resized into {{ imagePath()['seo']['size'] }}px </small>


                                                                        
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                
                                
                                
                                `);
            i++;
            upload();
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
        .profilePicPreview {
            background-image: url("{{ getImage('', imagePath()['rj_gallary']['size']) }}");
            background-position: center !important;
        }

        .cmn-btn {
            padding: 12px 35px;
            text-transform: uppercase;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
            background-color: #6e41ff;
            box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.15);
            -webkit-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
            color: #ffffff;
        }


        .cmn-btn2 {
            padding: 12px 35px;
            text-transform: uppercase;
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
            background-color: #1e175a;
            box-shadow: 0px 10px 20px 0px rgba(0, 0, 0, 0.15);
            -webkit-transition: all 0.3s;
            -o-transition: all 0.3s;
            transition: all 0.3s;
            color: #ffffff;
        }

        

    </style>
@endpush
