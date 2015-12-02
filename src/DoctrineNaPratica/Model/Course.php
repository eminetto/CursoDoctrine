<?php
namespace DoctrineNaPratica\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Course")
 */
class Course
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
     * @ORM\Column(type="text", nullable=true)
     *
     * @var string
     */
    private $description;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     *
     * @var string
     */
    private $video;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     */
    private $permalink;
    
    /**
     * @ORM\Column(type="decimal", precision=6, scale=2)
     *
     * @var float
     */
    private $value;
    
    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="courseCollection", cascade={"persist", "merge", "refresh"})
     * 
     * @var User
     */
    protected $teacher; 
    
    /**
     * @ORM\OneToMany(targetEntity="Lesson", mappedBy="course", cascade={"all"}, orphanRemoval=true, fetch="LAZY")
     * 
     * @var Doctrine\Common\Collections\Collection
     */
    protected $lessonCollection;
    
    /**
     * @ORM\OneToMany(targetEntity="Enrollment", mappedBy="course", cascade={"all"}, orphanRemoval=true, fetch="LAZY")
     */
    private $enrollmentCollection;
    
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
    
    public function getVideo()
    {
        return $this->video;
    }
    
    public function setVideo($video)
    {
        return $this->video = $video;
    }
    
    public function getPermalink()
    {
        return $this->permalink;
    }
    
    public function setPermalink($permalink)
    {
        return $this->permalink = $permalink;
    }
    
    public function getValue()
    {
        return $this->value;
    }
    
    public function setValue($value)
    {
        return $this->value = $value;
    }
    
    public function getTeacher()
    {
        return $this->teacher;
    }
    
    public function setTeacher($teacher)
    {
        return $this->teacher = $teacher;
    }
    
    public function getLessonCollection()
    {
        return $this->lessonCollection;
    }
    
    public function setLessonCollection($lessonCollection)
    {
        return $this->lessonCollection = $lessonCollection;
    }
    
    public function getEnrollmentCollection()
    {
        return $this->enrollmentCollection;
    }
    
    public function setEnrollmentCollection($enrollmentCollection)
    {
        return $this->enrollmentCollection = $enrollmentCollection;
    }

    public function __construct() 
    {
        $this->lessonCollection = new ArrayCollection;
        $this->enrollmentCollection = new ArrayCollection;
    }

}