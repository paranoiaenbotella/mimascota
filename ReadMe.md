# Configuration #

## Apache ##

```apacheconfig
<VirtualHost *:80>
    ##ServerAdmin webmaster@dummy-host2.example.com
    <Directory "C:/XAMPP/htdocs/mimascota/public">
        AllowOverride none
        DirectoryIndex index.php
        Require local
    </Directory>
    DocumentRoot "C:/XAMPP/htdocs/mimascota/public"
    ServerName mimascota.com
    ##ErrorLog "logs/dummy-host2.example.com-error.log"
    ##CustomLog "logs/dummy-host2.example.com-access.log" common
</VirtualHost>
```
