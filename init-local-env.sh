#!/bin/bash

PROJECT_PATH="$(pwd)/src"

echo "Install dependencies ..."
sudo docker run --rm -v "${PROJECT_PATH}":/app composer install
sudo docker run --rm -v "${PROJECT_PATH}":/usr/src/app -w /usr/src/app node npm install

echo "Set permissions ..."
sudo chown -R $(whoami):$(whoami) "${PROJECT_PATH}"
sudo chmod -R 777 "${PROJECT_PATH}/storage" "${PROJECT_PATH}/bootstrap/cache"

exit 0
