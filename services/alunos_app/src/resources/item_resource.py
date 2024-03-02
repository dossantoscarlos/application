from fastapi import HTTPException, Depends
from sqlalchemy.orm import Session
from fastapi import APIRouter

from src.database.schemas import Item
from src.DataAccessObject import dao
from src.database.database import SessionLocal

router = APIRouter()

def get_db():
    db = SessionLocal()
    try:
        yield db
    finally:
        db.close()

@router.get("/items/", response_model=list[Item])
def read_items(skip: int = 0, limit: int = 100, db: Session = Depends(get_db)):
    items = dao.get_items(db, skip=skip, limit=limit)
    return items
