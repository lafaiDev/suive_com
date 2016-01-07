<?php
namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;
use LosBase\Entity\AbstractEntity as AbstractEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="access")
 */
class Access extends AbstractEntity
{

	/**
	 * @ORM\Column(type="string")
	 */
	protected $ip;

	/**
	 * @ORM\Column(type="string")
	 */
	protected $agent;

	/**
	 * @ORM\ManyToOne(targetEntity="User\Entity\User", inversedBy="accesses")
	 * @ORM\JoinColumn(nullable=false, onDelete="RESTRICT")
	 */
	protected $user;

	/**
	 * @return $ip
	 */
	public function getIp()
	{
		return $this->ip;
	}

	/**
	 * @param field_type $ip
	 * @return Access
	 */
	public function setIp($ip)
	{
		$this->ip = $ip;
		return $this;
	}

	/**
	 * @return $user
	 */
	public function getUser()
	{
		return $this->user;
	}

	/**
	 * @param field_type $user
	 * @return Access
	 */
	public function setUser($user)
	{
		$this->user = $user;
		return $this;
	}

	public function getAgent()
	{
		return $this->agent;
	}

	public function setAgent($agent)
	{
		$this->agent = $agent;
		return $this;
	}
}