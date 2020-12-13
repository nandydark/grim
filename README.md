


<p align="center">
	<img src="https://i.imgur.com/qdoV097.jpg" width="200px">
</p>


GRIM IS A INFORMATION GATHERER AND VULNERABILITY TESTER
YOU CAN USE IT ON ANY WEBSITE FOR GETTING ITS INFORMATION


# SCREENSHOT OF THE TOOL
<p align="center">
	<img src="https://i.imgur.com/a9YIv4D.png" width="400px">
</p>


# REQUIREMENTS TO RUN

THIS TOOL CAN RUN ON ALL LINUX PLATFORMS,JUST YOU HAVE TO INSTALL THESE BELOW GIVEN DEPENDENCIES BEFORE USING THIS TOOL FIRST TIME


Sudo apt-get install php

Sudo apt-get install php-xml

Sudo apt-get install php-curl

# FOR INSTALLING DEPENDENCIES ON TERMUX

pkg install php

pkg install php-xml

pkg install php-curl

pkg update && pkg upgrade



# AFTER INSTALLING DEPENDENCIES, COMMANDS FOR RUNNING THIS TOOL


git clone https://github.com/nandydark/grim.git

cd grim

ls

php grim.php


JUST THAT'S IT,NOW YOU CAN SCAN THE WEBSITE AND FETCH ALL INFORMATIONS

# Docker
Docker can help isolate the presence of php.

## Commands

First you need to make a build
```bash
docker build --tag grim .
```

You can run grim using
```bash
docker run -it --rm grim
```
