@ECHO OFF
CLS

REM IF NOT EXIST phpunit.phar curl -L -o phpunit.phar https://phar.phpunit.de/phpunit.phar
REM @php ".\phpunit.phar" --bootsrap phpunit/bootstrap.php --c phpunit.xml
REM - php -f phpunit.pharREM -
REM - phpunit --configuration phpunit.xml --testsuite ip
REM - phpunit --testusite ip
REM - php.exe -f D:\xampp\php\phpunit.phar %*
REM - php D:\xampp\php\phpunit.phar --configuration phpunit.xml --testsuite ip
REM - php phpunit.phar --testsuite clients

REM Specific tests
phpunit --testsuite clients

REM Read the results
CALL MORE logs\testdox.txt
