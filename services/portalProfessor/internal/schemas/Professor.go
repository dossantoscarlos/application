package schemas

import (
	"gorm.io/gorm"
)

type Professor struct {
	gorm.Model
	Nome      string `json:"nome"`
	Sobrenome string `json:"sobrenome"`
	Matricula string `json:"matricula"`
	Formacao  int    `json:"formacao"`
	DominioID int
}
