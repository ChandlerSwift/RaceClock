FROM php:7.2-apache

WORKDIR /var/www/html

COPY . .

ARG source_db=racing.db.empty

# initialize empty db
COPY $source_db racing.db
