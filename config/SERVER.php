<?php
#CONFIGURACION DEL SERVIDOR
	#cONSTANTES DE PARAMETROS DE LA CONEXION A LA BD
	#
	const SERVER = "localhost";
	const DB = "prestamos";
	const USER = "root";
	const PASS = "";

	#CONEXION POR PDO
	
	const SGDB = "mysql:host=".SERVER.";dbname=".DB;

	#Encriptar por hash
	const METHOD = "AES-256-CBC";
	const SECRET_KEY = '$PRESTAMOS@2020';
	const SECRET_IV = '037970';