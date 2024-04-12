<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // prendo dati dal database
        $projects = Project::orderBy('id',"DESC")
        ->select(['id','type_id','title','description','image'])
        ->with('type:id,label,color', 'technologies:id,label,color')
        ->paginate(10);

        // ritorno i dati nel formato json
        return response()->json($projects);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($id)
    {
        //
    }

}
