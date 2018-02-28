FROM wordpress:4.7.1
# starting from a wordpress:4.7.1 Docker image

LABEL author "Maxime Pierre <max@webmediasolutionz.com>"
# adding label for the author

WORKDIR /var/www/html
# same as doing `$ cd /var/www/html`

COPY ./web .
# copying project inside Docker container

ENV WORDPRESS_DB_PASSWORD password01
# setting up wordpress db password variable

EXPOSE 80 443
# exposing appropriate ports