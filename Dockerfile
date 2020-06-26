FROM php:7.2-apache

WORKDIR /var/www/html

COPY . .

# initialize empty db
#COPY racing.db.empty racing.db
COPY racing.db.sample racing.db
