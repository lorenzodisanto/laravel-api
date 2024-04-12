<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Type;

class Project extends Model
{
    use HasFactory;

    // aggiungo fillable per ricevere i dati dal form
    protected $fillable = ["type_id","title", "link", "description"];

    // relazione one to many tra tabella Project e Type
    public function type(){
        return $this->belongsTo(Type::class);
    }

    // relazione many to many tra tabella Project e Technology 
    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
