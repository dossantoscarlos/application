from src.models.responsavel import Responsavel

def test_responsavel_parentesco():
    resp = Responsavel(nome="carlos" , sobrenome="santos", parentesco='Pai', cpf='0434343')
    assert "Pai" == resp.parentesco