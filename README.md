# searchIP

It is a PHP/MySQL/JavaScript website which uses MySQL for the results.

# Offline search

You will need to install apache2, php-7, MySQL

```
sudo apt-get install mysql-server mysql-client php-mysql apache
```

Once you have install them, copy the file in the DocumentationRoot. Usually is /var/www/html

```
cp {index.html,searchFunc.php,search.php,showData.js} /var/www/html/
```

Start the apache
```
sudo systemctl start apache2 or sudo systemctl start httpd
```

Start MySQL server
```
sudo systemctl start mysqld
```

Download the schema with data and load it to mysql

It will create the schema and will load the data you need for search IP.


# OnLine search

In your browser (javascript support enabled) type: http://giwma.asuscomm.com


