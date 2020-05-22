<div class="row align-right">
    <div class="small-12 medium-5 large-3 columns">
        <div id="search-block" style="position: relative;">
            {!! Form::select('admins', [], null, ['id' => 'admins']) !!}
        </div>
    </div>
    <div class="small-12 medium-2 large-6 columns">&nbsp;</div>
    <div class="small-12 medium-6 large-3 columns">
        <select id="filter" name="filter">
            <option value=" " {{ request()->is('admins') ? 'selected' : '' }}>All Admins</option>
            <option value="deleted" {{ request()->input('filter') == 'deleted' ? 'selected' : ''}}>Deleted Admins</option>
        </select>
    </div>
</div>