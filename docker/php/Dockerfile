FROM phpdockerio/php73-fpm:latest

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update --fix-missing && apt-get install -y --no-install-recommends apt-utils software-properties-common

RUN apt-get install --reinstall --yes --force-yes -o Dpkg::Options::="--force-confdef" -o Dpkg::Options::="--force-confold" php7.3-fpm php7.3-cli

RUN apt-get update && apt-get -y install php7.3-imagick php7.3-gd php7.3-mysql php7.3-mbstring php7.3-sqlite3 php7.3-intl php7.3-xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin/ --filename=composer

ADD files /

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN useradd --create-home --shell /bin/bash --user-group dev
RUN echo "export TERM=xterm" >> /home/dev/.bashrc

ENV DEBIAN_FRONTEND teletype