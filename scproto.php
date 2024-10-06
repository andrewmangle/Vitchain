<?php 
	 set_time_limit(0);
//	 require('web3.php/examples/exampleBase.php');
//	 use Web3\Contract;

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

	require ('vendor/autoload.php');
	use Web3\Web3;
	use Web3\Contract;
	use Web3\Providers\HttpProvider;
	use Web3\RequestManagers\HttpRequestManager;
	
	function hex2str($hex) {
    	$str = '';
	    for($i=0;$i<strlen($hex);$i+=2) $str .= chr(hexdec(substr($hex,$i,2)));
    	return $str;
	}

	//$web3 = new Web3(new HttpProvider(new HttpRequestManager('http://localhost:8545')));
?>

<!DOCTYPE html>
<html lang="en">


<! -- 
Source http://roshanbh.com.np/2008/03/url-rewriting-examples-htaccess.html
&
https://www.digitalocean.com/community/tutorials/how-to-rewrite-urls-with-mod_rewrite-for-apache-on-ubuntu-18-04

4) Rewriting yoursite.com/scproto.php?credid=xyz to yoursite.com/xyz
Have you checked zorpia.com.If you type http://zorpia.com/roshanbh233 in browser you can see my profile over there. 
If you want to do the same kind of redirection i.e http://yoursite.com/xyz to http://yoursite.com/user.php?username=xyz 
	then you can add the following code to the .htaccess file.
RewriteEngine On
RewriteRule ^([a-zA-Z0-9_-]+)$ scproto.php?credid=$1
RewriteRule ^([a-zA-Z0-9_-]+)/$ scproto.php?credid=$1 

Type - Type Code
Degree (1)
Credential (2)
License (3)
Employment (4)
Appreciation (5)
Registration (6)
Recognition (7)
Award (8)
Scholarship / Bonus (9)
Other (10)

4 any 4 and over is other Other
Appreciation

Block SSN's and Addresses (Street)




-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="VitChain - Andrew Mangle - 0x11959272127959797a2a5e21bc5ce4a1fdca2d6e">
	<meta name="author" content="Vitchain">
	<!-- <link rel="icon" href="favicon.ico"> ADD LATER -->

	<!-- pull credid from querystring -->
