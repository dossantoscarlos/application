from pydantic import BaseModel
from src.schemas.documento_schemas import Documento 

class AlunoBase(BaseModel):
    nome:str 
    sobrenome: str 
    sexo:str
    dataNascimento: str

class AlunoCreate(AlunoBase):
    pass

class Aluno(AlunoBase): 
    id:int
    documentos: list[Documento] = []
    class Config:
        from_attributes = True