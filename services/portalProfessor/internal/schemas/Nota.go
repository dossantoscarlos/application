package schemas

import "gorm.io/gorm"

type Nota struct {
	gorm.Model
	AlunoID        int
	ValorNotaTotal int
	Periodo        string
}
