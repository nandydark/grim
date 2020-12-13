FROM php:7.4-cli

COPY . /usr/src/grim
WORKDIR /usr/src/grim

CMD ["php", "grim.php"]