<?php
//	$testAbi = '[ { "constant": false, "inputs": [ { "name": "credAddress", "type": "address" }, { "name": "holderName", "type": "bytes" }, { "name": "vanityAddress", "type": "uint256" } ], "name": "setVanityCredentialHolder", "outputs": [ { "name": "credentialHolderID", "type": "uint256" } ], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "", "type": "uint256" } ], "name": "credentialHolders", "outputs": [ { "name": "credentialHolderAddress", "type": "address", "value": "0x11959272127959797a2a5e21bc5ce4a1fdca2d6e" }, { "name": "ownerName", "type": "bytes", "value": "0x416e64726577204d616e676c65" }, { "name": "numCred", "type": "uint256", "value": "1" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credAddress", "type": "address" }, { "name": "holderName", "type": "bytes" } ], "name": "setCredentialHolder", "outputs": [ { "name": "credentialHolderID", "type": "uint256" } ], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credAddress", "type": "uint256" } ], "name": "getCredentialHolder", "outputs": [ { "name": "credentialHolderKey", "type": "address", "value": "0x11959272127959797a2a5e21bc5ce4a1fdca2d6e" }, { "name": "owners", "type": "bytes", "value": "0x416e64726577204d616e676c65" }, { "name": "ownerscredtally", "type": "uint256", "value": "1" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [ { "name": "credAddress", "type": "uint256" } ], "name": "numOfCredentials", "outputs": [ { "name": "ownerscredtally", "type": "uint256", "value": "1" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [], "name": "owner", "outputs": [ { "name": "", "type": "address", "value": "0x205f070e781a530dde7575c6d6e76f6491cf05d7" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "_newOwner", "type": "address" } ], "name": "changeOwner", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" } ], "name": "getCredentialDetail", "outputs": [ { "name": "cNval", "type": "bytes", "value": "0x" }, { "name": "cTval", "type": "uint8", "value": "0" }, { "name": "cDval", "type": "bytes", "value": "0x" }, { "name": "eDate", "type": "uint256", "value": "0" }, { "name": "sDate", "type": "uint256", "value": "0" }, { "name": "cSval", "type": "bytes", "value": "0x" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "cSval", "type": "bytes" } ], "name": "setCredentialDetail", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" } ]'; // old working 2.7.2020
//        $testAbi = '[ { "constant": false, "inputs": [ { "name": "credAddress", "type": "address" }, { "name": "holderName", "type": "bytes" }, { "name": "vanityAddress", "type": "uint256" }, { "name": "avatar", "type": "bytes" } ], "name": "setVanityCredentialHolder", "outputs": [ { "name": "credentialHolderID", "type": "uint256" } ], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "", "type": "uint256" } ], "name": "credentialHolders", "outputs": [ { "name": "credentialHolderAddress", "type": "address" }, { "name": "ownerName", "type": "bytes" }, { "name": "numCred", "type": "uint256" }, { "name": "avatar", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credAddress", "type": "address" }, { "name": "holderName", "type": "bytes" }, { "name": "avatar", "type": "bytes" } ], "name": "setCredentialHolder", "outputs": [ { "name": "credentialHolderID", "type": "uint256" } ], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credAddress", "type": "uint256" } ], "name": "getCredentialHolder", "outputs": [ { "name": "credentialHolderKey", "type": "address" }, { "name": "owners", "type": "bytes" }, { "name": "ownerscredtally", "type": "uint256" }, { "name": "avatar1", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credAddress", "type": "uint256" }, { "name": "avatarBytes", "type": "bytes" } ], "name": "updateAvatar", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credAddress", "type": "uint256" } ], "name": "numOfCredentials", "outputs": [ { "name": "ownerscredtally", "type": "uint256" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "CredNum", "type": "uint256" }, { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "cSval", "type": "bytes" } ], "name": "fixCredentialDetail", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [], "name": "owner", "outputs": [ { "name": "", "type": "address" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "_newOwner", "type": "address" } ], "name": "changeOwner", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" } ], "name": "getCredentialDetail", "outputs": [ { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "cSval", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "cSval", "type": "bytes" } ], "name": "setCredentialDetail", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" }, { "name": "verified", "type": "bool" } ], "name": "verifyCred", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" } ]';
//	$testAbi = '[ { "constant": false, "inputs": [ { "name": "credAddress", "type": "address" }, { "name": "holderName", "type": "bytes" }, { "name": "vanityAddress", "type": "uint256" }, { "name": "avatar", "type": "bytes" } ], "name": "setVanityCredentialHolder", "outputs": [ { "name": "credentialHolderID", "type": "uint256" } ], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "", "type": "uint256" } ], "name": "credentialHolders", "outputs": [ { "name": "credentialHolderAddress", "type": "address" }, { "name": "ownerName", "type": "bytes" }, { "name": "numCred", "type": "uint256" }, { "name": "avatar", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credAddress", "type": "address" }, { "name": "holderName", "type": "bytes" }, { "name": "avatar", "type": "bytes" } ], "name": "setCredentialHolder", "outputs": [ { "name": "credentialHolderID", "type": "uint256" } ], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credAddress", "type": "uint256" } ], "name": "getCredentialHolder", "outputs": [ { "name": "credentialHolderKey", "type": "address" }, { "name": "owners", "type": "bytes" }, { "name": "ownerscredtally", "type": "uint256" }, { "name": "avatar1", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credAddress", "type": "uint256" }, { "name": "avatarBytes", "type": "bytes" } ], "name": "updateAvatar", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credAddress", "type": "uint256" } ], "name": "numOfCredentials", "outputs": [ { "name": "ownerscredtally", "type": "uint256" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "CredNum", "type": "uint256" }, { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "cSval", "type": "bytes" } ], "name": "fixCredentialDetail", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [], "name": "owner", "outputs": [ { "name": "", "type": "address" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" } ], "name": "getVerifiedDetail", "outputs": [ { "name": "v", "type": "bool" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "_newOwner", "type": "address" } ], "name": "changeOwner", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" } ], "name": "getCredentialDetail", "outputs": [ { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "cSval", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "cSval", "type": "bytes" } ], "name": "setCredentialDetail", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" }, { "name": "verified", "type": "bool" } ], "name": "verifyCred", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" } ]';
//	$testAbi = '[ { "constant": false, "inputs": [ { "name": "credAddress", "type": "address" }, { "name": "holderName", "type": "bytes" }, { "name": "vanityAddress", "type": "uint256" }, { "name": "avatar", "type": "bytes" } ], "name": "setVanityCredentialHolder", "outputs": [ { "name": "credentialHolderID", "type": "uint256" } ], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "", "type": "uint256" } ], "name": "credentialHolders", "outputs": [ { "name": "credentialHolderAddress", "type": "address" }, { "name": "ownerName", "type": "bytes" }, { "name": "numCred", "type": "uint256" }, { "name": "avatar", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "cSval", "type": "bytes" }, { "name": "scaled", "type": "bytes" } ], "name": "setCredentialDetail", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "credAddress", "type": "address" }, { "name": "holderName", "type": "bytes" }, { "name": "avatar", "type": "bytes" } ], "name": "setCredentialHolder", "outputs": [ { "name": "credentialHolderID", "type": "uint256" } ], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credAddress", "type": "uint256" } ], "name": "getCredentialHolder", "outputs": [ { "name": "credentialHolderKey", "type": "address" }, { "name": "owners", "type": "bytes" }, { "name": "ownerscredtally", "type": "uint256" }, { "name": "avatar1", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credAddress", "type": "uint256" }, { "name": "avatarBytes", "type": "bytes" } ], "name": "updateAvatar", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credAddress", "type": "uint256" } ], "name": "numOfCredentials", "outputs": [ { "name": "ownerscredtally", "type": "uint256" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [], "name": "owner", "outputs": [ { "name": "", "type": "address" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" } ], "name": "getVerifiedDetail", "outputs": [ { "name": "v", "type": "bool" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "_newOwner", "type": "address" } ], "name": "changeOwner", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" } ], "name": "getCredentialDetail", "outputs": [ { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "cSval", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "CredNum", "type": "uint256" }, { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "cSval", "type": "bytes" }, { "name": "scaled", "type": "bytes" } ], "name": "fixCredentialDetail", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" }, { "name": "verified", "type": "bool" } ], "name": "verifyCred", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" } ]';
//	$testAbi = '[ { "constant": false, "inputs": [ { "name": "credAddress", "type": "address" }, { "name": "holderName", "type": "bytes" }, { "name": "vanityAddress", "type": "uint256" }, { "name": "avatar", "type": "bytes" } ], "name": "setVanityCredentialHolder", "outputs": [ { "name": "credentialHolderID", "type": "uint256" } ], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "", "type": "uint256" } ], "name": "credentialHolders", "outputs": [ { "name": "credentialHolderAddress", "type": "address" }, { "name": "ownerName", "type": "bytes" }, { "name": "numCred", "type": "uint256" }, { "name": "avatar", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "cSval", "type": "bytes" }, { "name": "scaled", "type": "bytes" } ], "name": "setCredentialDetail", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "credAddress", "type": "address" }, { "name": "holderName", "type": "bytes" }, { "name": "avatar", "type": "bytes" } ], "name": "setCredentialHolder", "outputs": [ { "name": "credentialHolderID", "type": "uint256" } ], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credAddress", "type": "uint256" } ], "name": "getCredentialHolder", "outputs": [ { "name": "credentialHolderKey", "type": "address" }, { "name": "owners", "type": "bytes" }, { "name": "ownerscredtally", "type": "uint256" }, { "name": "avatar1", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credAddress", "type": "uint256" }, { "name": "avatarBytes", "type": "bytes" } ], "name": "updateAvatar", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credAddress", "type": "uint256" } ], "name": "numOfCredentials", "outputs": [ { "name": "ownerscredtally", "type": "uint256" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [], "name": "owner", "outputs": [ { "name": "", "type": "address" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" } ], "name": "getVerifiedDetail", "outputs": [ { "name": "v", "type": "bool" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "_newOwner", "type": "address" } ], "name": "changeOwner", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" } ], "name": "getCredentialDetail", "outputs": [ { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "cSval", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "CredNum", "type": "uint256" }, { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "cSval", "type": "bytes" }, { "name": "scaled", "type": "bytes" } ], "name": "fixCredentialDetail", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" }, { "name": "verified", "type": "bool" } ], "name": "verifyCred", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" } ]';
 	$testAbi = '[ { "constant": false, "inputs": [ { "name": "credAddress", "type": "address" }, { "name": "holderName", "type": "bytes" }, { "name": "vanityAddress", "type": "uint256" }, { "name": "avatar", "type": "bytes" } ], "name": "setVanityCredentialHolder", "outputs": [ { "name": "credentialHolderID", "type": "uint256" } ], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "credAddress", "type": "uint256" } ], "name": "getAvatar", "outputs": [ { "name": "avatar", "type": "bytes" } ], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "", "type": "uint256" } ], "name": "credentialHolders", "outputs": [ { "name": "credentialHolderAddress", "type": "address" }, { "name": "ownerName", "type": "bytes" }, { "name": "numCred", "type": "uint256" }, { "name": "avatar", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "cSval", "type": "bytes" }, { "name": "scaled", "type": "bytes" } ], "name": "setCredentialDetail", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "credAddress", "type": "address" }, { "name": "holderName", "type": "bytes" }, { "name": "avatar", "type": "bytes" } ], "name": "setCredentialHolder", "outputs": [ { "name": "credentialHolderID", "type": "uint256" } ], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credAddress", "type": "uint256" } ], "name": "getCredentialHolder", "outputs": [ { "name": "credentialHolderKey", "type": "address" }, { "name": "owners", "type": "bytes" }, { "name": "ownerscredtally", "type": "uint256" }, { "name": "avatar1", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credAddress", "type": "uint256" }, { "name": "avatarBytes", "type": "bytes" } ], "name": "updateAvatar", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credAddress", "type": "uint256" } ], "name": "numOfCredentials", "outputs": [ { "name": "ownerscredtally", "type": "uint256" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [], "name": "owner", "outputs": [ { "name": "", "type": "address" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" } ], "name": "getVerifiedDetail", "outputs": [ { "name": "v", "type": "bool" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "_newOwner", "type": "address" } ], "name": "changeOwner", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" } ], "name": "getFullSizedCredential", "outputs": [ { "name": "cSval", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" } ], "name": "getCredentialDetail", "outputs": [ { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "scaled", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "CredNum", "type": "uint256" }, { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "cSval", "type": "bytes" }, { "name": "scaled", "type": "bytes" } ], "name": "fixCredentialDetail", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" }, { "name": "verified", "type": "bool" } ], "name": "verifyCred", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" } ]';
