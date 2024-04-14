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
        ->select(['id','type_id','title','description','image', 'updated_at'])
        ->with('type:id,label,color', 'technologies:id,label,color')
        ->paginate(12);

        // per ogni progetto recupero l'immagine da inviare al frontoffice
        foreach($projects as $project){
            $project->image = !empty($project->image) ? asset('/storage/'. $project->image) : 'https://placehold.co/600x400';
        }

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
