<?php

namespace Mrmcburger\GetajobBundle\Entity;

use Doctrine\ORM\EntityRepository;

class ApplicationRepository extends EntityRepository
{
    public function getApplication($id)
    {
        if(preg_match('#^[0-9]+$#', $id))
        {
            $application = $this->findOneById($id);
        }
        else
        {
            $application = $this->findOneByName($id);
        }

        return $application;
    }
}
