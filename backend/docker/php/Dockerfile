FROM php:8.2-fpm

# 필요한 PHP 확장 설치
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Composer 설치 (선택 사항)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 타임존 설정 (환경 변수와 연동)
ENV TZ=${TIME_ZONE}
