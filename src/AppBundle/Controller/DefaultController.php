<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('default/index.html.twig');
    }

    /**
     * Get Outlet Locations Action
     * @Route("/outletlocations")
     * @Method({"GET"})
     * @return Response
     */
    public function getOutletlocationsAction()
    {
    	$outletLocations = array(
    		1 => array(
    			'name' => 'HSR Layout',
    			'dist' => '2'
    			),
    		2 => array(
    			'name' => 'Kormangla',
    			'dist' => '3'
    			),
    		3 => array(
    			'name' => 'Indiaranagar',
    			'dist' => '4'
    			),
    		4 => array(
    			'name' => 'AKR Tech Park (Lunch)',
    			'dist' => '5'
    			),
    		5 => array(
    			'name' => 'Sarjapur Road',
    			'dist' => '6'
    			),
    		6 => array(
    			'name' => 'Domlur',
    			'dist' => '7'
    			),
    		7 => array(
    			'name' => 'Bellandur',
    			'dist' => '8'
    			),
    		8 => array(
    			'name' => 'Embassy Tech Village (Lunch)',
    			'dist' => '9'
    			)
    		);

    	return new Response(json_encode($outletLocations), Response::HTTP_OK);
    }

    /**
     * Get Outlet Locations Action
     * @Route("/menulist")
     * @Method({"GET"})
     * @return Response
     */
    public function getMenulistAction(Request $request)
    {
        $localityId = (int)$request->get('id');
        $mapper = array(
            1 => array(1,22,5,8,13,15),
            2 => array(2,4,6,11,30),
            3 => array(7,9,10,27),
            4 => array(16,19,18),
            5 => array(20,17,26),
            6 => array(3,12,21),
            7 => array(23,14,24),
            8 => array(25,28,29)
            );
    	$menuList = array(
    		1 => array(
    			'id' => '1',
				'name' => "Item 1",
				'type' => 'veg',
				'price' => '50',
				'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
    			),
    		2 => array(
                'id' => '2',
                'name' => "Item 2",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            3 => array(
                'id' => '3',
                'name' => "Item 3",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            4 => array(
                'id' => '4',
                'name' => "Item 4",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            5 => array(
                'id' => '5',
                'name' => "Item 5",
                'type' => 'non_veg',
                'price' => '50',
                'imgurl' => 'img-2.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            6 => array(
                'id' => '6',
                'name' => "Item 6",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            7 => array(
                'id' => '7',
                'name' => "Item 7",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            8 => array(
                'id' => '8',
                'name' => "Item 8",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            9 => array(
                'id' => '9',
                'name' => "Item 9",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            10 => array(
                'id' => '10',
                'name' => "Item 10",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            11 => array(
                'id' => '11',
                'name' => "Item 11",
                'type' => 'non_veg',
                'price' => '50',
                'imgurl' => 'img-2.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            12 => array(
                'id' => '12',
                'name' => "Item 12",
                'type' => 'non_veg',
                'price' => '50',
                'imgurl' => 'img-2.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            13 => array(
                'id' => '13',
                'name' => "Item 13",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            14 => array(
                'id' => '14',
                'name' => "Item 14",
                'type' => 'non_veg',
                'price' => '50',
                'imgurl' => 'img-2.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            15 => array(
                'id' => '15',
                'name' => "Item 15",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            16 => array(
                'id' => '16',
                'name' => "Item 16",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            17 => array(
                'id' => '17',
                'name' => "Item 17",
                'type' => 'non_veg',
                'price' => '50',
                'imgurl' => 'img-2.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            18 => array(
                'id' => '18',
                'name' => "Item 18",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            19 => array(
                'id' => '19',
                'name' => "Item 19",
                'type' => 'non_veg',
                'price' => '50',
                'imgurl' => 'img-2.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            20 => array(
                'id' => '20',
                'name' => "Item 20",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            21 => array(
                'id' => '21',
                'name' => "Item 21",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            22 => array(
                'id' => '22',
                'name' => "Item 22",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            23 => array(
                'id' => '23',
                'name' => "Item 23",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            24 => array(
                'id' => '24',
                'name' => "Item 24",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            25 => array(
                'id' => '25',
                'name' => "Item 25",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            26 => array(
                'id' => '26',
                'name' => "Item 26",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            27 => array(
                'id' => '27',
                'name' => "Item 27",
                'type' => 'non_veg',
                'price' => '50',
                'imgurl' => 'img-2.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            28 => array(
                'id' => '28',
                'name' => "Item 28",
                'type' => 'non_veg',
                'price' => '50',
                'imgurl' => 'img-2.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            29 => array(
                'id' => '29',
                'name' => "Item 29",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                ),
            30 => array(
                'id' => '30',
                'name' => "Item 30",
                'type' => 'veg',
                'price' => '50',
                'imgurl' => 'img-1.jpg',
                'desc' => 'Your Saturday can\'n get better than this! Masaledaar Kaale Chane and Pooris (4) with delicious Suji Ka Halwa, topped with dry fruits.'
                )

    	);
        
        if (array_key_exists($localityId, $mapper)) {
            $itemIdsAvailable = $mapper[$localityId];
        } else {
            return new Response("Bad Request Please Try again", Response::HTTP_BAD_REQUEST);
        }
        $result = [];
        foreach ($itemIdsAvailable as $itemId) {
            $result[] = $menuList[$itemId];
        }

    	return new Response(json_encode($result), Response::HTTP_OK);
    }
}
