# Vitchain
Blockchain Credential Storage System - Ethereum Smart Contract with Web API &amp; IPFS Integration

This repository contains a Solidity-based Ethereum smart contract designed to securely store and verify credentials such as transcripts, certifications, awards, and achievements. The system leverages IPFS (InterPlanetary File System) to store credentials off-chain while using Ethereum's blockchain to maintain verifiable proof and integrity. It also includes a web-based API and a web library to facilitate seamless interaction with the system.

Vitchain was designed to run on the Pirl.io blockchain and their IPFS implementation (https://docs.pirl.io/)

Features:

Decentralized Credential Storage: Credentials such as transcripts, certifications, awards, and achievements are securely stored off-chain on IPFS, with their cryptographic hashes recorded on the Ethereum blockchain for authenticity and immutability.

Smart Contract Automation: The contract automates the process of storing, retrieving, and verifying credentials, ensuring transparency and trust.

Web API: A RESTful API allows external systems to interact with the smart contract, enabling secure upload and verification of credentials via an easy-to-use interface.

Web Library: A JavaScript/TypeScript-based web library is provided to interact with the Ethereum blockchain and IPFS, utilizing Web3.js for back-end integration.

Immutable Records: Credentials stored on IPFS and verified through the blockchain provide permanent, tamper-proof records that can be accessed by third parties (e.g., employers, academic institutions).

User Ownership and Privacy: Users fully own their credentials and control access through their private keys, ensuring privacy and security.

Transparency and Auditability: All interactions and credential transactions are logged on the blockchain, providing a transparent and auditable trail for verification.

Technology Stack:

Solidity: Ethereum smart contract language for managing credential data.

PIRL/EVMm: Blockchain platform to store cryptographic proofs and manage interactions.

IPFS (InterPlanetary File System): A decentralized storage system for storing off-chain credential data, ensuring availability and integrity.

OpenZeppelin: Secure, modular smart contract components for managing access control, ownership, and other features.

Web3.js: Web libraries for integrating the Ethereum blockchain and smart contracts with front-end applications.

Node.js: Backend technology to serve the web-based API and manage requests for credential storage and retrieval.

Use Cases:

Educational Institutions: Securely store and distribute verifiable academic transcripts, degrees, and certifications for students.

Professional Certification: Organizations can issue verifiable certifications and awards, allowing employers to trust the credentials presented by job applicants.

Personal Achievements: Individuals can securely store awards and achievements on the blockchain, ensuring their accomplishments are tamper-proof and easily shareable.

Employers and Verifiers: Employers or third parties can easily verify the authenticity of credentials without relying on intermediaries, using blockchain proofs.

Getting Started:
1. Clone the repository.
2. Install dependencies.
3. Deploy the Solidity smart contract on the Ethereum network or a local testnet using Truffle or Hardhat.
4. Set up the web-based API using Node.js and Express for interaction with the smart contract and IPFS.
5. Use the provided web library (Web3.js) to interact with the Ethereum network from your web application.
6. Interact with the system via Metamask for signing transactions and uploading credentials to IPFS.

API Endpoints:
1. POST /store-credential: Uploads a credential to IPFS and stores its hash on the blockchain.
2. GET /verify-credential/:hash: Verifies the integrity and authenticity of a credential.
3. GET /credentials/:userAddress: Fetches all credentials associated with a given Ethereum address.

Additional endpoints for managing user interactions and credential storage will be documented in the API documentation.

Future Development:
0. Moving to a supportive blockchain such as XRPL or Ethereum
1. NFT Integration: Enable credentials to be minted as NFTs for secure, tokenized ownership and transferability.
2. Multi-Chain Support: Explore cross-chain functionality for broader compatibility with different blockchain ecosystems.
Credential Revocation: Add support for revoking credentials in case of expiration or fraud.
3. AI Integration: Implement machine learning to analyze and categorize credentials for more advanced verification processes.
