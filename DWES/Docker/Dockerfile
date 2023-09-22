# Imagen Ubuntu 20.04
FROM ubuntu:22.04

ENV DEBIAN_FRONTEND=noninteractive

# Paquetes LAMP
RUN apt-get update
RUN apt-get install -y apache2 mariadb-server php8.1 libapache2-mod-php php8.1-mysql
RUN apt-get install -y openssh-server

# Configura el servicio MariaDB (asegúrate de que esta configuración sea segura para producción)
RUN service mariadb start && \
    mysql -u root -e "ALTER USER 'root'@'localhost' IDENTIFIED BY 'password';" && \
    mysql -u root -ppassword -e "CREATE DATABASE main_database;"

RUN echo 'root:password' | chpasswd
RUN sed -i 's/PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config

RUN service ssh start && service apache2 start


# Copia tu sitio web a la carpeta /var/www/html
COPY ../ /var/www/html/

# Expón el puerto 80 para Apache
EXPOSE 80
EXPOSE 22

# Inicia Apache en primer plano
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]
CMD ["/usr/sbin/sshd","-D"]
