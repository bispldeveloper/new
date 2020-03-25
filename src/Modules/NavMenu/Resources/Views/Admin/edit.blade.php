@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
   Navigation
@stop

@section('content')

    <div class="module-header">
        <div class="row">
            <div class="small-12 columns">
                <p class="module-title">Navigation</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="small-12 large-6 columns">
            <div class="content-block">
                <p class="content-block-title">Add item to Menu</p>
                <div class="content">
                    {!! Form::open(['route' => 'mc-admin.navmenuitems.store']) !!}
                        @include('NavMenuItem::Admin.form')
                        <div class="row">
                            <div class="small-12 columns text-right">
                                {!! Form::submit('Add Menu Item', ['class' => 'button success']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="small-12 large-6 columns">
            <div class="content-block">
                <p class="content-block-title">Menu Details</p>
                <div class="content">
                    {!! Form::model($navmenu, ['route' => ['mc-admin.navmenus.update', $navmenu->id], 'method' => 'PUT']) !!}
                        @include('NavMenu::Admin.form', ['submit' => 'Save Menu'])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
    @parent
    @include('Admins::Admin.scripts.nestable-scripts')
@stop
