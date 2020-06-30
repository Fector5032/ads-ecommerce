<?php 
	const SERVER = "localhost";
	const DB = "ecommerce";
	const USER = "root";
	const PASSWORD = "";
	const CHARSET = "UTF8";
	const DRIVER = "mysql";

	const SGBD = DRIVER.":host=".SERVER.";dbname=".DB;
	const COLLATION = "SET NAMES ".CHARSET;

	const METHOD = "AES-256-CBC";
	const SECRET_KEY = '$BP@2019';
	const SECRET_IV = '20091999';
?>
