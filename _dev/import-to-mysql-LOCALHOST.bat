@echo off
set db=empressia_app

echo Import bazy z pliku .sql do serwera MySql

echo SET FOREIGN_KEY_CHECKS = 0; >tmp.sql
echo CREATE TABLE `sakjhfkajsdhfiauewhiuhiasudf`( `id` INT ); >>tmp.sql
echo SET @tables = NULL; >>tmp.sql
echo SELECT GROUP_CONCAT(table_schema, '.', table_name) INTO @tables>>tmp.sql
echo   FROM information_schema.tables >>tmp.sql
echo   WHERE table_schema = '%db%';>>tmp.sql
echo SET @tables = CONCAT('DROP TABLE ', @tables);>>tmp.sql
echo PREPARE stmt FROM @tables;>>tmp.sql
echo EXECUTE stmt;>>tmp.sql
echo DEALLOCATE PREPARE stmt;>>tmp.sql
echo SET FOREIGN_KEY_CHECKS = 1;>>tmp.sql

type sql\empressia_app.sql >> tmp.sql
C:\xampp\mysql\bin\mysql.exe -u root -p %db% < tmp.sql
del tmp.sql
echo Pomyslnie zaimportowano baze do serwera MySql
pause >nul