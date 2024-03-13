<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Curso extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuids;

    protected $table = "cursos";
    
    protected $primaryKey = "id";


    protected $fillable = [
        'numero'
    ];


    public function disciplinas () : BelongsToMany
    {
        return $this->belongsToMany(Disciplina::class);
    }

    public function turmas () : HasMany 
    {
        return $this->hasMany(Turma::class);
    }
}
