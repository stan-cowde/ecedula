#!/bin/bash

# Check for existing installations and install if missing

# PHP
if ! command -v php &> /dev/null; then
    echo "PHP not found. Installing..."
    choco install php --yes
else
    echo "PHP already installed."
fi

# MySQL
if ! command -v mysql &> /dev/null; then
    echo "MySQL not found. Installing..."
    choco install mysql --yes
else
    echo "MySQL already installed."
fi

# Node.js and npm
if ! command -v node &> /dev/null; then
    echo "Node.js not found. Installing..."
    choco install nodejs --yes
else
    echo "Node.js and npm already installed."
fi

# Composer
if ! command -v composer &> /dev/null; then
    echo "Composer not found. Installing..."
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php composer-setup.php
    php -r "unlink('composer-setup.php');"
    mv composer.phar /usr/local/bin/composer
else
    echo "Composer already installed."
fi

# Run setup commands
echo "Running npm install..."
start "npm install" cmd /c "npm install"
echo "Running composer install..."
start "composer install" cmd /c "composer install"
echo "Running php artisan serve..."
start "php artisan serve" cmd /c "php artisan serve &"

# Start MySQL server in the background
net start mysql
echo "MySQL server started in the background."

echo "Setup complete!"