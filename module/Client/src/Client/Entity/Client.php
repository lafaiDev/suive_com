<?php
namespace Client\Entity;

use Doctrine\ORM\Mapping as ORM;
use LosBase\Entity\AbstractEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="client")
 */
class Client extends AbstractEntity
{
	/**
	 * @ORM\Column(type="string", length=250)
	 */
	protected $name;
	
	/**
	 * @ORM\Column(type="brprice")
	 */
	protected $credit;
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}
	
	public function getCredit()
	{
		return $this->credit;
	}
	
	public function setCredit($credit)
	{
		$this->credit = $credit;
		return $this;
	}
	
	public function __toString()
	{
		return $this->name;
	}
}
