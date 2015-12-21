<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class WebhookController extends Controller
{
    /**
     * @Route("/{repo}")
     */
    public function triggerAction($repo)
    {
        return $this->render('AppBundle:Webhook:trigger.html.twig', array(
            // ...
        ));
    }

}
