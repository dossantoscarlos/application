package config

import (
	"dossantoscarlos/application.git/internal/schemas"
	"os"

	"gorm.io/driver/sqlite"
	"gorm.io/gorm"
)

var (
	dbPath string
)

func createSQLiteDB() {

	_, err := os.Stat(dbPath)

	if os.IsNotExist(err) {

		logger.Info("database file not exist ...")

		err = os.MkdirAll("./db", os.ModePerm)
		if err != nil {
			logger.Errorf("Path not creating: %v", err)
			return
		}

		file, err := os.Create(dbPath)
		if err != nil {
			logger.Errorf("File not create: %v", err)
			return
		}
		file.Close()
	}

}

func InitiliazerSQLite() (*gorm.DB, error) {
	logger := GetLogger("sqlite")
	dbPath := "./db/main.db"

	createSQLiteDB()

	db, err := gorm.Open(sqlite.Open(dbPath), &gorm.Config{})
	if err != nil {
		logger.Errorf("sqlite error open: %v", err)
		return nil, err
	}

	err = db.AutoMigrate(&schemas.Formacao{}, &schemas.Professor{}, &schemas.Turma{})
	if err != nil {
		logger.Errorf("sqlite automigrate error: %v", err)
		return nil, err
	}

	return db, nil
}
