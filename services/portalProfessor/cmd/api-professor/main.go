package main

import (
	"dossantoscarlos/application.git/config"
	r "dossantoscarlos/application.git/internal/router"
)

var (
	logger *config.Logger
)

func main() {

	config.GinConfig()

	logger = config.GetLogger("main")

	err := config.Init()
	if err != nil {
		logger.Errorf("Init config: %v", err)
		return
	}

	r.Initiliazer()
}
