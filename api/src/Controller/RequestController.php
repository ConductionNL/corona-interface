<?php

// src/Controller/DashboardController.php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

use App\Service\CommonGroundService;
use App\Service\ApplicationService;

/**
 * Class DefaultController
 * @package App\Controller
 * 
 * 
 * @Route("/request") 
 */
class RequestController extends AbstractController
{
    
    /**
     * @Route("/new") 
     */
	public function newAction(Request $httpRequest, ApplicationService $applicationService,  CommonGroundService $commonGroundService)
    {
    	$variables = $applicationService->getVariables();
    	
    	
    	
    	return $variables;
    }
    
    
    /**
     * @Route("/")
     * @Template
     */
    public function indexAction(Session $session, $slug = false, Request $httpRequest, CommonGroundService $commonGroundService, ApplicationService $applicationService)
    {
    	$variables = $applicationService->getVariables();
    	
    	return $variables;
    }
}






