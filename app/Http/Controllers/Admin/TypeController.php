<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Auth\StoreTypeRequest;
use App\Http\Requests\Auth\UpdateTypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;


class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //recupero i types dal database
        $types =Type::paginate(10);
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = new Type;
        // ritorno il form aggiungi nuovo tipe
        return view('admin.types.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        // validazione richiesta
        $request->validated();

        //salvataggio type inserito nel form
        $data = $request->all();
        $type = new Type();
        $type->fill($data);
        $type->save();

        // ritorno al dettaglio del tipe dopo il salvataggio
        return redirect()->route('admin.types.show', $type);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     */
    public function show(Type $type)
    {
        // recupero i progetti collegati al type 
        $related_projects = $type->projects()->paginate(10);

        //metodo show per dettaglio singolo type
        return view('admin.types.show', compact('type','related_projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     */
    public function edit(Type $type)
    {
        //ritorno la vista del form di modifica
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        // validazione richiesta
        $request->validated();

        //salvataggio type inserito nel form
        $data = $request->all();
        $type->fill($data);
        $type->save();

        // ritorno al dettaglio del type dopo il salvataggio
        return redirect()->route('admin.types.show', $type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        // cancello Type
        $type->delete();
        // ritorno alla lista 
        return redirect()->route('admin.types.index');
    }
}
