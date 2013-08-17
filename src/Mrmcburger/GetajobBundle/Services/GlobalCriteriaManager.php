<?php
namespace Mrmcburger\GetajobBundle\Services;

use Doctrine\ORM\EntityManager;

use Mrmcburger\GetajobBundle\Entity\GlobalCriteria;

class GlobalCriteriaManager
{
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getGlobalCriteria()
    {
        $globalCriteria = $this->em->getRepository('MrmcburgerGetajobBundle:GlobalCriteria')
                                        ->findById(1);

        var_dump($globalCriteria);

        return $globalCriteria;
    }
}
