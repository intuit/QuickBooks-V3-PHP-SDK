/*******************************************************************************
* Copyright 2016 Intuit
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
*     http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*******************************************************************************/
<?php


final class TokenVerifier
{
    /**
     * The encryption algorithm using for TokenVerifier
     */
    const HASH_ALGORITHM = 'SHA256';

    /**
     * The verfier Token for Wehbook assigned by Intuit
     *
     * @var null
     */
    private $verifierToken = null;

    /**
     * Private TokenVerifier constructor.
     * @param $token
     */
    public function __construct($token){
        $this->verifierToken = $token;
    }

    /**
     * Using the token to encrypt payload and compare with sig
     *
     * @param $payLoad
     *     The payload to be verified
     * @param $sig
     *      The signature retrieved from header
     * @param null $algo
     *      The algo used to encrypt
     * @return bool
     *      True if same false otherwise
     */

    public function verifyPayLoad($payLoad, $sig, $algo = null){
        $encryptedPayload = $this->encryptPayLoadBasedOnToken($payLoad, $algo);
        if(strcmp($sig, $encryptedPayload) == 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    /**
     * Encrypt the payload based on hash algorithm and verifier Token
     *
     * @param $payLoad
     * @param null $hashAlgorithm
     * @return string
     */
    private function encryptPayLoadBasedOnToken($payLoad, $hashAlgorithm = null){
        if($hashAlgorithm == null){
            $hashAlgorithm = TokenVerifier::HASH_ALGORITHM;
        }
        $hashedPayLoad = hash_hmac($hashAlgorithm, $payLoad, $this->verifierToken);
        $encodedHashedPayLoad = base64_encode(hex2bin($hashedPayLoad));
        return $encodedHashedPayLoad;
    }

}