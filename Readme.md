#installation

To use this repository, do not forget to install composer. (The **doc** is available [here](https://getcomposer.org/))  
and to run the command
>composer install  

or 
>php composer.phar install

(depending of whether you installed it locally or ,globally.)

You'll need to create your own private.yml file, and within it,
 put the following line :   
 >
 >db_config:
 >> name: _'YOUR_DB_NAME'_  
 >> host: _'YOUR_HOST'_  
 >> user: _'YOUR_ADMIN_USERNAME'_  
 >> pass:  _'YOUR_ADMIN_PASSWORD'_
 >
 >

This file should be put in the config folder (or wherever you like, but the motor will need it
, so it seems logical to put it there...). 

As for the public.yml, it contains some datas for the motor (such as where to find the 
developer files for the game, which will need to extend the Motor classes) 

#use

The motor itself is in the Motor folder.  
The test folder contains an example of how to use the motor with a game of 3 small horses.  
As a reminder, please note that you'll need to make sure all your entities extend the 
corresponding entities given in the Motor folder.
  