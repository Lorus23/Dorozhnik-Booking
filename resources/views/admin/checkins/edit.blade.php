@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.checkins.title')</h3>
    {!! Form::model($checkin, ['method' => 'PUT', 'route' => ['admin.checkins.update', $checkin->id]]) !!}
    {{csrf_field()}}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('booking_id', trans('quickadmin.checkins.fields.booking'), ['class' => 'control-label']) !!}
                    {!! Form::select('booking_id', $bookings, old('booking_id'), ['class' => 'form-control select2', 'readonly']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('booking_id'))
                        <p class="help-block">
                            {{ $errors->first('booking_id') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 form-group">
                    {!! Form::label('customer',trans('quickadmin.checkins.fields.client')) !!}
                    {!! Form::text('customer', old('customer'), ['class' => 'form-control', 'placeholder' => '', 'required' => '','readonly']) !!}
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('check_in_date', trans('quickadmin.checkins.fields.check_in_date').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('check_in_date', old('check_in_date'), ['class' => 'form-control datetimepicker', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('check_in_date'))
                        <p class="help-block">
                            {{ $errors->first('check_in_date') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('check_out_date', trans('quickadmin.checkins.fields.check_out_date').'*', ['class' => 'control-label']) !!}
                    {!! Form::text('check_out_date', old('check_out_date'), ['class' => 'form-control datetimepicker', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('check_out_date'))
                        <p class="help-block">
                            {{ $errors->first('check_out_date') }}
                        </p>
                    @endif
                </div>
            </div>


            <div class="row">
                <div class="col-md-5 form-group">
                    {!! Form::label('adult_count',trans('quickadmin.checkins.fields.adult_count').'*') !!}
                    {!! Form::text('adult_count', old('adult_count'), ['class' => 'form-control', 'placeholder' => '', 'required' => '', 'value'=>'0']) !!}

                    {!! Form::label('kids_count',trans('quickadmin.checkins.fields.kids_count')) !!}
                    {!! Form::text('kids_count', old('kids_count'), ['class' => 'form-control ', 'placeholder' => '', 'value'=>'0']) !!}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Питание</div>
                <div class="panel-body">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('adult_nutrition_count',trans('quickadmin.checkins.fields.adult_nutrition_count')) !!}
                                {!! Form::text('adult_nutrition_count', old('adult_nutrition_count'), ['class' => 'form-control ', 'placeholder' => '', 'value'=>'0']) !!}

                                <input type="checkbox" name="adult_breakfast">
                                <label for="adult_breakfast">@lang('quickadmin.checkins.fields.adult_breakfast')</label>

                                <input type="checkbox" name="adult_lunch">
                                <label for="adult_lunch">@lang('quickadmin.checkins.fields.adult_lunch')</label>

                                <input type="checkbox" name="adult_afternoon_tea">
                                <label for="adult_afternoon_tea">@lang('quickadmin.checkins.fields.adult_afternoon_tea')</label>

                                <input type="checkbox" name="adult_dinner">
                                <label for="adult_dinner">@lang('quickadmin.checkins.fields.adult_dinner')</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group">
                                {!! Form::label('kids_nutrition_count',trans('Количество питающихся детей')) !!}
                                {!! Form::text('kids_nutrition_count', old('kids_nutrition_count'), ['class' => 'form-control ', 'placeholder' => '', 'value'=>'0']) !!}

                                <input type="checkbox" name="kids_breakfast">
                                <label for="kids_breakfast">@lang('quickadmin.checkins.fields.kids_breakfast')</label>

                                <input type="checkbox" name="kids_lunch">
                                <label for="kids_lunch">@lang('quickadmin.checkins.fields.kids_lunch')</label>

                                <input type="checkbox" name="kids_afternoon_tea">
                                <label for="kids_afternoon_tea">@lang('quickadmin.checkins.fields.kids_afternoon_tea')</label>

                                <input type="checkbox" name="kids_dinner">
                                <label for="kids_dinner">@lang('quickadmin.checkins.fields.kids_dinner')</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">@lang('quickadmin.checkins.fields.pay_panel')</div>
                <div class="panel-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                {!! Form::label('prepay_cache',trans('quickadmin.checkins.fields.prepay_cache').'*') !!}
                                <br>
                                {!! Form::text('prepay_cache', old('prepay_cache'), ['class' => '', 'placeholder' => '0', 'value'=>'0']) !!}
                                <br>

                                {!! Form::label('prepay_kaspi',trans('quickadmin.checkins.fields.prepay_kaspi')) !!}
                                <br>
                                {!! Form::text('prepay_kaspi', old('prepay_kaspi'), ['class' => '', 'placeholder' => '0', 'value'=>'0']) !!}
                                <br>

                                {!! Form::label('prepay_eurasian',trans('quickadmin.checkins.fields.prepay_eurasian')) !!}
                                <br>
                                {!! Form::text('prepay_eurasian', old('prepay_eurasian'), ['class' => '', 'placeholder' => '0', 'value'=>'0']) !!}
                                <br>

                                {!! Form::label('prepay_forte',trans('quickadmin.checkins.fields.prepay_forte')) !!}
                                <br>
                                {!! Form::text('prepay_forte', old('prepay_forte'), ['class' => '', 'placeholder' => '0', 'value'=>'0']) !!}

                            </div>

                            <div class="col">
                                {!! Form::label('post_pay_cache',trans('quickadmin.checkins.fields.post_pay_cache')) !!}
                                <br>
                                {!! Form::text('post_pay_cache', old('post_pay_cache'), ['class' => '', 'placeholder' => '0', 'value'=>'0']) !!}
                                <br>

                                {!! Form::label('post_pay_kaspi',trans('quickadmin.checkins.fields.post_pay_kaspi')) !!}
                                <br>
                                {!! Form::text('post_pay_kaspi', old('post_pay_kaspi'), ['class' => '', 'placeholder' => '0', 'value'=>'0']) !!}
                                <br>

                                {!! Form::label('post_pay_eurasian',trans('quickadmin.checkins.fields.post_pay_eurasian')) !!}
                                <br>
                                {!! Form::text('post_pay_eurasian', old('post_pay_eurasian'), ['class' => '', 'placeholder' => '0', 'value'=>'0']) !!}
                                <br>

                                {!! Form::label('post_pay_forte',trans('quickadmin.checkins.fields.post_pay_forte')) !!}
                                <br>
                                {!! Form::text('post_pay_forte', old('post_pay_forte'), ['class' => '', 'placeholder' => '0', 'value'=>'0']) !!}
                            </div>

                            <div class="col">
                                {!! Form::label('extra_pay_cache',trans('quickadmin.checkins.fields.extra_pay_cache')) !!}
                                <br>
                                {!! Form::text('extra_pay_cache', old('extra_pay_cache'), ['class' => '', 'placeholder' => '0', 'value'=>'0']) !!}
                                <br>

                                {!! Form::label('extra_pay_kaspi',trans('quickadmin.checkins.fields.extra_pay_kaspi')) !!}
                                <br>
                                {!! Form::text('extra_pay_kaspi', old('extra_pay_kaspi'), ['class' => '', 'placeholder' => '0', 'value'=>'0']) !!}
                                <br>

                                {!! Form::label('extra_pay_eurasian',trans('quickadmin.checkins.fields.extra_pay_eurasian')) !!}
                                <br>
                                {!! Form::text('extra_pay_eurasian', old('extra_pay_eurasian'), ['class' => '', 'placeholder' => '0', 'value'=>'0']) !!}
                                <br>

                                {!! Form::label('extra_pay_forte',trans('quickadmin.checkins.fields.extra_pay_forte')) !!}
                                <br>
                                {!! Form::text('extra_pay_forte', old('extra_pay_forte'), ['class' => '', 'placeholder' => '0', 'value'=>'0']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    {!! Form::label('voucher',trans('quickadmin.checkins.fields.voucher')) !!}
                    {!! Form::text('voucher', old('voucher'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('voucher'))
                        <p class="help-block">
                            {{ $errors->first('voucher') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    {!! Form::label('transport',trans('quickadmin.checkins.fields.transport')) !!}
                    {!! Form::text('transport', old('amount'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('transport'))
                        <p class="help-block">
                            {{ $errors->first('transport') }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    {!! Form::label('С_Т',trans('quickadmin.checkins.fields.С_Т')) !!}
                    {!! Form::text('С_Т', old('amount'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('С_Т'))
                        <p class="help-block">
                            {{ $errors->first('transport') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <input type="checkbox" name="additionally_day">
                        <label for="additionally_day">@lang('quickadmin.checkins.fields.additionally_day')</label>

                        <input type="checkbox" name="additionally_night">
                        <label for="additionally_night">@lang('quickadmin.checkins.fields.additionally_night')</label>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-5 form-group">
                    {!! Form::label('amount',trans('quickadmin.checkins.fields.amount').'*') !!}
                    {!! Form::text('amount', old('amount'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('amount'))
                        <p class="help-block">
                            {{ $errors->first('amount') }}
                        </p>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop

@section('javascript')
    @parent
    <script src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script>
        $('.datetimepicker').datetimepicker({
            format: "YYYY-MM-DD HH:mm"
        });
    </script>
@stop