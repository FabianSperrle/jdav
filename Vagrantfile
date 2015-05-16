# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "avenuefactory/lamp"
  config.vm.network "forwarded_port", guest: 80, host: 8070
  config.vm.network "private_network", ip: "192.179.1.2"
  config.vm.synced_folder ".", "/var/www/html/",
      owner: "vagrant",
      group: "www-data",
	  mount_options: ["dmode=777,fmode=777"]
end
