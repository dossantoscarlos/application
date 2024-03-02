from fastapi import FastAPI
from src.resources import item_resource, user_resource, aluno_resource

app = FastAPI()

# app.include_router(item_resource.router)
# app.include_router(user_resource.router)
app.include_router(aluno_resource.router)
