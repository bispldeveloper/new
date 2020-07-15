<div class="row align-right" id="submenu">
    <div class="small-12 medium-6 large-3 columns">
        <select id="filter" name="filter">
            <option value=" " {{ request()->is('pageformenquiries') ? 'selected' : '' }}>All Enquiries</option>
            <option value="received" {{ request()->input('filter') == 'received' ? 'selected' : ''}}>Received Enquiries</option>
            <option value="in_progress" {{ request()->input('filter') == 'in_progress' ? 'selected' : ''}}>In Progress Enquiries</option>
            <option value="complete" {{ request()->input('filter') == 'complete' ? 'selected' : ''}}>Complete Enquiries</option>
        </select>
    </div>
</div>