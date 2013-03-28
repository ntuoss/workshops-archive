Dive into the Cloud
===================

Step 1: Get a virtual machine.
------------------------------
- [Windows Azure](http://www.windowsazure.com/en-us/)
- [Amazon Web Services](http://aws.amazon.com/)

Step 2: Connect to the virtual machine.
---------------------------------------

- [Bitvise](http://www.bitvise.com/download-area)
- [FileZilla](http://filezilla-project.org)

Step 3: Install web server software.
------------------------------------

- [Basic Shell Commands](http://www.my-guides.net/en/guides/linux/basic-linux-commands)
- [Linux File System](http://tuxradar.com/content/take-linux-filesystem-tour)

```
sudo tasksel install lamp-server
```

Step 4: Configure the server. 
-----------------------------

Step 5: Upload your codes.
--------------------------

[Download Wordpress](http://wordpress.org/latest.zip)

```
sudo chmod 777 -R /var/www
```

Start / stop the Apache
-----------------------

Start `sudo /etc/init.d/apache2 start`
Stop `sudo /etc/init.d/apache2 stop`
Retart `sudo /etc/init.d/apache2 restart`

Install node.js 
---------------

```
sudo apt-get install python-software-properties python g++ make
sudo add-apt-repository ppa:chris-lea/node.js
sudo apt-get update
sudo apt-get install nodejs
```

Run node.js
-----------

> Example from http://tech.pro/tutorial/1097/simple-chat-nodejs-plus-websockets

```
sudo mkdir /var/chat
sudo chmod 777 -R /var/chat
npm install
nodejs app
```

More
----

[Run Node.js as a service](http://kvz.io/blog/2009/12/15/run-nodejs-as-a-service-on-ubuntu-karmic/)