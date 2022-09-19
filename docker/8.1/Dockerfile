FROM ubuntu:22.04

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=Asia/Tokyo

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update -y && \
    apt-get install -y software-properties-common git && \
    apt-add-repository ppa:ondrej/php

RUN apt-get install -y \
    apache2 php8.1 php8.1-mysql php8.1-curl php8.1-gd php8.1-mbstring php8.1-xml php8.1-zip

WORKDIR /var/www/html

EXPOSE 80

CMD ["apachectl", "-D", "FOREGROUND"]