<?php

namespace Mrmcburger\GetajobBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CompanyRepository extends EntityRepository
{
    public function getCompany($id)
    {
        if(preg_match('#^[0-9]+$#', $id))
        {
            $company = $this->findOneById($id);
        }
        else
        {
            $company = $this->findOneByName($id);
        }

        return $company;
    }
}
