##This is a tutorial to set up file sharing server on Raspberry Pi using [Samba](https://www.samba.org/).##

Originally done by [Shawn Liu](http://shawnliu.info/) of the [NTU Open Source Society](http://www.ntuoss.com/) as part of [TGIFHacks #26](https://www.facebook.com/events/1029186047096061/)

*Before following this tutorial, please make sure you have Raspbian properly installed on the SD/microSD card of your Raspberry Pi. Please follow [this guide](http://elinux.org/RPi_Easy_SD_Card_Setup) for help regarding this.*

###Part 1###

For the first part, you need to find the IP address of the Pi in your local network. By default, your Pi gets its IP using DHCP service which means that the IP address is dynamically allocated to the Pi when it boots up. Therefore, you need to go to your router’s setting page and look for the panel which shows you all the devices connected to your router. In that panel, you should be able to see a device whose name is `raspberrypi`. Please take note of the IP address associated with that device.

**Note**
>If you cannot find your Pi’s IP, try to search on Google for how to get IP addresses of your devices with the brand of your router. Different routers have different looking panels and therefore the way you find the IPs can vary from brand to brand, model to model.

###Part 2###

After you find the IP of your Pi, you are ready to get started. In this part, you are going to connect to your Pi remotely using SSH (SecureShell), which allows you to access your Pi’s command line remotely and securely.

For Mac OS X and Linux users, you can just use your Terminal to connect to your Pi using SSH. Open your terminal and type the following command

`ssh pi@xxx.xxx.xxx.xxx `(replace xxx.xxx.xxx.xxx with your Pi's IP)

Type the password raspberry when it promotes you to. This command is to use SSH to connect to your Pi and login as the user pi.

For Windows users, you need a tiny program called “PuTTY” to use SSH. You can download the program [here](http://www.putty.org/). After you downloaded the program, run it and put your Pi’s IP for the “Host Name” and click “Open”. Then you should be able to connect using the user pi.


>The user `pi` comes with the Raspbian OS and its default password is `raspberry`. You can change the password later if you like. 

>When you connect to your Pi for the first time, the terminal will ask you to confirm this is the correct device you are trying to connect and trust it. Just type “yes” and continue.

If you connect to your Pi successfully, you should see something like this

```
Linux raspberrypi 3.12.28+ #709 PREEMPT Mon Sep 8 15:28:00 BST 2014 armv6l

The programs included with the Debian GNU/Linux system are free software;
the exact distribution terms for each program are described in the
individual files in /usr/share/doc/*/copyright.

Debian GNU/Linux comes with ABSOLUTELY NO WARRANTY, to the extent
permitted by applicable law.
Last login: Sat Jan 24 01:06:19 2015 from 192.168.0.110
pi@raspberrypi ~ $
```

###Part 3###

Now you are remotely connected to your Pi, let’s set up the server now. For this tutorial, Samba is used as the protocol of sharing files between devices. Samba is a file sharing protocol created by Microsoft and used in Windows. And it is widely supported on other platforms.

To install Samba, you can use apt-get which is the package manager in Raspbian. Package manager is the tool you use to install software in Linux most of the time. Before you begin to actually install Samba, run the following command to update apt-get so that you can install the latest version of Samba available

`sudo apt-get update`

Since apt-get can only be used by the root user, we use `sudo` here to run this command as the root user. It will ask you for pi’s password, just type raspberry or the password you changed to.

>In Linux, root user is very powerful. Don’t run commands with sudo unless you have to. Now you can install Samba. Again you need to use `apt-get` with `sudo`. Run

`sudo apt-get install samba samba-common-bin`

>The package manager apt-get will ask you to comfirm installation of Samba and its dependencies, type “Y” to continue.

>In Linux, a program usually does one thing. Because of that, programs relies on other programs. Programs being relied on are called dependencies. Package manager can figure out what dependencies you need and install them for you.

If you finish the installation, you can start editing the configuration file for Samba so that it knows what you want to share. You can use the text editor nano to edit the config file. Run this command

`sudo nano /etc/samba/smb.conf`

>Again, sudo is used here because only the root user has the “write” permission of this config file.
The text editor nano is very easy to use. Just use the arrow keys to navigate in the file.

Scroll down in the config file and find a line where it says

`#               security = user`

Delete the `#` in front to uncomment this line. By doing this, no one can access your shared folder anonymously.

Then scroll down to the bottom of the file and add your sharing configuration. For example, you want to share the folder /home/pi/python_games, then you need to add these lines to the file

```
[test]
comment = sharing test
path = /home/pi/python_games
valid users = pi
force group = users
create mask = 0660
read only = no
```

>You can change the name in [] and the comment to whatever you like. Make sure the path is the correct path.

>If you like to share more folders, just make sure the name in [] and the path are different. Press “Ctrl + X”, then “Y”, then hit “Enter” to save changes and exit nano. Now we need to restart Samba service to load our new configuration file. 

Type this command

`sudo service samba restart`

If you see that samba is stopped and restarted successfully, you are good. The last step for part 3 is to add user pi as a Samba user. Run this command

`smbpasswd -a pi`

Then you can type in the password you like.

>From now on, you can access folders shared by your Pi using the user pi and the password you just set. Please remember that this password is just the password for Samba

If you do not know how to access the folder you just shared, you can look at this tutorial here. Just follow the part which it teaches you how to access the shared folders.