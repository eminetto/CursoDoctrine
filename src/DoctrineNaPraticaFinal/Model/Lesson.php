<?php
namespace DoctrineNaPratica\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Lesson")
 */
class Lesson
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
	 * @ORM\ManyToOne(targetEntity="Course", inversedBy="lessonCollection", cascade={"persist", "merge", "refresh"})
	 * 
	 * @var Course
	 */
	private $course;
	
	/**
     * @ORM\ManyToMany(targetEntity="User", mappedBy="lessonCollection")
     */
    private $userLessons;
	
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
	
	public function getCourse()
	{
	    return $this->course;
	}
	
	public function setCourse($course)
	{
	    return $this->course = $course;
	}
	
	public function getPermalink()
	{
	    return $this->permalink;
	}
	
	public function setPermalink($permalink)
	{
	    return $this->permalink = $permalink;
	}

	public function getUserLessons()
	{
	return $this->userLessons;
	}
	 
	public function setUserLessons($userLessons)
	{
	return $this->userLessons = $userLessons;
	}
	
}
