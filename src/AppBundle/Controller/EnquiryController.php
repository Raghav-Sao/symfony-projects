<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Utilities\ValidateEmailAddress;
use AppBundle\Entity\Enquiry;

class EnquiryController extends Controller
{
    /**
     * Post Enquiry Action
     * @Route("/contactus/enquiry")
     * @Method({"GET"})
     * @return Response
     */
    public function getEnquiryAction()
    {
        $csrfToken = $this->get('form.csrf_provider')->generateCsrfToken('enquiry_form');
        return $this->render('enquiry/enquiry.html.twig', array('token' => $csrfToken));
        // return new Response(json_encode(array('token' => $csrfToken)));
    }

	/**
     * Post Enquiry Action
     * @Route("/contactus/enquiry")
     * @Method({"POST"})
     * @return Response
     */
    public function postEnquiryAction()
    {
        $requestParams = $this->get('request')->request->all();
        $response = array();
        $response['error'] = array();
        if (!(isset($requestParams['name']))) {
        	$response['error']['name'] = 'Name is mandatory field';
        }
        if (!(isset($requestParams['email']))) {
        	$response['error']['email'] = 'Email is mandatory field';
        } else if (!ValidateEmailAddress::isValidEmail($requestParams['email'])) {
            $response['error']['email'] = 'Email is invalid';
        }
        if (!(isset($requestParams['type']))) {
        	$response['error']['type'] = 'Please select Event Type';
        }
        if (!(isset($requestParams['enquiry']))) {
        	$response['error']['enquiry'] = 'Enquiry is mandatory field';
        }
        if (!(isset($requestParams['token']))) {
            $response['error']['token'] = 'Token is required';
        } else {
            $form = $this->get('form.csrf_provider');
            if (!$form->isCsrfTokenValid('enquiry_form', $requestParams['token'])) {
                $response['error']['token'] = 'Token is invalid';
            }
        }

        if (count($response['error'])) {
            return new Response(json_encode($response), Response::HTTP_BAD_REQUEST);
        }
        unset($response['error']);

        $enquiry = new Enquiry();
        $enquiry->setName($requestParams['name']);
        $enquiry->setEmail($requestParams['email']);
        $enquiry->setType(strtoupper($requestParams['type']));
        $enquiry->setEnquiry($requestParams['enquiry']);
        $enquiry->setStatus('PENDING');

        $em = $this->get('doctrine')->getManager();

        $em->persist($enquiry);
        $em->flush();
        
        return new Response(json_encode(array('message' => 'success')), Response::HTTP_OK);
    }
}
