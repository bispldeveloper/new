<div class="row align-right" id="submenu">
    <div class="small-12 medium-5 large-3 columns">
        <div id="search-block" style="position: relative;">
            {!! Form::select('slideshows', [], null, ['id' => 'slideshows']) !!}
        </div>
    </div>
    <div class="small-12 medium-2 large-6 columns">&nbsp;</div>
    <div class="small-12 medium-5 large-3 columns">
        <select id="filter" name="filter">
            <option value=" " {{ request()->is('slideshows') ? 'selected' : '' }}>All Slideshows</option>
            <option value="published" {{ request()->input('filter') == 'published' ? 'selected' : '' }}>Published Slideshows</option>
            <option value="hidden" {{ request()->input('filter') == 'hidden' ? 'selected' : '' }}>Hidden Slideshows</option>
            <option value="deleted" {{ request()->input('filter') == 'deleted' ? 'selected' : ''}}>Deleted Slideshows</option>
        </select>
    </div>
</div>