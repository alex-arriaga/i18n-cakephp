Tips avanzados con CakePHP
==========================

En este demo encontrarás los siguientes ejemplos:

- Cómo configurar otro idioma por defecto para CakePHP utilizando **l10n** (Localization).
- Traducción de los **select** para un campo de fecha (uso del archivo **LC_TIME**: https://github.com/cakephp/localized)
- Ejecución de código personalizado antes de guardar. En este caso existe un campo "age" en la tabla "users" que se calcula justo antes de ejectar el `save()`. Se muestra un método `private` que realiza ese cálculo.
- Ejemplos de archivos **cake.po** para soporte de **i18n** (Internazionalization) en español (app/Locale/spa/LC_MESSAGES/cake.po) y francés (app/Locale/fra/LC_MESSAGES/cake.po): http://book.cakephp.org/2.0/en/core-libraries/internationalization-and-localization.html. Más información sobre *Codes for the Representation of Names of Languages*: http://www.loc.gov/standards/iso639-2/php/code_list.php


Para el correcto funcionamiento de este ejemplo, seguir los siguiente pasos:

1. Al **clonar** por favor utiliza la opción `--recursive` de Git

`git clone --recursive https://github.com/alex-arriaga/i18n-cakephp.git`

Esto descargará el repositorio principal, pero además descargará un submódulo: **DebugKit**

2. Importa la base de datos que viene en el archivo

database/i18n-cakephp-bd.sql

3. Configura el archivo **app/Config/database.php**, por defecto usa estos datos:
<pre>
<code>
    public $default = array(
		'datasource' => 'Database/Mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'i18n-cakephp-usr',
		'password' => 'i18n-cakephp-bd-pass',
		'database' => 'i18n-cakephp-bd',
		'prefix' => '',
		//'encoding' => 'utf8',
	);
</code>
</pre>

4. Accede a una URL de demo por ejemplo: **http://localhost/projects/i18n-cakephp/users**
5. Si usas la URL **http://localhost/projects/i18n-cakephp/users/add** notarás que los meses del año están traducidos a español.

Algunos enlaces de interés
--------------------------

[CakePHP](http://www.cakephp.org) - The rapid development PHP framework

[CookBook](http://book.cakephp.org) - THE CakePHP user documentation; start learning here!

[API](http://api.cakephp.org) - A reference to CakePHP's classes

[Plugins](http://plugins.cakephp.org/) - A repository of extensions to the framework

[The Bakery](http://bakery.cakephp.org) - Tips, tutorials and articles

[Community Center](http://community.cakephp.org) - A source for everything community related

[Training](http://training.cakephp.org) - Join a live session and get skilled with the framework

[CakeFest](http://cakefest.org) - Don't miss our annual CakePHP conference

[Cake Software Foundation](http://cakefoundation.org) - Promoting development related to CakePHP

![Cake Power](https://raw.github.com/cakephp/cakephp/master/lib/Cake/Console/Templates/skel/webroot/img/cake.power.gif)
