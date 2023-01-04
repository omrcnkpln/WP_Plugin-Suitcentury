<?php

class SCHash
{
//    protected $encrypt_method = 'AES-256-CBC'; //sifreleme yontemi
//    protected $secret_key = '11*_33'; //sifreleme anahtari
//    protected $secret_iv = '22-=**_'; //gerekli sifreleme baslama vektoru

//    public function encrypt($value)
//    {
//        $key = hash('sha256', $this->secret_key); //anahtar hash fonksiyonu ile sha256 algoritmasi ile sifreleniyor
//        $iv = substr(hash('sha256', $this->secret_iv), 0, 16);
//
//        $sifrelendi = openssl_encrypt($value, $this->encrypt_method, $key, false, $iv);
//
//        return $sifrelendi;
//    }
//
//    public function decrypt($value)
//    {
//        $key = hash('sha256', $this->secret_key); //anahtar hash fonksiyonu ile sha256 algoritmasi ile sifreleniyor
//        $iv = substr(hash('sha256', $this->secret_iv), 0, 16);
//
//        $sifre_cozuldu = openssl_decrypt($value, $this->encrypt_method, $key, false, $iv);
//
//        return $sifre_cozuldu;
//    }

    protected $key = 'test'; //sifreleme anahtarım

    public function SCEncode($payload, $header = ['typ' => 'JWT', 'alg' => 'HS256'])
    {
        $header = json_encode($header);
        $payload = json_encode($payload);

        // Encode Header to Base64Url String
        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));

        // Encode Payload to Base64Url String
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));

        // Create Signature Hash
        $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, $this->key, true);

        // Encode Signature to Base64Url String
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        // Create JWT
        $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;

//        return $base64UrlHeader . $base64UrlPayload . $base64UrlSignature;
        return $jwt;
    }

    public function SCDecode($jwt)
    {
        $parca = explode(".", $jwt);

        // Create Signature Hash
        $signature = hash_hmac('sha256', $parca[0] . "." . $parca[1], $this->key, true);

        // Encode Signature to Base64Url String
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));

        if ($base64UrlSignature == $parca[2]) {
            return "true";
        }

        return "false";
    }
}