//	$contractAddress = '0xF085bF4B0461922FA8BB7603ab2FE8d7Dd0394FD';
//	$contractAddress = '0x8BD52b6a630c28299C73046fa039F87c0b660314'; - old working  2.7.2020
//      $contractAddress = '0xC43d28403D6414f3dB639F44211AbeCeab7E2b66';
//	$contractAddress = '0x611320eDc50583EA5303F7Bb9e7DC0616907045C';
//	$contractAddress = '0x3ADF2Edc9CB1A36eB8Be9f9543847A86c5F04d3c';
//	$contractAddress = '0x3ADF2Edc9CB1A36eB8Be9f9543847A86c5F04d3c';
	$contractAddress = '0xA1fA39Fa85F64Ec5b02CC958087F3D322010E51f';
	$contract = new Contract('http://127.0.0.1:8545',$testAbi);
	$username1 = $_GET['username'];
	//echo $username1;
	//if ($username1 == 'amangle') {
	//	$username1 = '9784';
	//	}
	$functionName = 'getCredentialHolder';
	$credentialHoldersKey;
	$ownersname; 
	$credTally;
	$contract->at($contractAddress)->call($functionName, $username1,
		function ($err, $result) {
            		if ($err !== null) {
                		throw $err;
            		}
            	if ($result) {
			//echo "here 28 ";
			$temparryholder = $result['ownerscredtally']->value;
			//var_dump($temparryholder);
			//var_dump($temparryholder[0]);
			//echo "here 4 " . (int)$temparryholder[0];
			//$credTally = intval($result['ownerscredtally']-> value;
			//echo "The cred tally is now " . $result['ownerscredtally'][0]->value;
			global $credentialHoldersKey;
            		global $ownersname;
            		global $credTally;
					$credentialHoldersKey = $result['credentialHolderKey'];
					$ownersname = $result['owners'];
					$credTally = (int)$temparryholder[0];
						//$result['ownerscredtally'];
					//$avatar = $result['avatar1'];
            		}
		}
	);
	$degrees = 0;
	$credentials = 0;
	$licenses = 0;
	$other = 0;
