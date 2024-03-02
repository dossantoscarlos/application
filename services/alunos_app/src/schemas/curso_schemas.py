from pydantic import BaseModel


class CursoBase(BaseModel):
    valor:float
    codigo:str
    nome:str
    duracao:int

class CursoCreate(CursoBase):
    pass

class Curso(CursoBase):
    id:int
    class Config:
        from_attributes = True


