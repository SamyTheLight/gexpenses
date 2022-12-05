sudo apt-get update
sudo apt-get ugrade

#Instalamos apache2
#sudo apt-get install apache2 -y

#Instalamos la GuestAdditions
sudo apt-get install virtualbox-guest-additions-iso

#Instalamos MySql
sudo apt-get install -y mysql-server
sudo mysql < /vagrant/GExpensesBBDD.sql

#Accedemos remotamente a la base de datos
cp -f /vagrant/mysqld.cnf /etc/mysql/mysql.conf.d/mysqld.cnf 
systemctl restart mysql
