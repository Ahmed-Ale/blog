FROM php:8.1

WORKDIR /app

COPY . .

RUN composer install --ignore-platform-reqs
RUN npm ci

EXPOSE 80

CMD ["php", "artisan", "serve"]
