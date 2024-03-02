from sqlalchemy import Boolean, Column, ForeignKey, Integer, String, Float, Date
from sqlalchemy.orm import relationship

from src.database.database import Base


class User(Base):
    __tablename__ = "users"

    id = Column(Integer, primary_key=True)
    email = Column(String, unique=True, index=True)
    hashed_password = Column(String)
    is_active = Column(Boolean, default=True)

    items = relationship("Item", back_populates="owner")


class Item(Base):
    __tablename__ = "items"

    id = Column(Integer, primary_key=True)
    title = Column(String, index=True)
    description = Column(String, index=True)
    owner_id = Column(Integer, ForeignKey("users.id"))

    owner = relationship("User", back_populates="items")


class Disciplina (Base):
    __tablename__="disciplinas"

    id = Column(Integer, primary_key=True)
    nome_disciplina = Column(String, index=True)

    docente_pivot = relationship("DisciplinaDocente", back_populates="docente")

class Documento(Base):
    __tablename__ = "documentos"

    id = Column(Integer, primary_key=True)
    tipo = Column(String)
    valor = Column(String)
    aluno_id = Column(Integer, ForeignKey("alunos.id"))

    aluno = relationship("Aluno", back_populates="documentos")


class Matricula(Base):
    __tablename__ = "matriculas"

    id = Column(Integer, primary_key=True)
    codigo = Column(String, unique=True, index=True)
    curso_id = Column(Integer, ForeignKey('cursos.id'), index=True)
    aluno_id = Column(Integer, ForeignKey('alunos.id'), index=True)
    validade = Column(Date, default=Date)

    aluno = relationship("Aluno", back_populates="matricula")
    curso = relationship("Curso", back_populates="matricula")


class Curso(Base): 
    __tablename__ = "cursos"
    
    id= Column(Integer, primary_key=True)
    valor = Column(Float)
    codigo = Column(String, unique=True, index=True)
    nome = Column(String, index=True)
    duracao = Column(Integer)

    curso_pivot = relationship("CursoDisciplina", back_populates='curso_disciplinas.id')

class Aluno(Base):
    __tablename__ = "alunos"

    id = Column(Integer, primary_key=True)
    nome = Column(String)
    sobrenome= Column(String)
    sexo = Column(String)
    dataNascimento = Column(String)

    documentos = relationship("Documento", back_populates="aluno")
    matricula = relationship("Matricula", back_populates="aluno")


class Responsavel(Base):
    __tablename__ = "responsaveis"

    id = Column(Integer, primary_key=True)
    cpf=Column(String, unique=True, index=True)
    nome = Column(String)
    sobrenome = Column(String)
    parentesco =Column(String)
    

class AlunoResponsavel(Base):
    __tablename__="aluno_responsaveis"

    id = Column(Integer, primary_key=True)
    aluno_id = Column(Integer, ForeignKey('alunos.id'), index=True)
    responsavel_id= Column(Integer, ForeignKey('responsaveis.id'), index=True)


class CursoDisciplina(Base):
    __tablename__ = "curso_disciplinas"

    id = Column(Integer, primary_key=True)
    curso_id = Column(Integer, ForeignKey("cursos.id"))
    disciplina_id = Column(Integer, ForeignKey("disciplinas.id"))

    disciplina = relationship("Disciplina", back_populates="disciplina_pivot")
    curso = relationship("Curso", back_populates="curso_pivot")


class DisciplinaDocente(Base) :
    __tablename__="disciplina_docentes"
    
    id = Column(Integer, primary_key=True)
    disciplina_id = Column(Integer, ForeignKey("disciplinas.id"))
    docente_id = Column(Integer, ForeignKey("docentes.id"))

    disciplina = relationship("Disciplina", back_populates="disciplina_pivot")
    docente = relationship("Docente", back_populates="docente_pivot")
    
