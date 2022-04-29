#!/usr/bin/make

SHELL = /bin/sh

UID := $(shell id -u)
GID := $(shell id -g)

export UID
export GID

shell:
	docker-compose -f local-docker-compose.yaml exec -u ${UID}:${GID} app sh

up:
	UID=${UID} GID=${GID} docker-compose -f local-docker-compose.yaml up --build -d --remove-orphans

down:
	docker-compose -f local-docker-compose.yaml down --remove-orphans
