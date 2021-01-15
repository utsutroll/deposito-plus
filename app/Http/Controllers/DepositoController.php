<?php

namespace App\Http\Controllers;

use App\Deposito;
use Illuminate\Http\Request;

class DepositoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $request->validate([
            'panel' => 'required|unique:jumper,nombre',
            'link' => 'required|max:103'
        ]);

        $deposito = new Deposito;
        $deposito->nombre = $request->panel;
        $deposito->link = $request->link;
        
        $deposito->save();

        return response()->json($deposito);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deposito  $deposito
     * @return \Illuminate\Http\Response
     */
    public function show(Deposito $deposito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deposito  $deposito
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposito $deposito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deposito  $deposito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposito $deposito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deposito  $deposito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposito $deposito)
    {
        //
    }

    public function buscar(Request $request){

        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = Deposito::select("nombre", "link")
            		->where('nombre',$search)
            		->get();
        }

        return response()->json($data);
    }

    public function add (Request $request)
    {
        $request->validate([
            'panel' => 'required|unique:jumper,nombre',
            'apik' => 'required|max:103'
        ]);

        $deposito = new Deposito;
        $deposito->nombre = $request->panel;
        $deposito->link = $request->apik;
        
        $deposito->save();

        return response()->json($deposito);

    }

}
