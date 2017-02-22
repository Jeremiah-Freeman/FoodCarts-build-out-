By Jeremiah Freeman

## Description/Specs

    Food-Cart Yelp.  Web app to sort Food-Cart by category and add a Food-Cart.



| Behavior | Input 1 | Input 2 | Output |
|-|-|-|-|
| Create cuisine object | new Cuisine("thai") | - | Thai = cuisine object -> getType() |
| Test cuisine id | new Cuisine("thai", 1) | - | 1 = cuisine object->getID() |
| Test cuisine save | new Cuisine("thai") / call save()|-| Cuisine::getAll() != null|
| Test cuisine getAll | new Cuisine("thai")/new Cuisine("indian") / call getAll() | - | Cuisine::getAll() == [object1, object2] |
| Test cuisine deleteAll | new Cuisine("thai")/new Cuisine("indian") / call deleteAll() |-| Cuisine::deleteAll() == [] |
| Test cuisine 'find' | new Cuisine("thai")/new Cuisine("indian") / call find(thai object id) | - | Cuisine::find() == Thai object |





Setup/Installation Requirements

Open web browser. +* Clone this, "" repository.
Open Terminal.
If using Mac computer run this code in terminal if 'Composer' has not been previously installed.
cd ~ -sudo mkdir -p /usr/local/bin -sudo chown -R $USER /usr/local/ -curl -sS https://getcomposer.org/installer | php -mv composer.phar /usr/local/bin/composer
If running a windows computer and 'Composer' has not been previously installed: -please go to this address, a download will automatically install: "https://getcomposer.org/Composer-Setup.exe". -follow all setup and installation instructions.
Change directory to AddressBook-php and type 'composer install'.
Change directory to the 'web' folder and type 'php -S localhost:8000'.
Finally enter 'localhost:8000' into your local browser and press enter.
Known Bugs

There are no known bugs.

Support and contact details

If you notice bugs or would like to contribute in any way please contact me at jaythinkshappiness@gmail.com

Technologies Used

HTML PHP Twig Silex Bootstrap

License

GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 Copyright (C) 2007 Free Software Foundation, Inc.
