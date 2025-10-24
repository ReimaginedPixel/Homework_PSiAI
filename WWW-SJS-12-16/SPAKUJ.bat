@echo off
echo =====================================
echo   PAKOWANIE PROJEKTU WWW-SJS-12-16
echo =====================================
echo.

cd /d "%~dp0"

echo Tworzenie archiwum ZIP...
echo.

powershell -command "Compress-Archive -Path '.\*' -DestinationPath '..\WWW-SJS-12-16.zip' -Force"

if %errorlevel% equ 0 (
    echo.
    echo =====================================
    echo   SUKCES!
    echo =====================================
    echo.
    echo Plik WWW-SJS-12-16.zip zostal utworzony
    echo Lokalizacja: C:\Users\Admin\Desktop\
    echo.
    echo
    echo.
) else (
    echo.
    echo =====================================
    echo   BLAD!
    echo =====================================
    echo.
    echo Nie udalo sie utworzyc archiwum.
    echo Sprobuj recznie przez explorer.
    echo.
)

pause
