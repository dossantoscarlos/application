package schemas

import "gorm.io/gorm"

type Disciplina struct {
	gorm.Model
	Nome string
}
