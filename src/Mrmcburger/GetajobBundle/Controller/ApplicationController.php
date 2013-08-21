<?php

namespace Mrmcburger\GetajobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Mrmcburger\GetajobBundle\Entity\Application;
use Mrmcburger\GetajobBundle\Form\ApplicationType;

class ApplicationController extends Controller
{
    public function newAction()
    {
        $application = new Application;
        $form = $this->createForm(new ApplicationType, $application);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST')
        {
            $form->bind($request);

            if ($form->isValid())
            {
                $application->upload();

                $em = $this->getDoctrine()->getManager();
                $em->persist($application);
                $em->flush();

                return $this->redirect($this->generateUrl('mrmcburger_getajob_homepage'));
            }
        }
        return $this->render('MrmcburgerGetajobBundle:Application:new.html.twig', array(
            'form' => $form->createView()));
    }
}

?>
