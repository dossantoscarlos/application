<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Responsavel extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuids;

    protected $table = "responsaveis";

    protected $primaryKey = 'id';

    public function alunos() : BelongsToMany 
    {
        return $this->belongsToMany(Aluno::class);
    }
}
