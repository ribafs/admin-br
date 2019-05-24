#!/bin/bash

# Acesse antes o diretório onde descompactou este plugin então execute este script

# Restaurar tabelas e registros
$1/bin/cake migrations migrate -p AdminBr
$1/bin/cake migrations seed -p AdminBr

# Copiar arquivos
cp copiar/AppController.php $1/src/Controller
cp copiar/bootstrap_cli.php $1/config

