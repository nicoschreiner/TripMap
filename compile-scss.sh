#!/bin/bash

PROJECT_PATH="$(pwd)/src"

sudo docker run --rm -v "${PROJECT_PATH}":/usr/src/app -w /usr/src/app node npm run watch

exit 0
