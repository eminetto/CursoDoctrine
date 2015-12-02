<?php
namespace Beer\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Beer")
 */
class Beer
{

    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var integer
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150)
     *
     * @var string
     */
    private $name;
    
    
    /**
     * @ORM\Column(type="float", nullable=true)
     *
     * @var string
     */
    private $abv;
        
    /**
     * @ORM\ManyToOne(targetEntity="Style", inversedBy="beerCollection", cascade={"persist", "merge", "refresh"})
     */
    private $style;

    /**
     * @ORM\ManyToOne(targetEntity="Brewery", inversedBy="beerCollection", cascade={"persist", "merge", "refresh"})
     */
    private $brewery;
 
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

    public function getAbv()
    {
        return $this->abv;
    }
     
    public function setAbv($abv)
    {
        return $this->abv = $abv;
    }

    public function getStyle()
    {
        return $this->style;
    }
     
    public function setStyle($style)
    {
        return $this->style = $style;
    }

    public function getBrewery()
    {
        return $this->brewery;
    }
     
    public function setBrewery($brewery)
    {
        return $this->brewery = $brewery;
    }
}