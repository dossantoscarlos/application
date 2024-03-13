from ninja import NinjaAPI

api = NinjaAPI()


@api.get('/teste')
def seacherAllSecretary(request) :
    return "Hello"