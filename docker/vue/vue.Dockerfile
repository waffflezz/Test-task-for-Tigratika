FROM node:22-alpine3.19

WORKDIR /var/www/html/front

RUN npm i

EXPOSE 80
