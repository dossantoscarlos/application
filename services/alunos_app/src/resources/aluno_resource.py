from fastapi import HTTPException, Depends
from sqlalchemy.orm import Session
from fastapi import APIRouter

from src.schemas.aluno_schemas import Aluno
from src.DataAccessObject import aluno_dao
from src.database.database import SessionLocal

router = APIRouter()

def get_db():
    db = SessionLocal()
    try:
        yield db
    finally:
        db.close()

@router.get("/aluno/", response_model=list[Aluno])
def read_aluno(skip: int = 0, limit: int = 100, db: Session = Depends(get_db)):
    aluno = aluno_dao.get_alunos(db, skip=skip, limit=limit)
    return aluno
