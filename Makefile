#!/usr/bin/make

SHELL = /bin/sh

UID := $(shell id -u)
GID := $(shell id -g)

export UID
export GID

shell:
	docker exec -it pro-memo-app bash -c "sudo -u app-user /bin/bash"

up:
	UID=${UID} GID=${GID} docker-compose -f docker-compose.local.yml up --build -d --remove-orphans

down:
	docker-compose -f docker-compose.local.yml down --remove-orphans