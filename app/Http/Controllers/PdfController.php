<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_Tag;
use App\Models\Tag;


class PdfController extends Controller
{
    private $objProduct;

    public function __construct()
    {
        $this->middleware('auth');

        $this->objProduct=new Product();

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function geraPdf()
    {
         $results = DB::select( DB::raw("SELECT t.name as tag, count(p.id) as produto FROM tag t inner join product_tag pt on t.id=pt.tag_id INNER join product p on pt.product_id = p.id group by t.name order by count(p.id) desc") );
         $data = [          'title' => 'Sumarização',          
                            'heading' => 'Sumarização Tag x Produto',          
                            'content' => $results     
         ];
       
        return \PDF::loadView('products/pdf_view', $data)
        ->download('relatorio-relevancia.pdf');
    }

}
