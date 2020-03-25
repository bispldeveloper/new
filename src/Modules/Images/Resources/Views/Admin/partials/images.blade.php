<div class="row">
    <div class="small-12 columns">
        <div class="table-block">
            <div class="table-block-header">
                <div class="row align-middle">
                    <div class="small-6 columns">
                        <p class="table-block-title">Slideshow Images</p>
                    </div>
                    <div class="small-6 columns text-right">
                        <a onclick="formMultipleImages('{{ $model->id }}', '{{ route('mc-admin.images.attach', ['model' => get_class($model)]) }}');" class="button warning">Add Images</a>
                    </div>
                </div>
            </div>
            <div class="table-block-content">
                <table class="data-table" id="sortable">
                    <thead>
                    <tr>
                        <th></th>
                        <th>Image</th>
                        <th>Last Updated</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                        @if ($model->images->count() > 0)
                            @foreach ($model->images as $image)
                                <tr id="images_{{ $image->id }}">
                                    <td class="handle"><i class="fa fa-arrows-v"></i></td>
                                    <td data-label="Image"><img src="{{ ImageResizer::resize($image->filename, 100, 100) }}"></td>
                                    <td data-label="Last Updated"><span class="secondary">{{ $image->present()->getUpdatedAt }}</span></td>
                                    <td>
{{--                                        <a title="Edit Image" href="{{ route('mc-admin.slides.edit', $slide->id) }}" class="icon-button trigger-reveal info"><i class="far fa-edit"></i></a>--}}
                                        <a title="Delete Image" href="{{ route('mc-admin.images.destroy', $image->id) }}" class="icon-button alert"><i class="far fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="no-results">
                                <td colspan="5" class="text-center">No images added yet</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
