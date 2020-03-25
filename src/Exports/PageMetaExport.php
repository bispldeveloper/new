<?php namespace EyeCore\Exports;

use EyeCore\Modules\Pages\Models\Page;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PageMetaExport implements FromQuery, WithHeadings
{
    use Exportable;

    /**
     * @return mixed
     */
    public function query()
    {
        return Page::query()->select('id', 'title', 'meta_title', 'meta_description', 'meta_canonical');
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return ['ID', 'Name', 'Meta Title', 'Meta Description', 'Meta Canonical'];
    }

}
