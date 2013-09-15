<?php

namespace Mrmcburger\GetajobBundle\Entity;

use Doctrine\ORM\EntityRepository;

class InterviewRepository extends EntityRepository
{

    public function getInterview($id)
    {
        return $this->findOneById($id);
    }
}
