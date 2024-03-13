package schemas

import (
	"gorm.io/gorm"
)

type Formacao struct {
	gorm.Model
	Nome      string `gorm:"unique" json:"nome"`
	Descricao string `json:"descricao"`
}
