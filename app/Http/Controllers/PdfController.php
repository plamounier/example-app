<?php

namespace App\Http\Controllers;

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


        $tags=Tag::all();
       
       
        $listaprodutos=$this->objProduct->with('tag')->paginate(3);
        //return View::make('products.index')
         //      ->with('listaprodutos', $listaprodutos);

        return \PDF::loadView('products.index', compact('tags', 'listaprodutos'))->setOptions(['defaultFont' => 'sans-serif'])
                    // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                    ->download('relatorio-relevancia.pdf');
    }

}
