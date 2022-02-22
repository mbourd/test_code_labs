FROM nginx:1.13.8

ADD files /

RUN usermod -u 1000 www-data

WORKDIR /var/www

EXPOSE 80