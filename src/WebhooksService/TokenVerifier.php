<?php

namespace QuickBooksOnline\API\WebhooksService;

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
    public function __construct($token)
    {
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

    public function verifyPayLoad($payLoad, $sig, $algo = null)
    {
        $encryptedPayload = $this->encryptPayLoadBasedOnToken($payLoad, $algo);
        if (strcmp($sig, $encryptedPayload) == 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Encrypt the payload based on hash algorithm and verifier Token
     *
     * @param $payLoad
     * @param null $hashAlgorithm
     * @return string
     */
    private function encryptPayLoadBasedOnToken($payLoad, $hashAlgorithm = null)
    {
        if ($hashAlgorithm == null) {
            $hashAlgorithm = TokenVerifier::HASH_ALGORITHM;
        }
        $hashedPayLoad = hash_hmac($hashAlgorithm, $payLoad, $this->verifierToken);
        $encodedHashedPayLoad = base64_encode(hex2bin($hashedPayLoad));
        return $encodedHashedPayLoad;
    }
}
