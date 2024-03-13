package schemas

import (
	"gorm.io/gorm"
)

type Diario struct {
	gorm.Model
	ProfessorID int
}
