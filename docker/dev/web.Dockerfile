FROM nginx:1.12

COPY ./docker/dev/config/vhost.conf /etc/nginx/conf.d/default.conf
WORKDIR /var/www
