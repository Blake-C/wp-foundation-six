FROM nginx:1.10-alpine
MAINTAINER Blake Cerecero blake@digitalblake.com

RUN mkdir -p /var/www/html
WORKDIR /var/www/html

COPY nginx.conf /etc/nginx/conf.d/default.conf

COPY . ./