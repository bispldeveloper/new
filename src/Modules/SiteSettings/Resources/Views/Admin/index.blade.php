@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Site Settings
@stop

@section('content')

    <div class="row">
        <div class="small-12 medium-6 columns">
            <div class="module-header">
                <div class="row align-middle">
                    <div class="small-12 medium-6 columns">
                        <p class="module-title">Site Settings</p>
                    </div>
                    <div class="small-12 medium-6 columns">
                        <ul class="button-list">
                            <li>
                                <a href="{{ route('mc-admin.sitesettings.create') }}" class="button warning"> Create New Setting</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="content-block">
                <p class="content-block-title">Update Site Settings</p>
                <div class="content">
                    {!! Form::model(['route' => ['mc-admin.sitesettings.update'], 'method' => 'POST']) !!}
                    @foreach($sitesettings as $sitesetting)
                        <div class="row">
                            <div class="small-12 columns">
                                <label>{!! Form::label($sitesetting->setting, ucwords(str_replace('_', ' ', $sitesetting->setting)))!!}</label>
                                @if($sitesetting->type == 'text')
                                    {!! Form::text($sitesetting->setting, $sitesetting->value) !!}
                                @elseif($sitesetting->type == 'truefalse')
                                    {!! Form::select($sitesetting->setting, [0 => 'No', 1 => 'Yes'], $sitesetting->value) !!}
                                @elseif($sitesetting->type == 'image')
                                    <div class="input-group">
                                        {!! Form::text($sitesetting->setting, $sitesetting->value, ['class' => 'input-group-field']) !!}
                                        <div class="input-group-button">
                                            <input type="submit" class="button black moxie-image-browse" data-moxie-field="{{ $sitesetting->setting }}" value="Browse">
                                        </div>
                                    </div>
                                @elseif($sitesetting->type == 'textarea')
                                    {!! Form::textarea($sitesetting->setting, $sitesetting->value, ['class' => $sitesetting->class]) !!}
                                @endif
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
        </div>
    </div>

@stop