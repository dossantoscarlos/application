from sqlalchemy.orm import Session

from src.models import models

from src.database import schemas



def get_alunos(db: Session, skip: int = 0, limit: int = 100):
    return db.query(models.Aluno).offset(skip).limit(limit).all()
