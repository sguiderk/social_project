# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "ubuntu/trusty64"
  config.vm.hostname = "benchmark"
  config.vm.network :private_network, ip: "192.168.33.78"

  config.vm.network :forwarded_port, host: 8080, guest: 80 
  
  # allow connection to port 1080 for mailcatcher 
  config.vm.network :forwarded_port, host: 1080, guest: 1080


 config.vm.provider :virtualbox do |vb|
    # Use VBoxManage to customize the VM.
    # For example to change memory or number of CPUs:
    vb.customize ["modifyvm", :id, "--memory", "1024"]
    vb.customize ["modifyvm", :id, "--cpus", "1"]
  end

  config.vm.provision :shell, path: "Vagrant.bootstrap.sh"
end
