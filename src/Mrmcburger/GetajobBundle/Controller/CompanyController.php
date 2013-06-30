<?php

namespace Mrmcburger\GetajobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Mrmcburger\GetajobBundle\Entity\Company;
use Mrmcburger\GetajobBundle\Form\CompanyType;

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

                return $this->redirect($this->generateUrl('mrmcburger_getajob_homepage'));
            }
        }

        return $this->render('MrmcburgerGetajobBundle:Company:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
