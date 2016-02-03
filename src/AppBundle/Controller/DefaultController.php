<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    /**
     * @Route("/key", name="key")
     */
    public function keyAction(Request $request)
    {
        $config = array(
            "digest_alg" => "sha512",
            "private_key_bits" => 4096,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        );

        $keyDir = $this->getParameter('key_dir');
        if (file_exists($keyDir . '/public')) {
            return new Response(file_get_contents($keyDir . '/public'));
        } else {
            $rsaKey = openssl_pkey_new(array(
                'private_key_bits' => 1024,
                'private_key_type' => OPENSSL_KEYTYPE_RSA));

            $privKey = openssl_pkey_get_private($rsaKey);
            openssl_pkey_export($privKey, $pem); //Private Key
            $pubKey = sshEncodePublicKey($rsaKey); //Public Key

            $umask = umask(0066);
            file_put_contents($keyDir . '/private', $pem); //save private key into file
            file_put_contents($keyDir . '/public', $pubKey); //save public key into file

            return new Response($pubKey);
        }
    }
}
