<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuids;


    protected $table="alunos";

    protected $primaryKey = "id";

    protected $fillable = [
        'nome',
        'sobrenome',
        'sexo',
        'data_nascimento', 
        'turma_codigo'
    ];

    protected $with =['matricula'];
    
    public function cadastraAluno(array $data) : Aluno
    {
        $aluno = self::create([
            'nome' => $data['nome'],
            'sobrenome' => $data['sobrenome'],
            'sexo' => $data['sexo'],
            'data_nascimento' => $data['dataNascimento']
        ]);

        $matricula = new Matricula;
        
        $matricula->generetedMatricula($aluno, $data['turma_codigo']);

        return $aluno;
    }

    public function documentos(): HasMany
    {
        return $this->hasMany(Documento::class);
    }

    public function responsaveis(): BelongsToMany
    {
        return $this->belongsToMany(Responsavel::class);
    }

    public function matricula() : HasOne
    {
        return $this->hasOne(Matricula::class);
    }
}
