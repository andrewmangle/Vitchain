<?php 
	 set_time_limit(0);
//	 require('web3.php/examples/exampleBase.php');
//	 use Web3\Contract;

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
// Example -> https://www.vitchain.com/credDetail.php?username=9784&credNum=2

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

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Vitchain">
	<!-- <link rel="icon" href="favicon.ico"> ADD LATER -->

	<!-- pull credid from querystring -->
<?php
 	$testAbi = '[ { "constant": false, "inputs": [ { "name": "credAddress", "type": "address" }, { "name": "holderName", "type": "bytes" }, { "name": "vanityAddress", "type": "uint256" }, { "name": "avatar", "type": "bytes" } ], "name": "setVanityCredentialHolder", "outputs": [ { "name": "credentialHolderID", "type": "uint256" } ], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "credAddress", "type": "uint256" } ], "name": "getAvatar", "outputs": [ { "name": "avatar", "type": "bytes" } ], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "", "type": "uint256" } ], "name": "credentialHolders", "outputs": [ { "name": "credentialHolderAddress", "type": "address" }, { "name": "ownerName", "type": "bytes" }, { "name": "numCred", "type": "uint256" }, { "name": "avatar", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "cSval", "type": "bytes" }, { "name": "scaled", "type": "bytes" } ], "name": "setCredentialDetail", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "credAddress", "type": "address" }, { "name": "holderName", "type": "bytes" }, { "name": "avatar", "type": "bytes" } ], "name": "setCredentialHolder", "outputs": [ { "name": "credentialHolderID", "type": "uint256" } ], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credAddress", "type": "uint256" } ], "name": "getCredentialHolder", "outputs": [ { "name": "credentialHolderKey", "type": "address" }, { "name": "owners", "type": "bytes" }, { "name": "ownerscredtally", "type": "uint256" }, { "name": "avatar1", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credAddress", "type": "uint256" }, { "name": "avatarBytes", "type": "bytes" } ], "name": "updateAvatar", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credAddress", "type": "uint256" } ], "name": "numOfCredentials", "outputs": [ { "name": "ownerscredtally", "type": "uint256" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [], "name": "owner", "outputs": [ { "name": "", "type": "address" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" } ], "name": "getVerifiedDetail", "outputs": [ { "name": "v", "type": "bool" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "_newOwner", "type": "address" } ], "name": "changeOwner", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": true, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" } ], "name": "getFullSizedCredential", "outputs": [ { "name": "cSval", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": true, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" } ], "name": "getCredentialDetail", "outputs": [ { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "scaled", "type": "bytes" } ], "payable": false, "stateMutability": "view", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "CredNum", "type": "uint256" }, { "name": "cNval", "type": "bytes" }, { "name": "cTval", "type": "uint8" }, { "name": "cDval", "type": "bytes" }, { "name": "eDate", "type": "uint256" }, { "name": "sDate", "type": "uint256" }, { "name": "cSval", "type": "bytes" }, { "name": "scaled", "type": "bytes" } ], "name": "fixCredentialDetail", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" }, { "constant": false, "inputs": [ { "name": "credentialHolderID", "type": "uint256" }, { "name": "credNum", "type": "uint256" }, { "name": "verified", "type": "bool" } ], "name": "verifyCred", "outputs": [], "payable": false, "stateMutability": "nonpayable", "type": "function" } ]';
	$contractAddress = '0xA1fA39Fa85F64Ec5b02CC958087F3D322010E51f';
	$contract = new Contract('http://127.0.0.1:8545',$testAbi);
	$username1 = $_GET['username'];
	$credDetail = $_GET['credNum'];
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

					global $credentialHoldersKey;
          			global $ownersname;
     				$credentialHoldersKey = $result['credentialHolderKey'];
					$ownersname = $result['owners'];
					$credTally = (int)$temparryholder[0];
					}
			}
	);
?>
	<title>VitChain <?php echo $credentialHoldersKey . " - " . hex2str($ownersname); ?></title>
	<link href="iaas/docs/css/app.css" rel="stylesheet">
</head>


<body>
	<main class="content">
		<div class="container">
			<div class="row"> 
				<div class="col-12">
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
								</div>
								<div class="card-body">
									<tbody>
									<?php
										$functionName = 'getFullSizedCredential';
										$contract->at($contractAddress)->call($functionName, $username1,$credDetail,
														function ($err, $result) {
																if ($err !== null) {
																throw $err;
																}
																if ($result) {	
																	echo "<img class='credImage' src='https://loved-eel.cdn.pirl.live/ipfs/" . substr(hex2str($result["cSval"]), 1) . "'";
																}
													});
											?>
									</tbody>
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
