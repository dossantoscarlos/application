from django.db import models

# Create your models here.

class Perfil(models.Model):
    tipo = models.CharField()

    def __str__(self):
        return self.tipo
    
class Docente(models.Model) :
    nome = models.CharField(name="nome")
    sobrenome = models.CharField(name="sobrenome")
    data_nascimento = models.CharField(nome="data_nascimento")
    matricula = models.CharField()
    perfil = models.ForeignKey(Perfil, on_delete=models.CASCADE)
    
    def __str__(self) -> str:
        return f"{self.nome} {self.sobrenome} {self.dataNascimento} {self.matricula} {self.perfil}"

class Aluno(models.Model):
    nome = models.CharField()
    sobrenome = models.CharField()
    data_nascimento = models.DateField()
    matricula = models.CharField()
    transferido = models.BooleanField(default=False) 

    def __str__(self) -> str:
        return f"{self.nome}"

class Curso(models.Model):
    nome = models.CharField()
    duracao = models.IntegerField()
    descricao = models.CharField()
    periodo = models.CharField()

    def __str__(self) -> str:
        return f"{self.nome}"