<?php
namespace DoctrineNaPratica\Model;

use Doctrine\ORM\Mapping as ORM;

/**
  * @ORM\Entity
  * @ORM\Table(name="Profile")
  * @ORM\InheritanceType("SINGLE_TABLE")
  * @ORM\DiscriminatorColumn(name="type", type="string")
  * @ORM\DiscriminatorMap({
  *		"twitter" = "TwitterProfile",
  *		"facebook" = "FacebookProfile",
  *		"github" = "GithubProfile"
  * })
  */
abstract class Profile
{
	/**
	 * @ORM\Id @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 * @var integer
	 */
	private $id;
	
	/**
	 * @ORM\Column(type="string")
	 *
	 * @var string
	 */
	private $name;
	
	/**
	 * @ORM\Column(type="string")
	 *
	 * @var string
	 */
	private $login;
	
	/**
	 * @ORM\Column(type="string")
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
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="profileCollection", cascade={"persist", "merge", "refresh"})
	 * 
	 * @var User
	 */
	private $user;
	
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
	    $this->name = $name;
	}
	
	public function getLogin()
	{
	    return $this->login;
	}
	
	public function setLogin($login)
	{
	    $this->login = $login;
	}
	
	public function getEmail()
	{
	    return $this->email;
	}
	
	public function setEmail($email)
	{
	    $this->email = $email;
	}
	
	public function getAvatar()
	{
	    return $this->avatar;
	}
	
	public function setAvatar($avatar)
	{
	    $this->avatar = $avatar;
	}
	
	public function getUser()
	{
	    return $this->user;
	}
	
	public function setUser($user)
	{
	    $this->user = $user;
	}

}