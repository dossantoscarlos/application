from django.contrib import admin
from django.urls import path
from docente.api import api as docente

urlpatterns = [
    path('painel/', admin.site.urls),
    path('api/', docente.urls)

]
