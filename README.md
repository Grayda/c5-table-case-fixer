# c5-table-case-fixer

If you've ever set up Concrete5 on a Windows machine, you'll know that migrating to a Linux host is a nightmare. Apps like XAMPP force lowercase table names and when you move to a case sensitive environment, your whole site breaks.

There are other solutions available, but some are addons that you install and run on your C5 site and didn't work for me, so I wrote a PHP script that recursively scans through every folder in your C5 folder, extracts the table names from them, and generates a bunch of SQL queries that you can import using phpMyAdmin or via the command line.

This does everything, except Express stuff. I'll probably update this script at some point in the future to extract the object names and generate queries based on that, but this served my purposes perfectly.

Because db.xml files have been around since day dot, it should be compatible with future versions of C5.

## Installation & Usage

Drop this file into the top level of your C5 site. So if your site is in `/var/www/html/c5`, put it there (**NOT in `/var/www/html/`, or in `/`, or in `/var/www/html/application`!**). To run it, just visit the URL in the browser.
