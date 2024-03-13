package router

import (
	g "github.com/gin-gonic/gin"
)

func Initiliazer() {

	r := g.Default()
	initRoutes(r)

	r.Run(":8090")
}
