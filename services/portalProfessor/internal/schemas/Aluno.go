package schemas

import "gorm.io/gorm"

type Aluno struct {
	gorm.Model
	NomeCompleto string `json:"nomeCompleto"`
	TurmaId      string `json:"turma"`
	Matricula    string `json:"matricula"`
}
