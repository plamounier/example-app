<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Models\Product_Tag;

class TagController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $objTag;

    public function __construct()
    {
        $this->middleware('auth');

        $this->objTag=new Tag();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listatags=$this->objTag::paginate(5);
        return View::make('tags.index')
               ->with('listatags', $listatags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $listatags=$this->objTag->all();       
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        $cadastra=$this->objTag->create([
            'name'=>$request->name
        ]);
        if($cadastra){
            return redirect('tags');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $tag=$this->objTag->find($id);
        return View::make('tags.show')
               ->with('tag', $tag);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag=$this->objTag->find($id);
        return View::make('tags.create')->with('tag', $tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TagRequest $request, $id)
    {
        $this->objTag->where(['id'=>$id])->update([
            'name'=>$request->name
        ]);
        return redirect('tags');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objTag->destroy($id);
        return ($del)?"sim":"não";
    }
}
