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

                return $this->redirect($this->generateUrl('mrmcburger_getajob_show_application', array('id' => $application->getId())));
            }
        }
        return $this->render('MrmcburgerGetajobBundle:Application:new.html.twig', array(
            'form' => $form->createView()));
    }

    public function showAction($id)
    {
        $repository = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MrmcburgerGetajobBundle:Application');

        $application = $repository->getApplication($id);
        //$form = $this->createForm(new CompanyDeleteType, $company);

        return $this->render('MrmcburgerGetajobBundle:Application:show.html.twig',
                                        array(
                                            'application' => $application,
                                           // 'form' => $form->createView()
                                        )
                                );
    }

    public function modifyAction($id)
    {
        $repository = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MrmcburgerGetajobBundle:Application');

        $application = $repository->getApplication($id);

        $form = $this->createForm(new ApplicationType(ApplicationType::EDIT_MODE), $application);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST')
        {
            $form->bind($request);

            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($application);
                $em->flush();

                return $this->redirect($this->generateUrl('mrmcburger_getajob_show_application', array('id' => $application->getId())));
            }
        }

        return $this->render('MrmcburgerGetajobBundle:Application:modify.html.twig',
                                array(
                                     'form' => $form->createView(),
                                     'application' => $application
                                )
                        );
    }
}
?>
