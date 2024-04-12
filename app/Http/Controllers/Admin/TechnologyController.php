<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\StoreTechnologyRequest;
use App\Http\Requests\Auth\UpdateTechnologyRequest;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //recupero le technologies dal database
        $technologies =Technology::paginate(10);
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = new Technology;
        // ritorno il form aggiungi nuova tecnologia
        return view('admin.technologies.create', compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTechnologyRequest $request)
    {
        // validazione richiesta
        $request->validated();

        //salvataggio tecnologia inserita nel form
        $data = $request->all();
        $technology = new Technology();
        $technology->fill($data);
        $technology->save();

        // ritorno al dettaglio della tecnologia dopo il salvataggio
        return redirect()->route('admin.technologies.show', $technology);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     */
    public function show(Technology $technology)
    {
        //metodo show per dettaglio singola tecnologia
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Technology  $technology
     */
    public function edit(Technology $technology)
    {
        //ritorno la vista del form di modifica
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTechnologyRequest $request, Technology $technology)
    {
        // validazione richiesta
        $request->validated();
        
        //salvataggio tecnologia inserita nel form
        $data = $request->all();
        $technology->fill($data);
        $technology->save();

        // ritorno al dettaglio della tecnologia dopo il salvataggio
        return redirect()->route('admin.technologies.show', $technology);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Technology  $technology
     */
    public function destroy(Technology $technology)
    {
        //cancello tecnologia
        $technology->delete();
        // ritorno alla lista
        return redirect()->route('admin.technologies.index');
    }
}
