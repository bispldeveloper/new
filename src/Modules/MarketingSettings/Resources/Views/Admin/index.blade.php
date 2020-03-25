@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Marketing Settings
@stop

@section('content')

    <div class="row">
        <div class="small-12 medium-6 columns">
            <div class="module-header">
                <div class="row align-middle">
                    <div class="small-12 medium-6 columns">
                        <p class="module-title">Marketing Settings</p>
                    </div>
                    <div class="small-12 medium-6 columns">
                        <ul class="button-list">
                            <li>
                                <a href="{{ route('mc-admin.marketingsettings.create') }}" class="button warning"> Create New Setting</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content-block">
                <p class="content-block-title">Update Settings</p>
                {!! Form::model(['route' => ['mc-admin.marketingsettings.update'], 'method' => 'POST']) !!}
                    @foreach($marketingsettings as $marketingsetting)
                        <div class="row">
                            <div class="small-12 columns">
                                <label>{!! Form::label($marketingsetting->setting, ucwords(str_replace('_', ' ', $marketingsetting->setting)))!!}</label>
                                {!! Form::text($marketingsetting->setting, $marketingsetting->value) !!}
                            </div>
                        </div>
                    @endforeach
                    <div class="row">
                        <div class="small-12 columns text-right">
                            {!! Form::submit('Save Settings', ['class' => 'button success']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="small-12 large-6 columns">
            <div class="module-header">
                <div class="row align-middle">
                    <div class="small-12 medium-6 columns">
                        <p class="module-title">Page Meta</p>
                    </div>
                    <div class="small-12 medium-6 columns">
                        <ul class="button-list">
                            <li>
                                <a href="{{ route('mc-admin.marketingmeta.export') }}" class="button info"> Export</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content-block">
                {!! Form::open(['route' => 'mc-admin.marketingmeta.import', 'files' => true]) !!}
                    {!! Form::label('Choose Excel File') !!}
                    {!! Form::file('file') !!}
                    <div class="text-right">
                        {!! Form::submit('Import', ['class' => 'button success']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop
