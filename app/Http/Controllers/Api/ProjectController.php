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
        $projects = Project::orderBy('updated_at',"DESC")
        ->select(['id','type_id','title','slug','description','image', 'updated_at'])
        ->with('type:id,label,color', 'technologies:id,label,color')
        ->paginate(12);

        // per ogni progetto recupero l'immagine da inviare al frontoffice
        foreach($projects as $project){
            $project->image = !empty($project->image) ? asset('/storage/'. $project->image) : 'https://i0.wp.com/thefoodmanager.com/wp-content/uploads/2021/04/placeholder-600x400-1.png?ssl=1';
        }

        // ritorno i dati nel formato json
        return response()->json($projects);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show($slug)
    {
        // prendo il singolo progetto dal database
        $project = Project::select(['id','type_id','title','slug','description','image', 'updated_at'])
        ->where('slug', $slug)
        ->with('type:id,label,color', 'technologies:id,label,color')
        ->first();

        // recupero l'immagine del singolo progetto
        $project->image = !empty($project->image) ? asset('/storage/'. $project->image) : 'https://i0.wp.com/thefoodmanager.com/wp-content/uploads/2021/04/placeholder-600x400-1.png?ssl=1';

        // ritorno i dati nel formato json
        return response()->json($project);
    }

}
