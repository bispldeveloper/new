@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    {{ $pageformenquiry->pageform->name }} Enquiry
@stop

@section('content')
    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 medium-6 columns">
                <p class="module-title">{{ $pageformenquiry->pageform->name }} Enquiry</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 large-8 columns">
            <div class="content-block">
                <p><b>Referral URL:</b> <a href="{{ $pageformenquiry->referral_url }}">{{ $pageformenquiry->referral_url }}</a></p>
                @foreach($pageformenquiry->fields as $name => $value)
                    <p><b>{{ ucwords(str_replace('_', ' ', $name)) }}:</b> {{ $value }}</p>
                @endforeach
            </div>
        </div>
        <div class="small-12 large-4 columns">
            <div class="content-block">
                {!! Form::model($pageformenquiry, ['route' => ['mc-admin.pageformenquiries.update', $pageformenquiry->id], 'method' => 'PUT']) !!}
                    <div class="row">
                        <div class="small-12 columns">
                            {!! Form::label('status', 'Status', ['class' => $errors->first('status', 'is-invalid-label')])!!}
                            {!! Form::select('status', ['received' => 'Received', 'in_progress' => 'In Progress', 'complete' => 'Complete'], null, ['class' => $errors->first('status', 'is-invalid-input')])!!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-12 columns">
                            {!! Form::label('notes', 'Admin Notes', ['class' => $errors->first('notes', 'is-invalid-label')])!!}
                            {!! Form::textarea('notes', null, ['class' => $errors->first('notes', 'is-invalid-input'), 'rows' => 5]) !!}
                            {!! $errors->first('notes', '<span class="form-error is-visible">:message</span>' ) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-12 columns text-right">
                            {!! Form::submit('Update', ['class' => 'button success']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop