<?php
namespace Mrmcburger\GetajobBundle\Services;

use Mrmcburger\GetajobBundle\Entity\GlobalCriteria;
use Doctrine\ORM\EntityManager;

class GlobalCriteriaFactory
{
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function get()
    {
        $globalCriteria = $this->em->getRepository('MrmcburgerGetajobBundle:GlobalCriteria')
                                        ->findOneById(1);

        if(!isset($globalCriteria))
        {
            $globalCriteria = new GlobalCriteria();
            $this->em->persist($globalCriteria);
            $this->em->flush();
        }

        return $globalCriteria;
    }
}
