sudo apt-get update
sudo apt-get upgrade

#Instalamos apache2
sudo apt-get install apache2 -y
sudo service apache2 restart

#Instalamos PHP 8.1
sudo add-apt-repository ppa:ondrej/php
sudo apt-get install -y php8.1 php8.1-dev libapache2-mod-php8.1 libmcrypt-dev php8.1-mysql
sudo apt-get install -y php8.1-dom php8.1-mbstring php8.1-xml php8.1-xmlwriter

sudo phpenmod mcrypt

#Instalamos la GuestAdditions
#sudo apt-get install virtualbox-guest-additions-iso

#Instalamos MySql
sudo apt-get install -y mysql-server
sudo mysql < /vagrant/GExpensesBBDD.sql

#Accedemos remotamente a la base de datos
cp -f /vagrant/mysqld.cnf /etc/mysql/mysql.conf.d/mysqld.cnf 
systemctl restart mysql

# Instalamos SQLite
sudo apt-get install sqlite3 -y
sudo apt-get install php8.1-sqlite3 -y

# Instalamos PHPUnit
wget https://phar.phpunit.de/phpunit-9.phar
chmod +x phpunit-9.phar
sudo mv phpunit-9.phar /usr/local/bin/phpunit