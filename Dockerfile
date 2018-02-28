FROM wordpress:4.7.1
COPY ./web/wp-content /var/www/html/wp-content
EXPOSE 80 443