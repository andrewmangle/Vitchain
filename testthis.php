<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$httpClient = ('http://127.0.0.1:8545');
/* read a smart contract 
$abi = '[ { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash9", "type": "bytes32" } ], "name": "PatientHash9", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash3", "type": "bytes32" } ], "name": "PatientHash3", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash8", "type": "bytes32" } ], "name": "PatientHash8", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "HashN", "type": "bytes32" } ], "name": "PatientHashN", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash7", "type": "bytes32" } ], "name": "PatientHash7", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash4", "type": "bytes32" } ], "name": "PatientHash4", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash5", "type": "bytes32" } ], "name": "PatientHash5", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "typeID", "type": "uint8" }, { "name": "PRHash", "type": "bytes32" } ], "name": "newPatient", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [], "name": "owner", "outputs": [ { "name": "", "type": "address", "value": "0x0c0c665b6db2b5535c0c434d32a8700b45394900" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [ { "name": "patientID", "type": "uint32" } ], "name": "getPatientRecordA", "outputs": [ { "name": "patienttype", "type": "uint8", "value": "0" }, { "name": "hash1", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash2", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash3", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash4", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash5", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash6", "type": "bytes32" } ], "name": "PatientHash6", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "patientID", "type": "uint32" } ], "name": "getPatientRecordB", "outputs": [ { "name": "patienttype", "type": "uint8", "value": "0" }, { "name": "hash6", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash7", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash8", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hash9", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" }, { "name": "hashN", "type": "bytes32", "value": "0x0000000000000000000000000000000000000000000000000000000000000000" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "patientID", "type": "uint32" }, { "name": "Hash2", "type": "bytes32" } ], "name": "PatientHash2", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "inputs": [], "payable": true, "stateMutability": "payable", "type": "constructor" } ]';
$data = array(
        "jsonrpc" => "2.0",
        "method" => "web3_sha3",
        "params" => ['0xDba6d0A315043740A262eFfe2e018d0F95ec536E','0',
		     'latest'],
        "id"=>1);
*/
/* - Works for reading balances 
*/
$data = array(
	"jsonrpc" => "2.0",
	"method" => "eth_getBalance",
	"params" => ['0xBE849DFEF2B6FA735C7AA2bb75AcbaC24c93838B','latest'],
	"id"=>1);

$json_encoded_data = json_encode($data);
var_dump($json_encoded_data);

$ch = curl_init($httpClient);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_encoded_data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($json_encoded_data))
        );

        $result = json_decode(curl_exec($ch));
        curl_close($ch);

        $parsed = $result->result;
	echo  $parsed. "These are the results </br>";
	$totalpirl = hexdec($parsed)/1000000000000000000;
	echo 'Total PIRL ' . $totalpirl;



