#Imemory

Projeto para nosso TCC.

##Instalação

Para instalar o iMemory, é necessário algumas ferramentas pré-instaladas. Usamos o banco de dados PostgreSQL e o framework CakePHP.

###Softwares necessários:
-  [Apache httpd 2.x](http://httpd.apache.org/)
-  [PostgreSQL 8.3 ou 8.4](http://www.postgresql.org/)

###Banco de Dados
Crie um usuário e banco de dados específicos para o iMemory.

    # Criando um usuário no banco de dados
    # É possível usar a ferramenta createuser do postgres
    postgres@server:~$ createuser -S -D -R -l -I -P -E imemory
    
    # Criando o banco de dados com o createdb do postgres
    postgres@server:~$ createdb -E UTF8 -O imemory imemory

Após ter criado o usuário e banco de dados para a aplicação, basta importar
o esquema contido no diretório.

    app/config/schema/schema.sql



