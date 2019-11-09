## WFG Laravel Project Notes

Laravel: https://laravel.com/docs

Main Branch: https://github.com/cpoirier/wfg-laravel


## Initialize Site

cd ~


sudo apt install -y docker-ce npm mariadb-server php7.2

sudo groupadd docker

sudo usermod -aG docker $USER

newgrp docker 


mkdir wfgProject

chown $USER:docker wfgProject

cd wfgProject

mv <dbfile.sql> ~/wfgProject

git clone https://github.com/<repo>/wfg-laravel.git laravel

git remote add --track master upstream https://github.com/cpoirier/wfg-laravel.git

find ~/wfgProject -type f -exec chmod 644 {} \\;

find ~/wfgProject -type d -exec chmod 755 {} \\;

mkdir db

chmod 777 db

cd laravel

rm -Rf node_modules

npm cache clear --force

npm install

npm run dev


cp .env.example .env


-- Compose the first time to install and generate initial build environment

docker-compose up

docker-compose down !-- after completed server start

php artisan key:generate

-- add line to mariadb volumes in docker-compose.yml: - ../wfg.sql:/docker-entrypoint-initdb.d/wfg.sql

chmod 755 ~/wfgProject/db

docker-compose up &

npm run watch &

## Ending Processes

fg

CTRL+C

docker-compose down
