@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Edit Navigation Item
@stop

@section('content')

    <div class="row">
        <div class="small-12 columns">
            <div class="content-block">
                <p class="content-block-title">Are you sure you want to delete this record.</p>
                <div class="content">
                    {!! Form::model($menuitem, ['route' => ['mc-admin.navmenuitems.update', $menuitem->id], 'method' => 'PATCH']) !!}
                    @include('NavMenuItem::Admin.form')
                    <div class="row">
                        <div class="small-6 columns">
                            <a href="#" class="button expanded secondary" data-close>Cancel</a>
                        </div>
                        <div class="small-6 columns">
                            {!! Form::submit('Save Menu Item', ['class' => 'button expanded success']) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop
