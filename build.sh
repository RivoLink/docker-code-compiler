#!/bin/bash

# remove container if exists
docker ps -aqf "name=embedded-compiler-ps" | xargs -r docker rm -f

# remove image if exists
docker images -q embedded-compiler | xargs -r docker rmi -f

# build image as embedded-compiler
docker build -t embedded-compiler ./compiler

# run container as embedded-compiler-ps
docker run -d -p 3092:8080 --name embedded-compiler-ps embedded-compiler
