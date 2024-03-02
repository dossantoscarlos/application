from pydantic import BaseModel


class DocumentoBase(BaseModel):
    tipo :str
    valor :str    

class DocumentoCreate(DocumentoBase):
    pass

class Documento(DocumentoBase):
    id:int
    class Config: 
        from_attributes = True
