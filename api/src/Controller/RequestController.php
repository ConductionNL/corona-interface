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
 * @Route("/request")
 */
class RequestController extends AbstractController
{

    /**
     * @Route("/new")
     * @Template
     */
	public function newAction(Request $httpRequest, ApplicationService $applicationService,  CommonGroundService $commonGroundService)
    {
    	$variables = $applicationService->getVariables();

    	return $variables;
	}

	/**
	 * @Route("/data")
     * @Template
	 */
	public function dataAction(Request $request, ApplicationService $applicationService,  CommonGroundService $commonGroundService)
	{
		$variables = $applicationService->getVariables();

		$variables['sbi'] = [];
		$variables['sbi'][] = ['sbi'=>'0001','omschrijving'=>'(Code nog niet vastgesteld)'];
		$variables['sbi'][] = ['sbi'=>'0002','omschrijving'=>'Geen bedrijfsactiviteit(en)'];
		$variables['sbi'][] = ['sbi'=>'0111','omschrijving'=>'Teelt van granen, peulvruchten en oliehoudende zaden'];
		$variables['sbi'][] = ['sbi'=>'01131','omschrijving'=>'Teelt van groenten in de volle grond'];
		$variables['sbi'][] = ['sbi'=>'01132','omschrijving'=>'Teelt van groenten onder glas'];
		$variables['sbi'][] = ['sbi'=>'01133','omschrijving'=>'Teelt van paddenstoelen'];

		// Lets see if there is a post to procces
		if ($request->isMethod('POST')) {

			// Passing the variables to the resource
			$resource['properties'] = $request->request->all();
			$resource['@id'] = $variables['request']['@id'];
			$resource['id'] = $variables['request']['id'];
//			var_dump($resource);

			// If there are any sub data sources the need to be removed below in order to save the resource
			// unset($resource['somedatasource'])

			$variables['resource'] = $commonGroundService->saveResource($resource);

		}

		return $variables;
	}

	/**
	 * @Route("/sign")
     * @Template
	 */
	public function signAction(Request $httpRequest, ApplicationService $applicationService,  CommonGroundService $commonGroundService)
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






