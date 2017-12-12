@ECHO OFF
REM IF NOT EXIST phpunit.phar curl -L -o phpunit.phar https://phar.phpunit.de/phpunit.phar
REM @php ".\phpunit.phar" --bootsrap phpunit/bootstrap.php --c phpunit.xml
REM - php -f phpunit.pharREM -
REM - phpunit --configuration phpunit.xml --testsuite ip
REM - phpunit --testusite ip
REM - php.exe -f D:\xampp\php\phpunit.phar %*
REM - php -f D:\xampp\php\phpunit.phar --configuration phpunit.xml --testsuite ip
cls
phpunit
CALL MORE logs\testdox.txt
