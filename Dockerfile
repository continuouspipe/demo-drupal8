FROM quay.io/continuouspipe/drupal-php7-apache:stable

# Add the application
COPY . /app
WORKDIR /app

ARG GITHUB_TOKEN=
RUN container build
