FROM node:11

RUN npm install --global gulp-cli && npm install gulp

WORKDIR /var/www

USER node
