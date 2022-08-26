<?php

namespace App\Exports;

use App\Models\Produto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProdutoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Produto::select('id', 'nome', 'ativo', 'quantidade')->get();
    }

    public function headings() : array{
        return ["ID", "NOME", "ATIVO", "QUANTIDADE", "CATEGORIA"];
    }
}
