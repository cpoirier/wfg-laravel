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


mkdir db

chmod 755 db


mv <dbfile.sql> ~/wfgProject


git clone https://github.com/<repo>/wfg-laravel.git laravel

git remote add --track master upstream https://github.com/cpoirier/wfg-laravel.git

find ~/wfgProject -type f -exec chmod 644 {} \;

find ~/wfgProject -type d -exec chmod 755 {} \;


cd laravel

rm -Rf node_modules

npm cache clear --force

npm install

npm run dev


cp .env.example .env

php artisan key:generate


docker-compose up &
