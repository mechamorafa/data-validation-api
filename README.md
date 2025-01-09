API para validação de dados (CNPJ, CPF, EMAIL e CEP)
============================

### Source files

    .
    ├── index.php                   
    ├── src/                   
    │    ├── Validator.php             # Classe com Switch case para determinar o tipo da validação
    │    ├── EmailValidator.php        # Classe de validação de e-mail
    │    ├── CPFValidator.php          # Classe de validação de CPF
    │    ├── CNPJValidator.php         # Classe de validação de CNPJ
    │    └── CEPValidator.php          # Classe de validação de CEP
    └── test/                     
         └── index.php                 # Classe teste

## Como utilizar

### Passo a Passo para Testar as Requisições no Servidor
#### 1. Preparar os Arquivos
Certifique-se de que os arquivos estão organizados corretamente no servidor.
Suba os arquivos para o servidor usando FTP.
Garanta que o servidor suporta PHP e que está configurado corretamente.

#### 2. Configurar o Endpoint
Verifique o URL base da API, por exemplo:
https://seuservidor.com/validator-api/index.php

#### 3. Realizar Testes
Você pode testar as requisições usando ferramentas como Postman, cURL ou diretamente com JavaScript.

## Testando com Postman:
#### 1. Abrir o Postman e criar uma nova requisição:
Método: POST
URL: https://seuservidor.com/validator-api/index.php

#### 2. No corpo da requisição (Body):
Escolha o formato raw e JSON como tipo de conteúdo.
Exemplo de entrada:
```
    {
       "type": "cpf",
       "value": "12345678909"
    }
```
#### 3. Enviar e verificar a resposta:
Se o CPF for válido, a resposta será:
```
{
  "success": true,
  "isValid": true
}
```
Se o CPF for inválido:
```
{
  "success": true,
  "isValid": false
}
```

## Teste com cURL:
No terminal, utilize o seguinte código:
```
curl -X POST https://seuservidor.com/validator-api/index.php \
-H "Content-Type: application/json" \
-d '{"type": "cpf", "value": "12345678909"}'
```
## Teste com JavaScript
No console do navegador, utilize o seguinte código:
```
fetch("https://seuservidor.com/validator-api/index.php", {
  method: "POST",
  headers: {
    "Content-Type": "application/json"
  },
  body: JSON.stringify({
    type: "cpf",
    value: "12345678909"
  })
})
  .then(response => response.json())
  .then(data => console.log(data))
  .catch(error => console.error(error));
```
