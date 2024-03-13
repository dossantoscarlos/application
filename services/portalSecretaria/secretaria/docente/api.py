from ninja import NinjaAPI


api = NinjaAPI()

@api.get('/docentes')
def listaDocente(request) :
    return "lista de docente"