Todo_list
=========

Setup
-----

Note: The tool was tested with PHP 5.3.3. 

1. Copy the files `index.php` and `configuration.php` to a directory that can be accessed by your webserver.  
    You may want to use HTTP Authentification to protect the directory from unwanted access.

2. Execute the data from `schema.sql` at your MySQL-Server. You may want to create a seperate Database and/or a seperate user for this tool.

3. Adjust the file `configuration.php` to the values that fit with your MySQL-setup.


Usage
-----

Access `index.php` with your browser. The interface should be self-explaining. If not, let me know and I'll documentate it.

Requirements
------------

* PHP 5 or later with mysql-support (tested with PHP 5.3.3)
* MySQL-Server

License
-------

Todo_list let's you organize your tasks.

Copyright (C) 2013 Simon Plasger

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

See COPYING for details.

