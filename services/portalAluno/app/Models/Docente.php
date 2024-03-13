<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Docente extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;

    protected $table = "docentes";

    protected $primaryKey= "id";

    protected $fillable = [
        'nome',
        'sobrenome'
    ];

    public function disciplinas(): BelongsToMany
    {
        return $this->belongsToMany(Disciplina::class);
    }

}
