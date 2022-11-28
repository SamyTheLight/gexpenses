# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  config.vm.box = "hashicorp/bionic64"
  config.vm.hostname = "GExpenses"
  config.vm.define "GExpenses"
<<<<<<< Updated upstream
  #config.vm.synced_folder "gexpensesabp/", "/var/www/html"
=======
  #config.vm.synced_folder "gexpensesab/", "/var/www/html"
>>>>>>> Stashed changes
  config.vm.network "private_network", ip: "172.16.0.10"
  config.vm.network "forwarded_port", guest: 80, host: 1234
  config.vm.provision "shell", path: "script.sh"
  config.vm.provider "virtualbox" do |vb|
	vb.name = "GExpenses"
    vb.memory = "512"
    vb.cpus = 1
  end
end