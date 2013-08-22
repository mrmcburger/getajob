<?php

namespace Mrmcburger\GetajobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Mrmcburger\GetajobBundle\Entity\Application;
use Mrmcburger\GetajobBundle\Form\ApplicationType;
use Mrmcburger\GetajobBundle\Form\ApplicationDeleteType;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;

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
        $form = $this->createForm(new ApplicationDeleteType, $application);

        return $this->render('MrmcburgerGetajobBundle:Application:show.html.twig',
                                        array(
                                            'application' => $application,
                                            'form' => $form->createView()
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

    public function deleteAction()
    {
        $request = $this->get('request');
        $form = $this->createForm(new ApplicationDeleteType);
        $form->bind($request);

        $repository = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MrmcburgerGetajobBundle:Application');

        $application = $repository->getApplication($form["id"]->getData());

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($application);
            $em->flush();

            return $this->redirect($this->generateUrl('mrmcburger_getajob_homepage'));
        }

        return $this->redirect($this->generateUrl('mrmcburger_getajob_show_application', array('id' => $application->getId())));
    }

    public function listAction($page)
    {
        $today = date('Y-m-d');

        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM MrmcburgerGetajobBundle:Application a where a.replyDate > '$today' order by a.date";
        $query = $em->createQuery($dql);

        $adapter = new DoctrineORMAdapter($query, true);
        $pager   = new Pagerfanta($adapter);

        $pager->setMaxPerPage(15);
        $pager->setCurrentPage($page, true, true);

        return $this->render('MrmcburgerGetajobBundle:Application:list.html.twig', array('pager' => $pager));
    }
}
?>
