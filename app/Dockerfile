FROM composer:latest

RUN apk add perl

WORKDIR /app

COPY . .

RUN git clone https://github.com/stefan-muc/caldav-calendar-import.git
RUN cd caldav-calendar-import && composer update
RUN mv config.inc.php caldav-calendar-import/config

CMD ["bash", "/app/entrypoint.sh"]