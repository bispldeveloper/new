<div class="nav-block">
    <p class="title">Site</p>
    <ul class="menu vertical">
        @foreach($adminNavGroups['Site'] as $option)
            @if(auth()->guard('admins')->user()->admingroup->hasPermission($option['route']))
                <li data-sort-order="{{ $option['sort_order'] }}">
                    <a class="{{ Route::current()->getName() == $option['route'] ? 'active' : ''  }}" href="{{ route($option['route']) }}"><i class="{{ $option['icon'] }}"></i> {{ $option['name'] }}</a>
                </li>
            @endif
        @endforeach
    </ul>
</div>

@if(auth()->guard('admins')->user()->admingroup->hasPermission('mc-admin.pageformenquiries.index'))
    <div class="nav-block">
        <p class="title">Enquiries</p>
        <ul class="menu vertical">
            @foreach($adminNavGroups['Enquiries'] as $option)
                @if(auth()->guard('admins')->user()->admingroup->hasPermission($option['route']))
                    <li data-sort-order="{{ $option['sort_order'] }}">
                        <a class="{{ Route::current()->getName() == $option['route'] ? 'active' : ''  }}" href="{{ route($option['route']) }}"><i class="{{ $option['icon'] }}"></i> {{ $option['name'] }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endif

@if(auth()->guard('admins')->user()->admingroup->hasPermission('mc-admin.marketingreports.index'))
    <div class="nav-block">
        <p class="title">Marketing Reports</p>
        <ul class="menu vertical">
            @foreach($adminNavGroups['Marketing Reports'] as $option)
                @if(auth()->guard('admins')->user()->admingroup->hasPermission($option['route']))
                    <li data-sort-order="{{ $option['sort_order'] }}">
                        <a class="{{ Route::current()->getName() == $option['route'] ? 'active' : ''  }}" href="{{ route($option['route']) }}"><i class="{{ $option['icon'] }}"></i> {{ $option['name'] }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endif

@if(auth()->guard('admins')->user()->admingroup->hasPermission('mc-admin.settings.index'))
    <div class="nav-block">
        <p class="title">Settings</p>
        <ul class="menu vertical">
            @foreach($adminNavGroups['Settings'] as $option)
                @if(auth()->guard('admins')->user()->admingroup->hasPermission($option['route']))
                    <li data-sort-order="{{ $option['sort_order'] }}">
                        <a class="{{ Route::current()->getName() == $option['route'] ? 'active' : ''  }}" href="{{ route($option['route']) }}"><i class="{{ $option['icon'] }}"></i> {{ $option['name'] }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endif

@if(auth()->guard('admins')->user()->admingroup_id == 1)
    <div class="nav-block">
        <p class="title">Development</p>
        <ul class="menu vertical">
            @foreach($adminNavGroups['Development'] as $option)
                @if(auth()->guard('admins')->user()->admingroup->hasPermission($option['route']))
                    <li data-sort-order="{{ $option['sort_order'] }}">
                        <a class="{{ Route::current()->getName() == $option['route'] ? 'active' : ''  }}" href="{{ route($option['route']) }}"><i class="{{ $option['icon'] }}"></i> {{ $option['name'] }}</a>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endif
