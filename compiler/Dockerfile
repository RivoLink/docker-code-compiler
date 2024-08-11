FROM php:8.1-cli

RUN apt-get update && apt-get install -y \
    default-jdk \
    nodejs \
    python3 \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY . /usr/src/app/

RUN mkdir /temp

WORKDIR /usr/src/app

CMD ["php", "-S", "0.0.0.0:8080", "-t", "/usr/src/app"]
