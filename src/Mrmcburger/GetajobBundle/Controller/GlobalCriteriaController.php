<?php

namespace Mrmcburger\GetajobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Mrmcburger\GetajobBundle\Form\GlobalCriteriaType;


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

    public function modifyAction()
    {
        $globalCriteria = $this->container->get('globalcriteria_manager');

        $form = $this->createForm(new GlobalCriteriaType, $globalCriteria);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST')
        {
            $form->bind($request);
            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($globalCriteria);
                $em->flush();

            return $this->redirect($this->generateUrl('mrmcburger_getajob_show_global_criteria'));
            }
        }

        return $this->render('MrmcburgerGetajobBundle:GlobalCriteria:modify.html.twig',
                                        array(
                                            'form' => $form->createView(),
                                        )
                                );
    }
}
