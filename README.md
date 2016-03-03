Sauerkraut
==========

Les plugins suivants sont nécessaires :

- Co Author plus : http://wordpress.org/plugins/co-authors-plus/
- Link manager : http://wordpress.org/plugins/link-manager/

Ajouter la ligne suivante 
```php
if(is_admin()) { add_filter('filesystem_method', create_function('$a', 'return "direct";' )); define( 'FS_CHMOD_DIR', 0751 );     }
```
pour pouvoir mettre à jour wordpress en local


### Liens utiles pour travailler avec wordpress : ###

- [underscores.me](http://underscores.me)

Custom scrollbar 
http://manos.malihu.gr/jquery-custom-content-scroller/
