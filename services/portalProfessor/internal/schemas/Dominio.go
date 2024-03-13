package schemas

import "gorm.io/gorm"

type Dominio struct {
	gorm.Model
	DisciplinaID int
	ProfessorID  int
}
