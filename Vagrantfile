# -*- mode: ruby -*-
# vi: set ft=ruby :

# -- config section
node_version = "0.4.13"
node_domain  = 'tbdev.xyz'
node_name    = 'vuehydration'.concat('.' + node_domain)
# node_aliases = ['twistedbytes-site1', 'twistedbytes-site2'].map{|s| s.concat('.' + node_domain)}
node_aliases = [].map{|s| s.concat('.' + node_domain)}
node_ip      = "192.168.50.185"
node_cpus    = 2
node_memory  = 2048
# -- end config section

Vagrant.configure(2) do |config|
    # -- hostmanager section
    # vagrant plugin install vagrant-hostmanager
    if Vagrant.has_plugin?("vagrant-hostmanager")
        config.hostmanager.enabled = true
        config.hostmanager.manage_host = true
        config.hostmanager.manage_guest = true
        config.hostmanager.ignore_private_ip = false
        config.hostmanager.include_offline = false
    end
    # -- end hostmanager section

    config.vm.define node_name do |node|
        # -- box setup
        node.vm.box = "twistedbytes/webserver"
        node.vm.box_version = node_version
        node.vm.hostname = node_name
        node.vm.provider "virtualbox" do |v|
            v.linked_clone = true if Gem::Version.new(::Vagrant::VERSION) > Gem::Version.new('1.8')
            v.name   = node_name
            v.memory = node_memory
            v.cpus   = node_cpus
        end

        if Vagrant.has_plugin?("vagrant-hostmanager")
            if !node_aliases.empty?
                node.hostmanager.aliases = node_aliases
            end
        end

        # -- box setup

        # -- network section
        node.vm.network "private_network", ip: node_ip
        # Create a forwarded port mapping which allows access to a specific port
        node.vm.network "forwarded_port", guest: 80,   host: 8080, host_ip: '127.0.0.1', auto_correct: true
        node.vm.network "forwarded_port", guest: 3306, host: 3306, host_ip: '127.0.0.1', auto_correct: true
        # for mailcatcher
        node.vm.network "forwarded_port", guest: 1080, host: 1080, host_ip: '127.0.0.1', auto_correct: true
        # -- end network section

        # -- synced folders section
         if Vagrant.has_plugin?("vagrant-winnfsd")
            puts "windows vagrant plugin installed! will use"
            # use NFS shares to drastically improve performance (options avoid locking issues)
            nfs_options = ['vers=3', :udp, :nolock, :noatime,'actimeo=1']
            config.vm.synced_folder "site", '/data/site', type: :nfs, mount_options: nfs_options
            config.vm.synced_folder "other/config", '/data/config', type: :nfs, mount_options: nfs_options
            config.vm.synced_folder "other/logs", '/data/logs', type: :nfs, mount_options: nfs_options
            config.vm.synced_folder "other/private", '/data/private', type: :nfs, mount_options: nfs_options
            config.vm.synced_folder "other/pma-upload", '/opt/pma-upload-save', type: :nfs, mount_options: nfs_options
        else
            node.vm.synced_folder "site",          "/data/site",   create: true, owner: 'defaultsite', group: 'defaultsite'
            node.vm.synced_folder "other/config",     "/data/config",         create: true, owner: 'defaultsite', group: 'defaultsite'
            node.vm.synced_folder "other/logs",       "/data/logs",           create: true, owner: 'defaultsite', group: 'defaultsite'
            node.vm.synced_folder "other/private",    "/data/private",        create: true, owner: 'defaultsite', group: 'defaultsite'
            node.vm.synced_folder "other/pma-upload", "/opt/pma-upload-save", create: true, owner: 'nobody', group: 'nobody'
        end
        # -- end synced folders section

        # -- provisioning section
        node.vm.provision "shell", run: 'always', inline: '/usr/local/bin/autorun.sh'
#        config.vm.provision "shell", run: 'always', inline: <<SCRIPT
#               sudo -u defaultsite sh -c "whoami ; cd ~/site/docroot/ ; /usr/local/bin/composer install ; cd directlease ; npm install"
#SCRIPT


        # -- provisioning section

    end
end
