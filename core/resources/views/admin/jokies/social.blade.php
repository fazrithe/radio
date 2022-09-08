@extends('admin.layouts.app')

@section('panel')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body p-0">

                    <div class="table-responsive table-responsive--lg">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('SL')</th>
                                    <th scope="col">@lang('Email')</th>
                                    <th scope="col">@lang('Icon')</th>
                                    <th scope="col">@lang('Title')</th>
                                    <th scope="col">@lang('Url')</th>
                                    <th scope="col">@lang('Background')</th>
                                    <th scope="col">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody class="list">
                                @forelse ($socials as $social)
                                    <tr>
                                        <td data-label="@lang('SL')">{{ $loop->iteration }}</td>
                                        <td data-label="@lang('Email')">{{ __($social->jockey->email) }}</td>

                                        <td data-label="@lang('Icon')"><?= $social->icon ?></td>
                                        <td data-label="@lang('Title')">{{ $social->title }}</td>
                                        <td data-label="@lang('Url')">{{ $social->url }}</td>
                                        <td data-label="@lang('Background')">{{ $social->bgcolor }}</td>
                                        <td data-label="@lang('Action')">
                                            <button class="icon-btn updateBtn" data-id="5"
                                                    data-all="{{ $social }}"><i
                                                    class="la la-pencil-alt"></i></button>
                                            <button class="icon-btn btn--danger removeBtn" data-id="{{ $social->id }}" data-url="{{route('admin.rjs.delete',$social->id)}}"><i
                                                    class="la la-trash"></i></button>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td class="text-center" colspan="100%">{{__('No Data Found')}}</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                    </div>
                        <div class="card-footer py-4">
                            {{ $socials->links('admin.partials.paginate') }}
                        </div>
                </div>
            </div>
        </div>





        <div id="addModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> @lang('Add New Social icon Item')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.radio.social.store')}}" method="POST">
                        @csrf

                        <div class="modal-body">
                            <div class="form-group">
                                <label>@lang('Jockey Email')</label>
                                <select name="radio_jockey_id" id="" class="form-control" required>
                                <option value="">@lang('Select an Email')</option>
                                @foreach ($jockeys as $joc)
                                    <option value="{{ $joc->id }}">{{ $joc->email }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>@lang('Title')</label>
                                <input type="text" class="form-control" placeholder="Title" name="title" required />
                            </div>


                            <div class="form-group">
                                <label>@lang('Icon')</label>
                                <div class="input-group has_append">
                                    <input type="text" class="form-control" name="icon" required>

                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary iconPicker " data-icon="fas fa-home"
                                            role="iconpicker"></button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">@lang('Social Icon Color')</label>
                                <div class="input-group">
                                <span class="input-group-addon ">
                                    <input type='text' class="form-control  form-control-lg colorPicker"
                                           value="{{$general->secondary_color}}"/>
                                </span>
                                    <input type="text" class="form-control form-control-lg colorCode" name="bgcolor"
                                           value="{{ $general->secondary_color }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>@lang('Url')</label>
                                <input type="text" class="form-control" placeholder="@lang('Url')" name="url" required />
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                            <button type="submit" class="btn btn--primary">@lang('Save')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>





        <div id="updateModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"> @lang('Update Social icon Item')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('admin.rjs.update')}}" class="edit-route" method="POST">
                        @csrf

                        <input type="hidden" name="id" value="">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>@lang('Jockey Email')</label>
                                <select name="radio_jockey_id" id="jockey" class="form-control" required>
                                @foreach ($jockeys as $joc)
                                    <option value="{{ $joc->id }}">{{ $joc->email }}</option>
                                @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>@lang('Title')</label>
                                <input type="text" class="form-control" placeholder="@lang('Title')" name="title" required />
                            </div>


                             <div class="form-group">
                                <label>@lang('Icon')</label>
                                <div class="input-group has_append">
                                    <input type="text" class="form-control" name="icon" required>

                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary iconPicker " data-icon="fas fa-home"
                                            role="iconpicker"></button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">@lang('Social Icon Color')</label>
                                <div class="input-group">
                                <span class="input-group-addon ">
                                    <input type='text' class="form-control  form-control-lg colorPicker" id="color"
                                           value="{{$general->secondary_color}}"/>
                                </span>
                                    <input type="text" class="form-control form-control-lg colorCode" name="bgcolor"
                                           value="{{ $general->secondary_color }}"/>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>@lang('Url')</label>
                                <input type="text" class="form-control" placeholder="Url" name="url" required />
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                            <button type="submit" class="btn btn--primary">@lang('Update')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>




        <div id="removeModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('Confirmation')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form  method="POST">
                        @csrf
                        <div class="modal-body">
                            <p class="font-weight-bold">@lang('Are you sure you want to delete this item? Once deleted can not be undo
                                this action.')</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn--dark" data-dismiss="modal">@lang('Close')</button>
                            <button type="submit" class="btn btn--danger">@lang('Remove')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


@endsection


@push('breadcrumb-plugins')
        <button class="btn btn--primary mr-3 m-top" id="add">@lang('Add Icon') <i class="fa fa-plus"></i></button>
@endpush


@push('style-lib')
        <link rel="stylesheet" href="{{ asset('assets/admin/css/spectrum.css') }}">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"/>
        <link rel="stylesheet" href="{{ asset('assets/admin/css/bootstrap-iconpicker.min.css') }}">
@endpush
@push('script-lib')
        <script src="{{ asset('assets/admin/js/spectrum.js') }}"></script>
        <script src="{{ asset('assets/admin/js/bootstrap-iconpicker.bundle.min.js') }}"></script>
@endpush

@push('style')

    <style>
        .m-top{
            margin-top: 3px;
        }
        .sp-replacer {
            padding: 0;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 5px 0 0 5px;
            border-right: none;
        }

        .sp-preview {
            width: 100px;
            height: 46px;
            border: 0;
        }

        .sp-preview-inner {
            width: 110px;
        }

        .sp-dd {
            display: none;
        }
    </style>

@endpush
@push('script')

        <script>
            'use strict';

             $('.colorPicker').spectrum({
            color: $(this).data('color'),
            change: function (color) {
                $(this).parent().siblings('.colorCode').val(color.toHexString().replace(/^#?/, ''));
            }
        });

        $('.colorCode').on('input', function () {
            var clr = $(this).val();
            $(this).parents('.input-group').find('.colorPicker').spectrum({
                color: clr,
            });
        });

            $('.removeBtn').on('click', function () {
                var modal = $('#removeModal');
                modal.find('form').attr('action',$(this).data('url'))
                modal.modal('show');
            });

            $('#add').on('click', function () {
                var modal = $('#addModal');
                modal.modal('show');
            });

            $('.updateBtn').on('click',function(){
                 var modal = $('#updateModal');
                 var data  = $(this).data('all');
                 $('#jockey').val(data.radio_jockey_id);
                  modal.find('input[name=id]').val(data.id);
                  modal.find('input[name=title]').val(data.title);
                  modal.find('input[name=icon]').val(data.icon);
                  modal.find('input[name=url]').val(data.url);
                  $('#color').val(data.bgcolor);
                  modal.find('input[name=bgcolor]').val(data.bgcolor);
                  modal.modal('show');
            });

            $('#updateBtn').on('shown.bs.modal', function (e) {
                $(document).off('focusin.modal');
            });
            $('#addModal').on('shown.bs.modal', function (e) {
                $(document).off('focusin.modal');
            });

            $('.iconPicker').iconpicker({
                align: 'center', // Only in div tag
                arrowClass: 'btn-danger',
                arrowPrevIconClass: 'fas fa-angle-left',
                arrowNextIconClass: 'fas fa-angle-right',
                cols: 10,
                footer: true,
                header: true,
                icon: 'fas fa-bomb',
                iconset: 'fontawesome5',
                labelHeader: '{0} of {1} pages',
                labelFooter: '{0} - {1} of {2} icons',
                placement: 'bottom', // Only in button tag
                rows: 5,
                search: true,
                searchText: 'Search icon',
                selectedClass: 'btn-success',
                unselectedClass: ''
            }).on('change', function (e) {
                $(this).parent().siblings('input[name=icon]').val(`<i class="${e.icon}"></i>`);
            });
        </script>

@endpush



@push('breadcrumb-plugins')
    <form action="{{ route('admin.radio.jockey.social.search',request('search'))}}" method="GET" class="form-inline float-sm-right bg--white">
        <div class="input-group has_append">
            <input type="text" name="search" class="form-control" placeholder="Email of Jockey"
                value="{{ $search ?? '' }}">
            <div class="input-group-append">
                <button class="btn btn--primary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
@endpush
