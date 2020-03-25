<div class="row align-right">
    <div class="small-12 medium-6 large-3 columns">
        <select id="filter" name="filter">
            <option value=" " {{ request()->is('urlredirects') ? 'selected' : '' }}>All Url Redirects</option>
            <option value="deleted" {{ request()->input('filter') == 'deleted' ? 'selected' : ''}}>Deleted Url Redirects</option>
        </select>
    </div>
</div>