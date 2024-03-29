package config

import (
	"fmt"

	"github.com/gin-gonic/gin"
	"gorm.io/gorm"
)

var (
	db     *gorm.DB
	logger *Logger
)

func Init() error {
	var err error

	db, err = InitiliazerSQLite()

	if err != nil {
		return fmt.Errorf("database error initialize: %v", err)
	}

	return nil
}

func GetSQLite() *gorm.DB {
	return db
}

func GetLogger(p string) *Logger {
	logger = NewLogger(p)
	return logger
}

func GinConfig() {
	gin.SetMode(gin.DebugMode)
	gin.ForceConsoleColor()
}
