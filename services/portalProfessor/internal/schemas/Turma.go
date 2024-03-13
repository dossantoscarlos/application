package schemas

import (
	"gorm.io/gorm"
)

type Turma struct {
	gorm.Model
	ID          uint
	CodigoTurma int `json:"codigoTurma"`
}
