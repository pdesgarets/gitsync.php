<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Repo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class WebhookController extends Controller
{
    /**
     * @Route("/webhook/{name}", requirements={ "name": "[\w-_.]+"})
     */
    public function triggerAction(Repo $repo)
    {
        $repos = $this->getParameter('repos_location');

        if (!is_dir($repos)) {
            dump('lol1');
            mkdir($repos);
        }

        chdir($repos);
        exec('git clone ' . $repo->getFromUrl() . ' ' . $repo->getName());
        chdir($repos . '/' . $repo->getName());

        exec('git fetch && git remote add to ' . escapeshellarg($repo->getToUrl()));
        exec('git config remote.to.push +refs/remotes/origin/*:refs/heads/*');
        exec('git push to');
        chdir($repos);
        $this->deleteDirectory($repos . '/' . $repo->getName());

        return new Response($repo->getName());
    }

    private function deleteDirectory($dir) {
        system('rm -rf ' . escapeshellarg($dir), $retval);
        return $retval == 0; // UNIX commands return zero on success
    }

}
