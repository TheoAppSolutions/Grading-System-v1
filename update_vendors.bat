@echo off
set /p id="Install in Production Mode? ([Y] = Yes, [N] = No):' "

if %id%==y (
php composer.phar update --no-dev
goto make_env
)
if %id%==Y (
php composer.phar update --no-dev
goto make_env
)
if %id%==n (
php composer.phar update
goto make_env
)
if %id%==N (
php composer.phar update
goto make_env
) else (
echo Input Invalid. Must Choose Either Y or N.
goto end
)

:make_env
if exist ".env" (
    goto end
) else (
    echo File .env does not exists. Creating...
    copy .env.example .env
    echo Done
    goto end
)

:end

pause
