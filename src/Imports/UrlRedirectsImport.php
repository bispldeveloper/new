<?php namespace EyeCore\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use EyeCore\Modules\UrlRedirects\Models\UrlRedirect;

class UrlRedirectsImport implements ToCollection, WithHeadingRow
{

    /**
     * @param Collection $rows
     */
    public function collection(Collection $rows)
    {
        UrlRedirect::truncate();

        foreach ($rows as $row) {
            UrlRedirect::create([
                'from' => $row['from'],
                'to' => $row['to'],
            ]);
        }
    }

}