?>
	<title>VitChain <?php echo $credentialHoldersKey . " - " . hex2str($ownersname); ?></title>
	<link href="iaas/docs/css/app.css" rel="stylesheet">

</head>


<body>
	<!-- <div class="spllash active">
		<div class="splash-icon"></div>
	</div>

	<nav class="navbar navbar-expand navbar-dark bg-dark">
		<div class="container">
			<a class="navbar-brand" href="index.html">
        		VitChain <a href="http://vitchain.com/CheckTheBlockchain.txt">Verify Content on The Blockchain</a></small></small>
		      </a>
		</div>
	</nav> -->
	<div class="header">
		<div class="container">
			<div class="media text-white">
				<?php // -- Need to incorporate avatar img src='https://pirl.live/ipfs/" . substr(hex2str($result["cSval"]), 1) . "' alt='" --> . hex2str($ownersname); . " - " . $credentialHoldersKey . "' /> 
				 // -- img src="iaas/docs/img/headshot.jpg" class="avatar img-fluid rounded-circle mr-3" alt="Andrew  Mangle" /> --> ?>
				<img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=https%3A%2F%2Fexplorer.pirl.network%2Faddress/<?php echo $credentialHoldersKey; ?>" title="<?php echo hex2str($ownersname);?>'s Account" class="avatar img-fluid rounded-circle mr-2" />

				<div class="media-body">
					<h2 class="mb-1 text-white font-weight-bold"><?php echo hex2str($ownersname); ?></h2>
					<h6 class="mb-1 text-white font-weight-normal"><em><a href="https://explorer.pirl.network/address/<?php echo $credentialHoldersKey; ?>"><?php echo $credentialHoldersKey; ?></a></em></h6> 
					<!--<span class=" font-weight-normal">Baltimore, MD 21093</span>  -->
				</div>
			</div>
		</div>
	</div>
	<!-- I would pull in the total credentials for the entity [$credTally] -->
	<!-- For loop  -->


	<main class="content">
		<div class="container">
			<div class="row"> 
				<div class="col-12">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">
									<?php
										$namestring = hex2str($ownersname);
										if (strlen($namestring) > 2)
											{
												echo $namestring . "'s";
											}
										else {
												echo "No Associated";
											}
									?> Credentials</h5>
									<!--<h6 class="card-subtitle text-muted"><?php echo $credentialHoldersKey ?></h6>-->
								</div>
								<div class="card-body">
									<table id="datatables-buttons" class="table table-striped" style="width:100%">
										<thead>
											<tr>
												<th>Credential</th>
												<th class="d-none d-xl-table-cell">Type</th>
												<th class="d-none d-xl-table-cell">Details</th>
												<th class="d-none d-xl-table-cell">End Date</th>
												<th class="d-none d-xl-table-cell">Start Date</th>												
												<th>Source</th>
											</tr>
										</thead>
										<tbody>
											<?php
												for ($x=0; $x <$credTally; $x++)
												{
													echo "<tr>";
													echo "<input type='hidden' name='crednum' value='" . $x . "'>";
													// Then pull each credential individually
													$functionName = 'getCredentialDetail';
													$contract->at($contractAddress)->call($functionName, $username1,$x,
														function ($err, $result) {
																global $x;
																global $username1;
																if ($err !== null) {
																throw $err;
																}
																if ($result) {	
																	echo "<td>" . hex2str($result['cNval']) . "</td>";
																	$holdval = $result['cTval'];
																	switch ($holdval){
																		case '1':
																			global $degrees;
																			echo '<td class="d-none d-xl-table-cell"><span class="badge badge-success">Degree</span></td>';
																			$degrees++;
																			break;
																		case '3':
																			global $credentials;
																			echo '<td class="d-none d-xl-table-cell"><span class="badge badge-primary">Credential</span></td>';
																			$credentials++;
																			break;
																		case '2':
																			global $licenses;
																			echo '<td class="d-none d-xl-table-cell"><span class="badge badge-warning">License</span></td>';
																			$licenses++;
																			break;
																		default:
																			global $other;
																			echo '<td class="d-none d-xl-table-cell"><span class="badge badge-warning">Other</span></td>';
																			$other++;
																	}
																	echo "<td class='d-none d-xl-table-cell'>". hex2str($result['cDval']) . "</td>";
																	if ($result['eDate'] < '1')
																	{
																		echo "<td class='d-none d-xl-table-cell'>No End Date</td>";
																	}
																	elseif (($result['eDate'] < '9993000'))
																	{
																		echo "<td class='d-none d-xl-table-cell'>". substr($result['eDate'], 0, 1) . "." . substr($result['eDate'], 1, 2) . "." . substr($result['eDate'], 3, 4) . "</td>";
																	}
																	else {
																		echo "<td class='d-none d-xl-table-cell'>". substr($result['eDate'], 0, 2) . "." . substr($result['eDate'], 2, 2) . "." . substr($result['eDate'], 4, 4) . "</td>";
																	}

																	if ($result['sDate'] < '1')
																	{
																		echo "<td class='d-none d-xl-table-cell'>No Start Date</td>";
																	}
																	elseif (($result['sDate'] < '9993000'))
																	{
																		echo "<td class='d-none d-xl-table-cell'>". substr($result['sDate'], 0, 1) . "." . substr($result['sDate'], 1, 2) . "." . substr($result['sDate'], 3, 4) . "</td>";
																	}
																	else {
																		echo "<td class='d-none d-xl-table-cell'>". substr($result['sDate'], 0, 2) . "." . substr($result['sDate'], 2, 2) . "." . substr($result['sDate'], 4, 4) . "</td>";
																	}
																	//echo "<td class='d-none d-xl-table-cell'>". $result['cSval'] . "</td>";
																	echo "<td><a href='https://www.vitchain.com/credDetail.php?username=" . $username1 . "&credNum=" . $x ."'><img src='https://loved-eel.cdn.pirl.live/ipfs/" . substr(hex2str($result["scaled"]), 1) . "' width='100' height='100' class='rounded mr-2 mb-2' /></a></td>";
																	// use to be pirl.live/ipfs but too many redirects for safari
															}
													});
													// organize by cred type
													echo "</tr>";
													}
											?>
										</tbody>
										<tfoot>
											<tr>
												<th>Credential</th>
												<th class="d-none d-xl-table-cell">Type</th>
												<th class="d-none d-xl-table-cell">Details</th>
												<th class="d-none d-xl-table-cell">End Date</th>
												<th class="d-none d-xl-table-cell">Start Date</th>
												<th>Source</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>		
					</div>
					<script>
						document.addEventListener("DOMContentLoaded", function(event) {
							// Datatables basic
							$('#datatables-basic').DataTable({
								responsive: true
							});
							// Datatables with Buttons
							var datatablesButtons = $('#datatables-buttons').DataTable({
								lengthChange: !1,
								buttons: ["copy", "print"],
								responsive: true
							});
							datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
						});
					</script>
				</div>	
			</div>
