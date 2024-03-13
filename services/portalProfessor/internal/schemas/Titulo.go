package schemas

import "gorm.io/gorm"

type Titulo struct {
	gorm.Model
	Nome string
}
