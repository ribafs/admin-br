@echo off
REM Acesse antes o diretório onde descompactou este plugin então execute este script

REM Restaurar tabelas e registros
REM Informar o caminho completo sem a barra final, assim:
REM c:\xampp\htdocs\meuapp

%1\bin\cake migrations migrate -p AdminBr
%1\bin\cake migrations seed -p AdminBr

echo Aguarde a cópia dos arquivos
echo
echo
copy copiar\AppController.php %1\src\Controller
copy copiar\bootstrap_cli.php %1\config

