<?php

namespace App\Http\Controllers;

use App\Exports\ProdutoExport;
use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class PdfCsvController extends Controller
{
    /*
    private $model;
    public function __construct(Produto $model)
    {
        $this->model = $model;
    }


    public function index()
    {
        $data['model'] = $this->model->all();
        return PDF::loadView('PdfView', $data)
            ->stream();
    }
    */

    public function index(){
        $data = Produto::all();

        return view('PdfCsv', ['data' => $data]);
    }

    public function gerarPdf(){
        $data = Produto::all();

        $pdf = PDF:: loadview('PdfCsv', ['data' => $data]);

         return $pdf->download('produto.pdf');
    }

    public function gerarCsv(){
        return Excel::download(new ProdutoExport, 'produtos.csv');
    }
}
