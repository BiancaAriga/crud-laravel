<?php

namespace App\Http\Controllers;

use App\Models\Iten;
use Illuminate\Http\Request;

class ItenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itens = Iten::latest()->paginate(5);
    
        return view('itens.index',compact('itens'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('itens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        Iten::create($request->all());
     
        return redirect()->route('itens.index')
                        ->with('success','Item criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Iten  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Iten $item)
    {
        return view('itens.show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Iten  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Iten $item)
    {
        return view('itens.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Iten  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Iten $item)
    {
        $request->validate([
            'name' => 'required',
        ]);
    
        $item->update($request->all());
    
        return redirect()->route('itens.index')
                        ->with('success','Item atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Iten  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Iten $item)
    {
        $item->delete();
    
        return redirect()->route('itens.index')
                        ->with('success','Item deletado com sucesso.');
    }
}
