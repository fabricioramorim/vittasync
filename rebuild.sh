#!/bin/bash

# Define a function to print section headers
print_header() {
    echo -e "----------------------------------------"
    echo -e "----------------------------------------"
    echo -e "\e[1;34m$1\e[0m"
    echo -e "----------------------------------------"
    echo -e "----------------------------------------"
}
# Rebuild
./vendor/bin/sail npm run build

# Limpar o cache das telas
./vendor/bin/sail php artisan cache:clear
./vendor/bin/sail artisan view:clear

# Reiniciar o Laravel Sail
./vendor/bin/sail down
./vendor/bin/sail up -d

echo "**Processo concluído! O Laravel Sail foi reiniciado, rebuild efetuado e o cache limpo.**"