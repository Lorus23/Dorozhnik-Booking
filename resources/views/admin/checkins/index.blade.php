@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.checkins.title')</h3>
    @can('checkin_create')
    <p>
        <a href="{{ route('admin.checkins.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('checkin_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.checkins.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.checkins.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($checkins) > 0 ? 'datatable' : '' }} @can('checkin_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('checkin_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th>@lang('quickadmin.checkins.fields.booking')</th>
                        <th>@lang('quickadmin.checkins.fields.adult_count')</th>
                        <th>@lang('quickadmin.checkins.fields.kids_count')</th>
                        <th>@lang('quickadmin.checkins.fields.check_in_date')</th>
                        <th>@lang('quickadmin.checkins.fields.check_out_date')</th>
                        <th>@lang('quickadmin.checkins.fields.debt')</th>
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($checkins) > 0)
                        @foreach ($checkins as $checkin)
                            <tr data-entry-id="{{ $checkin->id }}">
                                @can('booking_delete')
                                    @if ( request('show_deleted') != 1 )<td></td>@endif
                                @endcan

                                <td field-key='booking'>{{ $checkin->booking_id }}</td>
                                <td field-key='adult_count'>{{ $checkin->adult_count }}</td>
                                <td field-key='kids_count'>{{ $checkin->kids_count }}</td>
                                <td field-key='check_in_date'>{{ $checkin->check_in_date }}</td>
                                <td field-key='check_out_date'>{{ $checkin->check_out_date }}</td>
                                <td field-key='additional_information'>{!! $checkin->debt !!}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('booking_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.bookings.restore', $checkin->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                    @can('booking_delete')
                                                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.bookings.perma_del', $checkin->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('checkin_view')
                                    <a href="{{ route('admin.checkins.show',[$checkin->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_detail')</a>
                                    @endcan
                                    @can('checkin_edit')
                                    <a href="{{ route('admin.checkins.edit',[$checkin->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('checkin_delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.checkins.destroy', $checkin->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10">@lang('quickadmin.qa_no_entries_in_table')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('javascript') 
    <script>
        @can('booking_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.bookings.mass_destroy') }}'; @endif
        @endcan

    </script>
@endsection