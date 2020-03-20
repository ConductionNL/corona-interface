<?php

// src/Controller/DashboardController.php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

use App\Service\CommonGroundService;
use App\Service\RequestService;
use App\Service\ApplicationService;

/**
 * Class DefaultController
 * @package App\Controller
 */
class DefaultController extends AbstractController
{
    
    /**
     * @Route("/logout")
     */
    public function logoutAction(Session $session)
    {
    	$session->set('requestType', false);
    	$session->set('request', false);
    	$session->set('user', false);
    	$session->set('employee', false);
    	$session->set('contact', false);
    	
    	$this->addFlash('info', 'U bent uitgelogd');
    	
    	return $this->redirect($this->generateUrl('app_default_index'));
    }
    
    
    /**
     * @Route("/")
     * @Route("/page/{slug}", name="app_default_slug")
     * @Template
     */
    public function indexAction(Session $session, $slug = false, Request $httpRequest, CommonGroundService $commonGroundService, ApplicationService $applicationService, RequestService $requestService)
    {
    	$variables = $applicationService->getVariables();
    	
    	return $variables;
    }
}






