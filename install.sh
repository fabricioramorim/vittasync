#!/bin/bash

# Define a function to print section headers
print_header() {
    echo -e "----------------------------------------"
    echo -e "----------------------------------------"
    echo -e "\e[1;34m$1\e[0m"
    echo -e "----------------------------------------"
    echo -e "----------------------------------------"
}

print_header "Atualizando Repositorios"
sudo apt-get update

print_header "Instalando Docker"
sudo apt-get install apt-transport-https ca-certificates curl gnupg-agent software-properties-common -y
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
sudo add-apt-repository -y "deb [arch=amd64] https://download.docker.com/linux/ubuntu focal stable"
sudo apt-get update
sudo apt-get install docker-ce docker-ce-cli containerd.io -y
sudo curl -L "https://github.com/docker/compose/releases/download/1.29.2/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose

print_header "Habilitando Servico"
sudo systemctl enable docker

print_header "Verificando Versao"
docker --version

print_header "Adicionando usuario atual ao grupo Docker"
sudo usermod -a -G docker $(whoami)

print_header "Reiniciando o BASH"
newgrp docker << END

# Define a function to print section headers na nova sessao

echo "Copiando o .env"
cp .env.example .env

echo "Subindo Sail no Docker"
docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php83-composer:latest composer install --ignore-platform-reqs 
 
echo "Iniciando Sail"
./vendor/bin/sail up -d

echo "Finalizando as dependencias do software"
./vendor/bin/sail php artisan key:generate && ./vendor/bin/sail php artisan sail:install && docker-compose down --volumes && ./vendor/bin/sail up -d

sleep 10

./vendor/bin/sail php artisan migrate && ./vendor/bin/sail npm install && ./vendor/bin/sail npm run build

newgrp docker
END
