<div class="row align-right" id="submenu">
    <div class="small-12 medium-6 large-3 columns">
        <select id="filter" name="filter">
            <option value=" " {{ request()->is('admins') ? 'selected' : '' }}>All Admin Groups</option>
            <option value="deleted" {{ request()->input('filter') == 'deleted' ? 'selected' : ''}}>Deleted Admin Groups</option>
        </select>
    </div>
</div>