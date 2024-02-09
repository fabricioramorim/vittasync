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
print_footer() {
    echo -e "----------------------------------------"
    echo -e "----------------------------------------"
    echo -e "\e[1;34m$1\e[0m"
    echo -e "----------------------------------------"
    echo -e "----------------------------------------"
}

print_footer "Clonando repositório"
git clone https://github.com/fabricioramorim/vittasync.git

print_footer "Movendo arquivos para o diretório atual"
shopt -s dotglob
mv vittasync/* .

print_footer "Copiando o .env"
cp .env.example .env

print_footer "Subindo Sail no Docker"
docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php83-composer:latest composer install --ignore-platform-reqs 

print_footer "Iniciando Sail"
./vendor/bin/sail up -d

print_footer "Gerando a chave do software"
./vendor/bin/sail php artisan key:generate

print_footer "Configurando o .env"
./vendor/bin/sail php artisan sail:install

print_footer "Baixando os containers"
docker-compose down --volumes

print_footer "Iniciando Sail"
./vendor/bin/sail up -d

print_footer "Artisan migrate"
./vendor/bin/sail php artisan migrate

print_footer "Instalando dependencias NPM"
./vendor/bin/sail npm install

print_footer "Executando em modo dev"
./vendor/bin/sail npm run build

newgrp docker
END
