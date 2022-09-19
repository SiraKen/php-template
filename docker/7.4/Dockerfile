FROM ubuntu:22.04

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=Asia/Tokyo

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update -y && \
    apt-get install -y software-properties-common git && \
    apt-add-repository ppa:ondrej/php

RUN apt-get install -y \
    apache2 php7.4 php7.4-mysql php7.4-curl php7.4-gd php7.4-mbstring php7.4-xml php7.4-zip

WORKDIR /var/www/html

EXPOSE 80

CMD ["apachectl", "-D", "FOREGROUND"]