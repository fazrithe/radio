@extends('admin.layouts.app')

@section('panel')

    <div class="row">

        <div class="col-lg-12">
            <div class="card b-radius--10 ">
                <div class="card-body p-0">
                    <div class="table-responsive--md  table-responsive">
                        <table class="table table--light style--two">
                            <thead>
                                <tr>
                                    <th scope="col">@lang('Poll Question')</th>
                                    <th scope="col">@lang('Options')</th>
                                    <th scope="col">@lang('Result')</th>
                                    <th scope="col">@lang('Status')</th>
                                    <th scope="col">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($polls as $poll)
                                    <tr>
                                        <td data-label="@lang('Poll Question')">{{ __($poll->question) }}</td>
                                        <td data-label="@lang('Options')">
                                            @foreach ($poll->choice as $item)
                                                <span class="badge badge--primary">{{ $item }}</span>
                                            @endforeach

                                        </td>
                                        <td data-label="@lang('Result')">

                                            @php
                                                 $total = $poll->pollLogs->count();

                                            @endphp

                                            @foreach ($poll->choice as $item)
                                                @php
                                                    $count = $poll->pollLogs->where('result', $item)->count();

                                                    if ($count == 0) {
                                                        $percent = 0;
                                                    }else{
                                                        $percent = ($count / $total) * 100;
                                                    }

                                                    echo "{$item}".':'."{$percent} % <br>";
                                                @endphp
                                            @endforeach

                                        </td>
                                        <td data-label="@lang('Status')">
                                            @if ($poll->status == 1)
                                                <span class="badge badge--success">@lang('Active')</span>
                                            @else
                                                <span class="badge badge--danger">@lang('In Active')</span>
                                            @endif
                                        </td>
                                        <td data-label="@lang('Action')">

                                            <button class="icon-btn edit" data-poll="{{ $poll }}"
                                                data-url="{{ route('admin.poll.edit', $poll) }}"><i
                                                    class="la la-pen"></i></button>

                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalpoll">
        <div class="modal-dialog" role="document">
            <form action="" method="post">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">@lang('Add Poll')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        @csrf
                        <div class="form-group">
                            <label for="">@lang('Poll Question')</label>
                            <input type="text" name="question" id="" class="form-control"
                                placeholder="@lang('poll Question')">
                        </div>
                        <div class="form-group">
                            <label for="">@lang('Poll Choise')</label>
                            <select name="choice[]" id="" class="select2-auto-tokenize" multiple
                                class="form-control choice"></select>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label font-weight-bold">@lang('Status') </label>
                            <input type="checkbox" data-width="100%" data-onstyle="-success" data-offstyle="-danger"
                                data-toggle="toggle" data-on="Active" data-off="In Active" data-width="100%" name="status">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn--secondary" data-dismiss="modal">@lang('Close')</button>
                        <button type="submit" class="btn btn--primary">@lang('Save changes')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection

@push('breadcrumb-plugins')
    <button class="btn btn--primary poll"><i class="la la-plus"></i> @lang('Add Poll')</button>
@endpush

@push('script')
    <script>
        $(function() {
            $('.poll').on('click', function() {
                const modal = $('#modalpoll');
                modal.find('.modal-title').text('Add Poll');
                modal.find('button[type=submit]').text('Create Poll');
                modal.find('input[name=question]').val('')
                modal.find('select').html('');
                modal.find('input[name=status]').bootstrapToggle('off');
                modal.modal('show');
            });

            $('.edit').on('click', function() {
                const modal = $('#modalpoll');
                var poll = $(this).data('poll');
                var option = '';

                for (let index = 0; index < poll.choice.length; index++) {
                    option += "<option selected>" + poll.choice[index] + "</option>"
                }
                modal.find('input[name=question]').val(poll.question)
                modal.find('select').html(option);

                if (poll.status) {
                    modal.find('input[name=status]').bootstrapToggle('on');
                } else {
                    modal.find('input[name=status]').bootstrapToggle('off');
                }

                modal.find('form').attr('action', $(this).data('url'));
                modal.find('.modal-title').text('update Poll');
                modal.find('button[type=submit]').text('update Poll');

                modal.modal('show');
            })
        })

    </script>
@endpush
