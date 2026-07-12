@echo off
REM Install CodeCrafters Dependencies
REM This script installs all Laravel packages and resolves IDE errors

setlocal enabledelayedexpansion

echo.
echo ========================================
echo Installing CodeCrafters Dependencies
echo ========================================
echo.

REM Set PHP and Composer paths for Laragon
set PHP_PATH=C:\laragon\bin\php\php-8.3.16-Win32-vs16-x64\php.exe
set COMPOSER_PATH=C:\laragon\bin\composer\composer.phar

REM Check if paths exist
if not exist "%PHP_PATH%" (
    echo Error: PHP not found at %PHP_PATH%
    echo Please update the PHP_PATH in this script
    pause
    exit /b 1
)

if not exist "%COMPOSER_PATH%" (
    echo Error: Composer not found at %COMPOSER_PATH%
    echo Please update the COMPOSER_PATH in this script
    pause
    exit /b 1
)

REM Run composer install
echo Running: composer install...
echo.
"%PHP_PATH%" "%COMPOSER_PATH%" install --no-interaction

if !errorlevel! neq 0 (
    echo.
    echo Error: Composer install failed with exit code !errorlevel!
    pause
    exit /b !errorlevel!
)

echo.
echo ========================================
echo Installation Complete!
echo ========================================
echo.
echo All Laravel packages have been installed.
echo IDE errors should now be resolved.
echo.
echo Next steps:
echo 1. Generate APP_KEY: php artisan key:generate
echo 2. Create database: php artisan migrate
echo 3. Start server: php artisan serve
echo.
pause
