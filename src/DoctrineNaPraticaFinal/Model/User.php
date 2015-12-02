<?php
namespace DoctrineNaPratica\Model;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="User")
 */
class User
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
	 * @ORM\Column(type="string", length=20, unique=true)
	 *
	 * @var string
	 */
	private $login;
	
	/**
	 * @ORM\Column(type="string", length=150, nullable=true)
	 *
	 * @var string
	 */
	private $email;
	
	/**
	 * @ORM\Column(type="string", length=255, nullable=true)
	 *
	 * @var string
	 */
	private $avatar;
	
	/**
	 * @ORM\OneToOne(targetEntity="Subscription", mappedBy="user", cascade={"all"})
	 **/
	private $subscription;
	
	/**
	 * @ORM\OneToMany(targetEntity="Enrollment", mappedBy="user", cascade={"all"}, orphanRemoval=true, fetch="LAZY")
	 */
	private $enrollmentCollection;
	
	/**
	 * @ORM\OneToMany(targetEntity="Course", mappedBy="teacher", cascade={"all"}, orphanRemoval=true, fetch="LAZY")
	 * 
	 * @var Doctrine\Common\Collections\Collection
	 */
	protected $courseCollection;
	
	/**
	 * @ORM\ManyToMany(targetEntity="Lesson", inversedBy="userLessons", cascade={"all"})
	 * @ORM\JoinTable(name="LessonUser",
	 *   joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
	 *   inverseJoinColumns={@ORM\JoinColumn(name="lesson_id", referencedColumnName="id")}
	 * )
	 */
	private $lessonCollection;
	
	/**
	* @ORM\OneToMany(targetEntity="Profile", mappedBy="user", cascade={"all"}, orphanRemoval=true, fetch="LAZY")
	* 
	* @var Doctrine\Common\Collections\Collection
	*/
	protected $profileCollection;


	public function getProfileCollection()
	{
		return $this->profileCollection;
	}
	public function setProfileCollection($profileCollection)
	{
		return $this->profileCollection = $profileCollection;
	}  
	
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
	
	public function getLogin()
	{
	    return $this->login;
	}
	
	public function setLogin($login)
	{
	    return $this->login = $login;
	}
	
	public function getEmail()
	{
	    return $this->email;
	}
	
	public function setEmail($email)
	{
	    return $this->email = $email;
	}
	
	public function getAvatar()
	{
	    return $this->avatar;
	}
	
	public function setAvatar($avatar)
	{
	    return $this->avatar = $avatar;
	}
	
	public function getSubscription()
	{
	    return $this->subscription;
	}
	
	public function setSubscription($subscription)
	{
	    return $this->subscription = $subscription;
	}
	
	public function getEnrollmentCollection()
	{
	    return $this->enrollmentCollection;
	}
	
	public function setEnrollmentCollection($enrollmentCollection)
	{
	    return $this->enrollmentCollection = $enrollmentCollection;
	}
	
	public function getCourseCollection()
	{
	    return $this->courseCollection;
	}
	
	public function setCourseCollection($courseCollection)
	{
	    return $this->courseCollection = $courseCollection;
	}
	
	public function getLessonCollection()
	{
	    return $this->lessonCollection;
	}
	
	public function setLessonCollection($lessonCollection)
	{
	    return $this->lessonCollection = $lessonCollection;
	}

	public function __construct() 
	{
        $this->courseCollection = new ArrayCollection;
        $this->lessonCollection = new ArrayCollection;
        $this->profileCollection = new ArrayCollection;
        $this->enrollmentCollection = new ArrayCollection;
    }
}