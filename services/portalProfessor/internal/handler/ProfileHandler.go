package handler

import (
	"net/http"

	"github.com/gin-gonic/gin"
)

func ProfileHandler(ctx *gin.Context) {
	ctx.JSON(http.StatusOK, gin.H{
		"data": "",
	})
}

func UpdateProfileHandler(ctx *gin.Context) {
	ctx.JSON(http.StatusAccepted, gin.H{})
}
