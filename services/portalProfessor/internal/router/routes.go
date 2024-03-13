package router

import (
	"dossantoscarlos/application.git/internal/handler"

	"github.com/gin-gonic/gin"
)

func initRoutes(r *gin.Engine) *gin.RouterGroup {
	v1 := r.Group("/api/v1")
	{
		v1.GET("/profile", handler.ProfileHandler)
		v1.PUT("/profile", handler.UpdateProfileHandler)
	}

	return v1
}
