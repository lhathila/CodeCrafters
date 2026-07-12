#!/bin/bash
# Install CodeCrafters Dependencies for Linux/Mac

echo ""
echo "========================================"
echo "Installing CodeCrafters Dependencies"
echo "========================================"
echo ""

# Run composer install
echo "Running: composer install..."
echo ""
composer install

if [ $? -ne 0 ]; then
    echo ""
    echo "Error: Composer install failed"
    exit 1
fi

echo ""
echo "========================================"
echo "Installation Complete!"
echo "========================================"
echo ""
echo "All Laravel packages have been installed."
echo "IDE errors should now be resolved."
echo ""
echo "Next steps:"
echo "1. Generate APP_KEY: php artisan key:generate"
echo "2. Create database: php artisan migrate"
echo "3. Start server: php artisan serve"
echo ""
