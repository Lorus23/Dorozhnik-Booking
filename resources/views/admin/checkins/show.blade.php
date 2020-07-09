@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.bookings.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.booking')</th>
                            <td field-key='customer'>{{ $checkin->booking->customer->full_name or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.room_number')</th>
                            <td field-key='room_number'>{{ $checkin->booking->room->room_number or '' }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.check_in_date')</th>
                            <td field-key='check_in_date'>{{ $checkin->check_in_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.check_out_date')</th>
                            <td field-key='check_out_date'>{{ $checkin->check_out_date }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.adult_count')</th>
                            <td field-key='adult_count'>{!! $checkin->adult_count !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.kids_count')</th>
                            <td field-key='kids_count'>{!! $checkin->kids_count !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.adult_nutrition_count')</th>
                            <td field-key='adult_nutrition_count'>{!! $checkin->adult_nutrition_count !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.adult_breakfast')</th>
                            <td field-key='adult_breakfast'>{!! $checkin->adult_breakfast !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.adult_lunch')</th>
                            <td field-key='adult_lunch'>{!! $checkin->adult_lunch !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.adult_afternoon_tea')</th>
                            <td field-key='adult_afternoon_tea'>{!! $checkin->adult_afternoon_tea !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.adult_dinner')</th>
                            <td field-key='adult_dinner'>{!! $checkin->adult_dinner !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.kids_nutrition_count')</th>
                            <td field-key='kids_nutrition_count'>{!! $checkin->kids_nutrition_count !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.kids_breakfast')</th>
                            <td field-key='kids_breakfast'>{!! $checkin->kids_breakfast !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.kids_lunch')</th>
                            <td field-key='kids_lunch'>{!! $checkin->kids_lunch !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.kids_lunch')</th>
                            <td field-key='kids_lunch'>{!! $checkin->kids_afternoon_tea !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.kids_dinner')</th>
                            <td field-key='kids_dinner'>{!! $checkin->kids_dinner !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.prepay_cache')</th>
                            <td field-key='prepay_cache'>{!! $checkin->prepay_cache !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.prepay_kaspi')</th>
                            <td field-key='prepay_kaspi'>{!! $checkin->prepay_kaspi !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.prepay_eurasian')</th>
                            <td field-key='prepay_eurasian'>{!! $checkin->prepay_eurasian !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.prepay_forte')</th>
                            <td field-key='prepay_forte'>{!! $checkin->prepay_forte !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.post_pay_cache')</th>
                            <td field-key='post_pay_cache'>{!! $checkin->post_pay_cache !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.post_pay_kaspi')</th>
                            <td field-key='post_pay_kaspi'>{!! $checkin->post_pay_kaspi !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.post_pay_eurasian')</th>
                            <td field-key='post_pay_eurasian'>{!! $checkin->post_pay_eurasian !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.post_pay_forte')</th>
                            <td field-key='post_pay_forte'>{!! $checkin->post_pay_forte !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.extra_pay_cache')</th>
                            <td field-key='post_pay_forte'>{!! $checkin->extra_pay_cache !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.extra_pay_kaspi')</th>
                            <td field-key='post_pay_forte'>{!! $checkin->extra_pay_kaspi !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.extra_pay_eurasian')</th>
                            <td field-key='post_pay_forte'>{!! $checkin->extra_pay_eurasian !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.extra_pay_forte')</th>
                            <td field-key='post_pay_forte'>{!! $checkin->extra_pay_forte !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.voucher')</th>
                            <td field-key='voucher'>{!! $checkin->voucher !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.transport')</th>
                            <td field-key='transport'>{!! $checkin->transport !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.С_Т')</th>
                            <td field-key='С_Т'>{!! $checkin->С_Т !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.additionally_day')</th>
                            <td field-key='additionally_day'>{!! $checkin->additionally_day !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.additionally_night')</th>
                            <td field-key='additionally_night'>{!! $checkin->additionally_night !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.checkins.fields.debt')</th>
                            <td field-key='additionally_night'>{!! $checkin->debt !!}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.checkins.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
