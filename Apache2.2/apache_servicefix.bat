@ECHO OFF

if "%OS%" == "Windows_NT" goto WinNT

:Win9X
ECHO.
ECHO #######  Sorry! Apache can not run as Services under Win9x  #######
ECHO #######  Please use apache_start.bat instead  #######
ECHO.
goto exit

:WinNT
ECHO.
ECHO #######  Apache Service Fixed #######
ECHO.
bin\httpd -k stop -n "Apache2.2"
bin\httpd -k uninstall  -n "Apache2.2"
bin\httpd -k install  -n "Apache2.2"

ECHO.
ECHO ####### Now Starting Apache...  #######
ECHO.
net start Apache2.2

:exit
ECHO.
pause