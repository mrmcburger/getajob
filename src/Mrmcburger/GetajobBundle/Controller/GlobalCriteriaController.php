<?php

namespace Mrmcburger\GetajobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GlobalCriteriaController extends Controller
{
    public function showAction()
    {
        $globalCriteria = $this->container->get('globalcriteria_manager');
        return $this->render('MrmcburgerGetajobBundle:GlobalCriteria:show.html.twig',
                                        array(
                                            'globalCriteria' => $globalCriteria,
                                        )
                                );
    }
}
