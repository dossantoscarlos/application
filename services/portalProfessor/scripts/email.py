import smtplib
from email.mime.multipart import MIMEMultipart
from email.mime.text import MIMEText

# Configurações do servidor SMTP
SMTP_SERVER = 'smtp.seu_servidor_smtp.com'
SMTP_PORT = 587  # Porta do servidor SMTP (geralmente 587 para TLS)

# Informações de login
EMAIL_LOGIN = 'seu_email@gmail.com'
EMAIL_PASSWORD = 'sua_senha'

# Configurações de e-mail
FROM_EMAIL = 'seu_email@gmail.com'
TO_EMAIL = 'destinatario@example.com'
SUBJECT = 'Assunto do e-mail'
BODY = 'Corpo do e-mail'

# Criando o objeto MIMEMultipart
msg = MIMEMultipart()
msg['From'] = FROM_EMAIL
msg['To'] = TO_EMAIL
msg['Subject'] = SUBJECT

# Adicionando o corpo do e-mail
msg.attach(MIMEText(BODY, 'plain'))

# Conectando-se ao servidor SMTP
server = smtplib.SMTP(SMTP_SERVER, SMTP_PORT)
server.starttls()  # Habilitando TLS
server.login(EMAIL_LOGIN, EMAIL_PASSWORD)  # Autenticando-se no servidor SMTP

# Enviando o e-mail
server.sendmail(FROM_EMAIL, TO_EMAIL, msg.as_string())

# Encerrando a conexão com o servidor SMTP
server.quit()

print('E-mail enviado com sucesso para', TO_EMAIL)
