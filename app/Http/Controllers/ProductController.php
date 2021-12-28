<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Product_Tag;
use App\Models\Tag;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $objProduct;
    private $objTag;

    public function __construct()
    {
        $this->middleware('auth');

        $this->objProduct=new Product();
        $this->objTag=new Tag();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaprodutos=$this->objProduct->with('tag')->paginate(5);
        return View::make('products.index')
               ->with('listaprodutos', $listaprodutos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags=Tag::all();
        //$listatags=$this->objTag->all();  
        return view('products.create',compact('tags'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $produto = Product::create($request->all());

       /* $cadastra=$this->objProduct->create([
            'name'=>$request->name
        ]);
        
        if($cadastra){
            return redirect('products');
        }
    */
        $tags = $request->input('tags', []);
        for ($tag=0; $tag < count($tags); $tag++) {
            if ($tags[$tag] != '') {
                $produto->tag()->attach($tags[$tag]);
            }
        }
        return redirect('products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $produto=$this->objProduct->with('tag')->find($id);
        return View::make('products.show')
               ->with('produto', $produto);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produto=$this->objProduct->find($id);
        $tags=Tag::all();
        $produto->load('tag');
        //$produto=$this->objProduct->find($id);
        //return View::make('products.create')->with('produto', $produto);
        return view('products.edit', compact('tags', 'produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
       /*=>$id]
        $this->objProduct->where(['id')->update([
            'name'=>$request->name
        ]);
        return redirect('products');
        */

        $produto=$this->objProduct->find($id);
        $produto->update($request->all());

        $produto->tag()->detach();
        $tags = $request->input('tags', []);
        for ($tag=0; $tag < count($tags); $tag++) {
            if ($tags[$tag] != '') {
                $produto->tag()->attach($tags[$tag]);
            }
        }
        return redirect('products');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objProduct->destroy($id);
        return ($del)?"sim":"não";
    }



}
