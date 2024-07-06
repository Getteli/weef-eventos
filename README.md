## Teste Weef

O projeto possui docker mas pode ser iniciado diretamente pelo serve do artisan.

Link do projeto no ar: https://weef-eventos.onrender.com/

Preencha os dados no .env local para criar o banco e dados

Faça a instalação do composer e npm

```bash
composer install
npm install
```

Rode o seed para ter uma base de teste
### Seed
```bash
php artisan migrate --seed
```

### Formas de iniciar o projeto

### Docker

```bash
// construir a imagem
docker build -t weefdocker . 

// iniciar o container
docker run -p 80:80 weefdocker
```

### Artisan
```bash
php artisan serve
```

### PEST

Estou utilizando o PEST para realizar os testes. Criei alguns metodos de testes de integração com dados fake do factory. 
Teste em autenticação, perfil, jogador e time. Apenas para exemplificar algumas habilidades.

Verifique os testes na pasta test/Feature

```bash
./vendor/bin/pest
```

### OBSERVAÇÕES E CONSIDERAÇÕES
- Coloquei o projeto no ar pelo **[render](https://render.com/)** e o banco em um droplet da digital ocean;

- O projeto roda no docker usando o nginx;

- O projeto esta no ar no render usando o docker;

- Utilizei a autenticação para o usuário que controlará o CRUD dos eventos;

- O site possui um seed para começar os testes;

- O site está responsivo;

- UTilizei o framework **[tailwindcss](https://tailwindcss.com/)** paa o front;