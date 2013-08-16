<?php

namespace Mrmcburger\GetajobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Mrmcburger\GetajobBundle\Entity\Company;
use Mrmcburger\GetajobBundle\Form\CompanyType;
use Mrmcburger\GetajobBundle\Form\CompanyDeleteType;
use Doctrine\ORM\Mapping as ORM;

class CompanyController extends Controller
{
    public function newAction()
    {
        $company = new Company;
        $form = $this->createForm(new CompanyType, $company);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST')
        {
            $form->bind($request);

            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($company);
                $em->flush();

                return $this->redirect($this->generateUrl('mrmcburger_getajob_show_company', array('id' => $company->getId())));
            }
        }

        return $this->render('MrmcburgerGetajobBundle:Company:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function showAction($id)
    {
        $repository = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MrmcburgerGetajobBundle:Company');

        $company = $repository->getCompany($id);
        $form = $this->createForm(new CompanyDeleteType, $company);

        return $this->render('MrmcburgerGetajobBundle:Company:show.html.twig',
                                        array(
                                            'company' => $company,
                                            'form' => $form->createView()
                                        )
                                );
    }

    public function modifyAction($id)
    {
        $repository = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MrmcburgerGetajobBundle:Company');

        $company = $repository->getCompany($id);

        $form = $this->createForm(new CompanyType(CompanyType::EDIT_MODE), $company);

        $request = $this->get('request');
        if ($request->getMethod() == 'POST')
        {
            $form->bind($request);

            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($company);
                $em->flush();

                return $this->redirect($this->generateUrl('mrmcburger_getajob_show_company', array('id' => $company->getId())));
            }
        }

        return $this->render('MrmcburgerGetajobBundle:Company:modify.html.twig',
                                array(
                                     'form' => $form->createView(),
                                     'company' => $company
                                )
                        );
    }

    public function deleteAction()
    {
        $request = $this->get('request');
        $form = $this->createForm(new CompanyDeleteType);
        $form->bind($request);

        $repository = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MrmcburgerGetajobBundle:Company');

        $company = $repository->getCompany($form["id"]->getData());

        if ($form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->remove($company);
            $em->flush();

            return $this->redirect($this->generateUrl('mrmcburger_getajob_homepage'));
        }

        return $this->redirect($this->generateUrl('mrmcburger_getajob_show_company', array('id' => $company->getId())));
    }

    public function listAction()
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM MrmcburgerGetajobBundle:Company a order by a.name";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $this->get('request')->query->get('page', 1),
            15
        );

        return $this->render('MrmcburgerGetajobBundle:Company:list.html.twig', array('pagination' => $pagination));
    }
}
