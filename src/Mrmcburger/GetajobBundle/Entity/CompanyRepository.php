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

    public function getRankedCompanies($globalCriteria)
    {
        $companies = $this->findAll();
        $sortedCompanies = array();
        $companiesArray = array();
        $averageArray = array();

        $globalPonderation = $globalCriteria->getDisplacement() + $globalCriteria->getCelebrity() + $globalCriteria->getMissionInterest() + $globalCriteria->getSalaryExpectation() + $globalCriteria->getWorkConditions() + $globalCriteria->getEvolutionPossibilities();


        foreach($companies as $company)
        {
            $criteria = $company->getCompanyCriteria();
            $average = ($criteria->getDisplacement() * $globalCriteria->getDisplacement()) / $globalPonderation;
            $average += ($criteria->getCelebrity() * $globalCriteria->getCelebrity()) / $globalPonderation;
            $average += ($criteria->getMissionInterest() * $globalCriteria->getMissionInterest()) / $globalPonderation;
            $average += ($criteria->getSalaryExpectation() * $globalCriteria->getSalaryExpectation()) / $globalPonderation;
            $average += ($criteria->getWorkConditions() * $globalCriteria->getWorkConditions()) / $globalPonderation;
            $average += ($criteria->getEvolutionPossibilities() * $globalCriteria->getEvolutionPossibilities()) / $globalPonderation;

            $name = $company->getName();

            $companiesArray[$name]['name'] = $name;
            $companiesArray[$name]['sector'] = $company->getSector();
            $companiesArray[$name]['address'] = $company->getAddress();
            $companiesArray[$name]['mail'] = $company->getMail();
            $companiesArray[$name]['phone'] = $company->getPhone();
            $companiesArray[$name]['id'] = $company->getId();

            $averageArray[$name] = round ($average, 2, PHP_ROUND_HALF_UP);

        }

        arsort($averageArray);

        foreach($averageArray as $name => $average)
        {
            $sortedCompanies[$name]['average'] = $average;
            $sortedCompanies[$name]['id'] = $companiesArray[$name]['id'];
            $sortedCompanies[$name]['name'] = $companiesArray[$name]['name'];
            $sortedCompanies[$name]['sector'] = $companiesArray[$name]['sector'];
            $sortedCompanies[$name]['address'] = $companiesArray[$name]['address'];
            $sortedCompanies[$name]['mail'] = $companiesArray[$name]['mail'];
            $sortedCompanies[$name]['phone'] = $companiesArray[$name]['phone'];
        }

        return $sortedCompanies;
    }
}
