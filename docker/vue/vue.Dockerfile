FROM node:22-alpine3.19

WORKDIR /var/www/html/front

COPY ./src/front/ /var/www/html/

RUN npm i

EXPOSE 80
