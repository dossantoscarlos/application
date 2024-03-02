<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documento extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuids;

    protected $table="documentos";

    protected $primaryKey = 'id';

    public function aluno() : BelongsTo
    {
        return $this->belongsTo(Aluno::class, 'aluno_id', 'id');
    }
}
