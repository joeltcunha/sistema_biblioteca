FROM php:8.2-apache

RUN docker-php-ext-install mysqli \
	&& printf 'mysqli.default_socket=/run/mysqld/mysqld.sock\n' > /usr/local/etc/php/conf.d/mysqli-socket.ini

    #docker compose down
    #cd ~/Imagens/SistemaBiblioteca_4.4/SistemaBiblioteca
    #docker compose up --build -d
    #Procure por erros em todo o projeto. Verifique caminhos errados, código que não devia estra comentado, problemas de gerenciamento de sessão, menus quase iguais mas diferentes, coisas que fogem do padrão que está nos arquivos, entre outros.