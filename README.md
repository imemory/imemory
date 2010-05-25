#Imemory

Projeto para nosso TCC.

##Pré Pesquisa

Ajude um grupo universitário a criar um sistema que pode melhorar nossas vidas nos estudos.

[Responda nossa pesquisa!](http://imemory.com.br/pesquisa "pre pesquisa iMemory")

Sabemos que você vai colaborar, porque é só um minutinho! 207 voluntarios(as) já responderam. Ajude a aumentar esse número respondendo e espalhando para seus amigos!

E ainda, se tiver alguma dúvida ou problema ao responder a pesquisa, entre em contato.
project.imemory@gmail.com


[http://imemory.com.br](http://imemory.com.br)


##Instalação

Para instalar o iMemory, é necessário algumas ferramentas pré-instaladas. Usamos o banco de dados PostgreSQL e o framework CakePHP.

###Softwares necessários:
-  [Apache httpd 2.x](http://httpd.apache.org/)
-  [PostgreSQL 8.3 ou 8.4](http://www.postgresql.org/)
-  [Sass](http://sass-lang.com/)
-  [Haml](http://haml-lang.com/)

###Banco de Dados
Crie um usuário e banco específico para o iMemory.

    # Criando um usuário no banco de dados
    # É possível usar a ferramenta createuser
    postgres@server:~$ createuser -S -D -R -l -I -P -E imemory
    
    # Criando o banco de dados
    postgres@server:~$ createdb -E UTF8 -O imemory imemory

Após ter criado o usuário e banco de dados para a aplicação, basta importar
o esquema.


###Compilando o layout e o CSS
O layout do iMemory foi escrito usando a marcação Haml e o CSS usando o Sass.

Para usá-los é preciso converte-los para o formato HTML e CSS de forma apropriada.


