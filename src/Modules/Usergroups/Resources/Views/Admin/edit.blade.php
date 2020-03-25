@extends('Admins::Admin.layouts.dashboard')

@section('moduleTitle')
    Update User Group
@stop

@section('content')

    <div class="module-header">
        <div class="row align-middle">
            <div class="small-12 columns">
                <p class="module-title"> Update User Group: {{ $usergroup->name }}</p>
            </div>
        </div>
    </div>

    {!! Form::model($usergroup, ['route' => ['mc-admin.usergroups.update', $usergroup->id], 'method' => 'PUT']) !!}
    <div class="row">
        <div class="small-12 medium-6 columns">
            <div class="content-block">
                <p class="content-block-title">Update User Group</p>
                <div class="content">
                    <div class="row">
                        <div class="small-12 columns">
                            {!! Form::label('name', 'Name', ['class' => $errors->first('name', 'is-invalid-label')])!!}
                            {!! Form::text('name', null, ['class' => $errors->first('name', 'is-invalid-input')]) !!}
                            {!! $errors->first('name', '<span class="form-error is-visible">:message</span>' ) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="small-12 columns">
            <div class="table-block">
                <div class="table-block-header">
                    <p class="table-block-title">Update Permissions</p>
                </div>
                <div class="table-block-content">
                    <table class="data-table">
                        <thead>
                        <th>All</th>
                        <th>Module</th>
                        <th>Permissions</th>
                        </thead>
                        <tbody>
                        @foreach($availablePermissions as $name => $permissions)
                            <tr>
                                <td> {!! Form::checkbox('check-all', null, null, ['class' => 'check-all']) !!}</td>
                                <td>{{ $name }}</td>
                                <td class="permissions-checkbox">
                                    @foreach($permissions as $name => $permission)
                                        {!! Form::checkbox('permissions['.$permission.']', null, (isset($admingroup->permissions[$permission]) ? true : false), ['id' => 'permissions['.$permission.']']) !!}
                                        {!! Form::label('permissions['.$permission.']', ucfirst($name)) !!}
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="button-block">
                <div class="row">
                    <div class="small-12 columns text-right">
                        {!! Form::submit('Save User Group', ['class' => 'button success']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

@stop

@section('scripts')
    @parent
    <script>
        $(document).ready(function () {
            $(document).on('click', '.check-all', function () {
                if ($(this).is(":checked")) {
                    $(this).parent().siblings('.permissions-checkbox').find('input[type="checkbox"]').prop('checked', 'checked');
                } else if ($(this).is(":not(:checked)")) {
                    $(this).parent().siblings('.permissions-checkbox').find('input[type="checkbox"]').prop('checked', false);
                }
            });
        });
        $(window).load(function () {
            $.each($('.permissions-checkbox'), function (key, val) {
                var all = true;
                $.each($(this).find('input[type="checkbox"]'), function (k, v) {
                    if (!$(this).is(':checked')) {
                        all = false;
                    }
                });
                if (all == true) {
                    $(this).parent().find('.check-all').prop('checked', 'checked');
                }
            });
        });
    </script>
@stop

