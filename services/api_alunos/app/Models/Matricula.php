<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Facades\Hash;

class Matricula extends Model
{
    use HasFactory;
    use HasUuids;
    use SoftDeletes;


    protected $table = "matriculas";

    protected $primaryKey = "id";

    protected $fillable = [
        'codigo',
        'turma_id',
        'ativo'
    ];

    public function generetedMatricula(Aluno $aluno, ?string $codigoTurma) : Matricula 
    {
        $turma = Turma::whereNumero($codigoTurma)->first();

        $matricula = $aluno->matricula()->create([
            'codigo' => Hash::make(now()),
            'turma_id' => $turma->id, 
            'ativo'=> true
        ]);
        
        return $matricula;
    }



    public function turma(): BelongsTo
    {
        return $this->belongsTo(Turma::class);
    }

    public function aluno() : BelongsTo
    {
        return $this->belongsTo(Aluno::class);
    }
}
