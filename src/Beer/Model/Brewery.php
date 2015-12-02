<?php
namespace Beer\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="Brewery")
 */
class Brewery
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var integer
     */
    protected $id;
    
    /**
     * @ORM\Column(type="string", length=150)
     *
     * @var string
     */
    private $name;
    
    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     *
     * @var string
     */
    private $site;

    
    /**
     * @ORM\OneToMany(targetEntity="Beer", mappedBy="brewery", cascade={"all"}, orphanRemoval=true, fetch="LAZY")
     */
    private $beerCollection;

    
    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setName($name)
    {
        return $this->name = $name;
    }
    

    public function getSite()
    {
        return $this->site;
    }
     
    public function setSite($site)
    {
        return $this->site = $site;
    }

    public function getBeerCollection()
    {
        return $this->beerCollection;
    }

    public function addBeer($beer)
    {
        $this->beerCollection->add($beer);
    }

    public function __construct() 
    {
        $this->beerCollection = new ArrayCollection;
    }
}