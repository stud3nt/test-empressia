@echo off 
echo Eksport bazy do pliku .sql
C:\xampp\mysql\bin\mysqldump.exe -u root empressia_app --add-drop-table > sql\empressia_app.sql
echo Eksport bazy do pliku .sql zakonczony powodzeniem
pause >nul