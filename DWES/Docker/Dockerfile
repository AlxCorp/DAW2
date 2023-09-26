# Imagen base Ubuntu 22.04
FROM ubuntu:22.04

ENV DEBIAN_FRONTEND=noninteractive

# Actualiza e instala paquetes
RUN apt-get update
RUN apt-get install -y apache2 mariadb-server php8.1 libapache2-mod-php php8.1-mysql openssh-server

# Configura el servicio MariaDB (asegúrate de que esta configuración sea segura para producción)
RUN service mariadb start && mysql -u root -e "ALTER USER 'root'@'localhost' IDENTIFIED BY 'password';" && \
    mariadb -u root -ppassword -e "CREATE DATABASE main_database;"

# Configurar acceso SSH
RUN echo 'root:password' | chpasswd
RUN sed -i 's/PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config

# Configura Apache
RUN a2enmod rewrite
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Copia tu sitio web a la carpeta /var/www/html
#COPY ./tu_sitio_web /var/www/html/

# Exponemos el puerto 80 para Apache y 22 para SSH
EXPOSE 80
EXPOSE 22

# Inicia los servicios Apache y SSH en primer plano
CMD service ssh start && service apache2 start && tail -f /var/log/apache2/access.log
