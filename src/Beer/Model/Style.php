<?php
namespace Beer\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="Style")
 */
class Style
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
     * @ORM\Column(type="string", length=255)
     *
     * @var string
     */
    private $description;
    
    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     *
     * @var string
     */
    private $abvRange;

    
    /**
     * @ORM\OneToMany(targetEntity="Beer", mappedBy="style", cascade={"all"}, orphanRemoval=true, fetch="LAZY")
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
    
    public function getDescription()
    {
        return $this->description;
    }
     
    public function setDescription($description)
    {
        return $this->description = $description;
    }

    public function getAbvRange()
    {
        return $this->abvRange;
    }
     
    public function setAbvRange($abvRange)
    {
        return $this->abvRange = $abvRange;
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