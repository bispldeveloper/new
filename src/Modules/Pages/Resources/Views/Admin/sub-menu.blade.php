<div class="row align-right">
    <div class="small-12 medium-5 large-3 columns">
        <div id="search-block" style="position: relative;">
            {!! Form::select('pages', [], null, ['id' => 'pages']) !!}
        </div>
    </div>
    <div class="small-12 medium-2 large-6 columns">&nbsp;</div>
    <div class="small-12 medium-5 large-3 columns">
        <select id="filter" name="filter">
            <option value=" " {{ request()->is('pages') ? 'selected' : '' }}>All Pages</option>
            <option value="published"  {{ request()->input('filter') == 'published' ? 'selected' : '' }}>Published Pages</option>
            <option value="hidden"  {{ request()->input('filter') == 'hidden' ? 'selected' : '' }}>Hidden Pages</option>
            <option value="deleted" {{ request()->input('filter') == 'deleted' ? 'selected' : ''}}>Deleted Pages</option>
        </select>
    </div>
</div>