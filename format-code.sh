#!/bin/sh

GREEN='\033[0;32m';
NC='\033[0m';
echo "${GREEN}Formatting HTML,CSS Files${NC}\n";
npx prettier --write './**/*.{css,html}'
echo "\n${GREEN}Formatting PHP Files${NC}\n";
./vendor/bin/php-cs-fixer fix
echo "${GREEN}Formatting & applying lint rules via StandardJS for JS Files${NC}\n";
npx standard --fix