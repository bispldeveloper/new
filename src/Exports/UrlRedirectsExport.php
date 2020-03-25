<?php namespace EyeCore\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use EyeCore\Modules\UrlRedirects\Models\UrlRedirect;

class UrlRedirectsExport implements FromQuery, WithHeadings
{
    use Exportable;

    /**
     * @return mixed
     */
    public function query()
    {
        return UrlRedirect::query()->select('from', 'to');
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return ['From', 'To'];
    }

}
