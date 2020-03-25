<?php namespace EyeCore\Imports;

use EyeCore\Modules\Pages\Models\Page;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PageMetaImport implements ToCollection, WithHeadingRow
{

    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Page::where('id', $row['id'])->update([
                'meta_title' => $row['meta_title'],
                'meta_description' => $row['meta_description'],
                'meta_canonical' => $row['meta_canonical']
            ]);
        }
    }

}
