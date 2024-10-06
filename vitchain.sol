// Source -> https://ethereum.stackexchange.com/questions/13167/are-there-well-solved-and-simple-storage-patterns-for-solidity

// This stores the detail data, the tally is accurate, and the information works
// Next step - iterate the data - but do I need to?
	// Just need to return the data
	// credTally would provide the iterator (provides total - subtract one for a loop :) )
	
import "./Ownable.sol";
//https://github.com/OpenZeppelin/openzeppelin-solidity/blob/master/contracts/ownership/Ownable.sol
// source https://blog.colony.io/writing-more-robust-smart-contracts-99ad0a11e948/

pragma solidity ^0.4.18;

contract VitChain1_3 is Ownable {

// test address - > 0x11959272127959797a2a5e21bc5ce4a1fdca2d6e
// test name "Andrew Mangle" in bytes -> 0x416e64726577204d616e676c65
// ASCII to Bytes -> https://onlineasciitools.com/convert-ascii-to-bytes
// Avatar -> QmRnmHxb79AFng68dcLtCXUHNNPq4mgRPWgMLFFMdjG35X -> 0x68747470733a2f2f6f6e6c696e656173636969746f6f6c732e636f6d2f636f6e766572742d61736369692d746f2d6279746573

/*
 Functions of the Smart Contracts
  1. Store a person's information - name, Pirl address, avatar
  2. Store a person's credentials - cred name, cred type, cred detail, cred start, cred end, cred source
  3. Update unique id < 9784
  4. Add a "verification" / verified to a credential
  5. Update Avatar


 Need to check the impact of the isVerified on individual credentials

 Need to create Vitchain wallets
  1. Stores the PIRL to give to customers
  2. Owns the Vitchain Smart Contract
	
*/


// Initial credential holder is 9784  (As a result of Set Credential Holder)
// Set Credential Holder needs ->
    // Credntial credentialHolderID  = 9784
    // cnval (credentialName) = 0x42616368656c6f7273206f6620536369656e6365 (Converted into bytes - Bachelors of Science)
    // ctval (credentialType) = 1 (unsigned integer)
            //  1 - Degree, 2 - Liecense, 3 - Credential, 4 - Employment, 5 - Registration, 6 - Recognition, 7 - Reference, 8 - Appreciation
            // Add more later
    // cdval (credentialDetail) = 0x436f6d707574657220536369656e636509 (Converted into bytes - Computer Science)
    // edate (endDate) = (mmddyyyy)
    // sDate (startDate) = 5202002 (mmddyyyy)
    // cSval (credentialSource - ipfs locaiton) = 0x516d563457574633324a374164363731464c6f4347675a4b37355367346668766444366f69767752566577625058 (Converted into bytes - QmV4WWF32J7Ad671FLoCGgZK75Sg4fhvdD6oivwRVewbPX)
    // cSval2 (can be 0x if blank)
    
// Need to make CredentialHolders Private? 
// Restrict updates to only certain addresses

// Make the contract upgradeable 
        // https://ethereum.stackexchange.com/questions/2404/upgradeable-smart-contracts
        // https://ethereum.stackexchange.com/questions/11938/how-to-update-a-deployed-smart-contract
        
// need to restrict to only owner (onlyOwner) on set methods

  	struct Credential{
  		// contains the credentials of the credential holder - add more
  		// solidity data types https://solidity.readthedocs.io/en/v0.4.24/types.html
  		bytes credentialName;
  		uint8 credentialType;
  		bytes credentialDetail;
		// can we store a "verified" to the credentials  //9.6.2019
		bool isVerified;// can i initialize this to false and then change it? - no
  		uint256 endDate;
  		uint256 startDate;
  		//bytes credentialContact; // store this information locally if necessary based on credential name
  		bytes credentialSource;
  		bytes credentialSourceScaled; // scaled version of the credentialSource
  	    //bytes credentialSource2;
  	    // store a secondary source in a database if necessary
  	}

	struct credentialHolder {  //EntityStruct
		// Assumptions - Each Credential Holder will have one Address & multiple creds
	     address credentialHolderAddress;
	     //bool isVerified; // need this on the actual credential
    	 bytes ownerName;
    	 uint numCred;
    	 bytes avatar;
	  	 mapping (uint => Credential) creds;    	 // Need array of structs in a struct		// Address1-3, // Contact1-3,  	// Type , // FacilityID, // Id1-X, // Id1-XType	
  	}
  	
  	uint numVitChainLinks = 9784;	
  	// using a uint we reference the credentials by the address
  	// changed credentialHolder to private
	mapping(uint => credentialHolder) public credentialHolders;  // Map a credential holder to an address
	// *** I THINK THIS SHOULD BE PRIVATE !!! *** CHECK BACK LATER **1.22.2019 // Have I tested this as private? 9.6.2019
	
	//address[] public credentialHolderList;	// Create an array of credential holders
		// i like the idea, can't get it work.

    // sets the data
  	function setCredentialDetail(uint credentialHolderID, bytes cNval, uint8 cTval, bytes cDval, uint256 eDate, uint256 sDate, bytes cSval, bytes scaled) onlyOwner {
  		credentialHolder storage c = credentialHolders[credentialHolderID];
  		c.creds[c.numCred]=Credential(cNval, cTval, cDval, false, eDate, sDate, cSval, scaled);
  		c.numCred++;
  	}
  	
   function getCredentialDetail(uint credentialHolderID, uint credNum) public view returns (bytes cNval, uint8 cTval, bytes cDval, uint256 eDate, uint256 sDate, bytes scaled){
  	    // I have the specific credential Holder - credentialHolderID
  	    // I have the specific credential number  
  	    // Need to loop through this method multiple times based on the 
  	    //    number of credentials for the address
  		//Credential c = credentialHolders[credentialHolderID].creds[credNum];
  		return (credentialHolders[credentialHolderID].creds[credNum].credentialName, credentialHolders[credentialHolderID].creds[credNum].credentialType, credentialHolders[credentialHolderID].creds[credNum].credentialDetail, credentialHolders[credentialHolderID].creds[credNum].endDate, credentialHolders[credentialHolderID].creds[credNum].startDate, credentialHolders[credentialHolderID].creds[credNum].credentialSourceScaled);
  		//c.creds[c.numCred]=Credential(cNval, cTval, cDval, eDate, sDate, cSval);
  		// I hope I can send all of the above - fingers crossed :P
		// what happens if I add a bool? 9.6.2019
  	}
  	
  	function getFullSizedCredential(uint credentialHolderID, uint credNum) public view returns (bytes cSval)
  	{
  	     // Display the scaled version of the credential until clicked.  
  	     // Need to direct to another page once clicked
  	     return (credentialHolders[credentialHolderID].creds[credNum].credentialSource);
  	}
  	
  	function getVerifiedDetail(uint credentialHolderID, uint credNum) public view returns (bool v){
  	    return (credentialHolders[credentialHolderID].creds[credNum].isVerified);
  	}
 

   /*function getBackupSource(uint credentialHolderID, uint credNum) public view returns (bytes cSval2){ //remove? 9.6.2019
  	    // I have the specific credential Holder - credentialHolderID
  	    // I have the specific credential number  
  	    // Need to loop through this method multiple times based on the 
  	    //    number of credentials for the address
  		//Credential c = credentialHolders[credentialHolderID].creds[credNum];
  		return (credentialHolders[credentialHolderID].creds[credNum].credentialSource2);
  		//c.creds[c.numCred]=Credential(cNval, cTval, cDval, eDate, sDate, cSval);
  		// I hope I can send all of the above - fingers crossed :P
  	}*/
  	
  	function setCredentialHolder(address credAddress, bytes holderName, bytes avatar) onlyOwner returns (uint credentialHolderID)  {
		// Keeps a tally of the number of credential holders
		// Links the link number to an address
		// creates a credentialHolder account
		credentialHolderID = numVitChainLinks++; 
		credentialHolders[credentialHolderID] = credentialHolder(credAddress,holderName,0,avatar);
		//credentialHolderList[credentialHolderID] = credAddress;
			// idea makes sense, but i cannot get it to work
  }

  	function setVanityCredentialHolder(address credAddress, bytes holderName, uint vanityAddress, bytes avatar) onlyOwner returns (uint credentialHolderID)  {
		// Keeps a tally of the number of credential holders
		// Links the link number to an address
		// creates a credentialHolder account
		credentialHolderID = vanityAddress; 
		credentialHolders[credentialHolderID] = credentialHolder(credAddress,holderName,0,avatar);
		//credentialHolderList[credentialHolderID] = credAddress;
			// idea makes sense, but i cannot get it to work
  }
  
  function getAvatar (uint credAddress) public returns (bytes avatar)
  {
      return (credentialHolders[credAddress].avatar);
  }

	function numOfCredentials(uint credAddress) public view returns (uint ownerscredtally){
		ownerscredtally = credentialHolders[credAddress].numCred; // is this necessary? 9.6.2019
		// this will need to be redone
	    //maybe it will work -> since number of Cred is in credentialHolder
	        // Need a function to pull the credentials
	    return ownerscredtally;
	}
	
	// Don't even need if credential owners is public
	function getCredentialHolder(uint credAddress) public view returns (address credentialHolderKey, bytes owners, uint ownerscredtally, bytes avatar1){
	    //credentialHolder storage c = credentialHolders[credAddress];
		return (credentialHolders[credAddress].credentialHolderAddress, credentialHolders[credAddress].ownerName, credentialHolders[credAddress].numCred, credentialHolders[credAddress].avatar);
	}

    // Ability to update avatar
	function updateAvatar(uint credAddress, bytes avatarBytes) onlyOwner {
		credentialHolders[credAddress].avatar = avatarBytes;
	}

    // Ability to 'verify' a credential // added 9.6.2019
	function verifyCred(uint credentialHolderID, uint credNum, bool verified) onlyOwner {
		credentialHolders[credentialHolderID].creds[credNum].isVerified = verified;
	}

    // Ability to fix/update a single credential - need to double check this :)
    function fixCredentialDetail(uint credentialHolderID, uint CredNum, bytes cNval, uint8 cTval, bytes cDval, uint256 eDate, uint256 sDate, bytes cSval, bytes scaled) onlyOwner {
  		// need to prevent an error - need to make sure the credentialHolder exists?
  		// can do this on server side, but backend would be better
  		credentialHolder storage c = credentialHolders[credentialHolderID];
  		// check to see if something is in the credential otherwise dump it
  		if (c.creds[CredNum].credentialName.length == 0) revert();
  		c.creds[CredNum]=Credential(cNval, cTval, cDval, c.creds[CredNum].isVerified, eDate, sDate, cSval, scaled);
  	}

}
