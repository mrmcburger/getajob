<?php

namespace Mrmcburger\GetajobBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Mrmcburger\GetajobBundle\Entity\Interview;
use Mrmcburger\GetajobBundle\Form\InterviewType;
use Mrmcburger\GetajobBundle\Entity\Application;
use Symfony\Component\HttpFoundation\Response;

class InterviewController extends Controller
{
    public function newAction()
    {
        $interview = new Interview;
        $form = $this->createForm(new InterviewType, $interview);

        $request = $this->get('request');

        if ($request->getMethod() == 'POST')
        {
            $form->bind($request);

            if ($form->isValid())
            {
                $em = $this->getDoctrine()->getManager();
                $em->persist($interview);
                $em->flush();

                return $this->redirect($this->generateUrl('mrmcburger_getajob_homepage'));
            }
        }
        return $this->render('MrmcburgerGetajobBundle:Interview:new.html.twig', array(
               'form' => $form->createView()));
    }

    public function showAction($id)
    {
        $repository = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MrmcburgerGetajobBundle:Interview');

        $interview = $repository->getInterview($id);

        return $this->render('MrmcburgerGetajobBundle:Interview:show.html.twig',
                                        array(
                                            'interview' => $interview,
                                        )
                                );
    }

    public function getInterviewAddressAction($applicationId)
    {
        $repository = $this->getDoctrine()
                         ->getManager()
                         ->getRepository('MrmcburgerGetajobBundle:Application');

        $application = $repository->getApplication($applicationId);

        if($application)
        {
            $company = $application->getCompany();

            $address = $company->getAddress();

            $dom = new \DOMDocument('1.0', 'iso-8859-1');
            $root = $dom->createElement('address');
            $dom->appendChild($root);
            $root->appendChild($dom->createElement('number', $address->getNumber()));
            $root->appendChild($dom->createElement('type', $address->getType()));
            $root->appendChild($dom->createElement('name', $address->getName()));
            $root->appendChild($dom->createElement('additional', $address->getAdditional()));
            $root->appendChild($dom->createElement('zip', $address->getZip()));
            $root->appendChild($dom->createElement('city', $address->getCity()));
        }
        else
        {
            $dom = new \DOMDocument('1.0', 'iso-8859-1');
            $root = $dom->createElement('address');
            $dom->appendChild($root);
        }

        $response = new Response($dom->saveXML());
        $response->headers->set('Content-Type', 'application/xml');

        return $response;
    }
}
?>