<div class="row">
						<div class="col-6 col-xl-3 d-flex">
							<div class="card flex-fill">
								<div class="card-body py-3">
									<div class="row">
										<div class="col-12 col-sm-4 align-self-center text-center text-sm-left">
											<div class="icon icon-success">
												<i class="align-middle" data-feather="file-text"></i>
											</div>
										</div>
										<div class="col-12 col-sm-8 align-self-center text-center text-sm-right">
											<p class="text-muted mb-1">Degrees</p>
											<h2><i class="text-primary fas fa-user-check"></i>&nbsp;<?php echo $degrees ?></h2>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-6 col-xl-3 d-flex">
							<div class="card flex-fill">
								<div class="card-body py-3">
									<div class="row">
										<div class="col-12 col-sm-4 align-self-center text-center text-sm-left">
											<div class="icon icon-info">
												<i class="align-middle" data-feather="briefcase"></i>
											</div>
										</div>
										<div class="col-12 col-sm-8 align-self-center text-center text-sm-right">
											<p class="text-muted mb-1">Credentials</p>
											<h2><i class="text-primary fas fa-user-check"></i>&nbsp;<?php echo $credentials ?></h2>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-6 col-xl-3 d-flex">
							<div class="card flex-fill">
								<div class="card-body py-3">
									<div class="row">
										<div class="col-12 col-sm-4 align-self-center text-center text-sm-left">
											<div class="icon icon-danger">
												<i class="align-middle" data-feather="credit-card"></i>
											</div>
										</div>
										<div class="col-12 col-sm-8 align-self-center text-center text-sm-right">
											<p class="text-muted mb-1">Licenses</p>
											<h2><i class="text-info fas fa-user-minus"></i>&nbsp;<?php echo $licenses ?></h2>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="col-6 col-xl-3 d-flex">
							<div class="card flex-fill">
								<div class="card-body py-3">
									<div class="row">
										<div class="col-12 col-sm-4 align-self-center text-center text-sm-left">
											<div class="icon icon-warning">
												<i class="align-middle" data-feather="file-plus"></i>
											</div>
										</div>
										<div class="col-12 col-sm-8 align-self-center text-center text-sm-right">
											<p class="text-muted mb-1">Other</p>
											<h2><i class="text-primary fas fa-user-check"></i>&nbsp;<?php echo $other ?></h2>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
		</div>
	</main>
	<script src="iaas/docs/js/app.js"></script>
	<script src="iaas/docs/js/charts.js"></script>
	<script src="iaas/docs/js/forms.js"></script>
	<script src="iaas/docs/js/maps.js"></script>
	<script src="iaas/docs/js/tables.js"></script>

	<svg width="0" height="0" style="position:absolute">
    <defs>
      <symbol viewBox="0 0 512 512" id="ion-ios-pulse-strong"><path d="M448 273.001c-21.27 0-39.296 13.999-45.596 32.999h-38.857l-28.361-85.417a15.999 15.999 0 0 0-15.183-10.956c-.112 0-.224 0-.335.004a15.997 15.997 0 0 0-15.049 11.588l-44.484 155.262-52.353-314.108C206.535 54.893 200.333 48 192 48s-13.693 5.776-15.525 13.135L115.496 306H16v31.999h112c7.348 0 13.75-5.003 15.525-12.134l45.368-182.177 51.324 307.94c1.229 7.377 7.397 11.92 14.864 12.344.308.018.614.028.919.028 7.097 0 13.406-3.701 15.381-10.594l49.744-173.617 15.689 47.252A16.001 16.001 0 0 0 352 337.999h51.108C409.973 355.999 427.477 369 448 369c26.511 0 48-22.492 48-49 0-26.509-21.489-46.999-48-46.999z"></path></symbol>
    </defs>
  </svg>
</body>

</html>
