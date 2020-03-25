<div class="row align-right">
    <div class="small-12 medium-6 large-3 columns">
        <select id="filter" name="filter">
            <option value=" " {{ request()->is('slideshows') ? 'selected' : '' }}>All Slideshows</option>
            <option value="published" {{ request()->input('filter') == 'published' ? 'selected' : '' }}>Published Slideshows</option>
            <option value="hidden" {{ request()->input('filter') == 'hidden' ? 'selected' : '' }}>Hidden Slideshows</option>
            <option value="deleted" {{ request()->input('filter') == 'deleted' ? 'selected' : ''}}>Deleted Slideshows</option>
        </select>
    </div>
</div>