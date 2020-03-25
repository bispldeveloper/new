@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    File Manager
@stop

@section('content')
    <div class="module-header">
        <div class="row">
            <div class="small-12 columns">
                <p class="module-title">File Manager</p>
            </div>
        </div>
    </div>
     <div class="row">
        <div class="small-12 columns">
            <div class="table-block">
                <iframe style="width:100%; min-height: 750px;" src="/mc-admin/file-manager-framed" frameborder="0"></iframe>
            </div>
        </div>
    </div>
@stop

@section('scripts')
@parent

@stop
