<div class="row align-right">
    <div class="small-12 medium-6 large-3 columns">
        <select id="filter" name="filter">
            <option value=" " {{ request()->is('users') ? 'selected' : '' }}>All Users</option>
            <option value="deleted" {{ request()->input('filter') == 'deleted' ? 'selected' : ''}}>Deleted Users</option>
        </select>
    </div>
</div>