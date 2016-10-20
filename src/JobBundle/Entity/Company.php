<?php

namespace JobBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Company
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="JobBundle\Repository\CompanyRepository")
 */
class Company
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="company_title", type="string", length=255)
     */
    private $companyTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="company_address", type="string", length=255)
     */
    private $companyAddress;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set companyTitle
     *
     * @param string $companyTitle
     * @return Company
     */
    public function setCompanyTitle($companyTitle)
    {
        $this->companyTitle = $companyTitle;

        return $this;
    }

    /**
     * Get companyTitle
     *
     * @return string 
     */
    public function getCompanyTitle()
    {
        return $this->companyTitle;
    }

    /**
     * Set companyAddress
     *
     * @param string $companyAddress
     * @return Company
     */
    public function setCompanyAddress($companyAddress)
    {
        $this->companyAddress = $companyAddress;

        return $this;
    }

    /**
     * Get companyAddress
     *
     * @return string 
     */
    public function getCompanyAddress()
    {
        return $this->companyAddress;
    }
}
