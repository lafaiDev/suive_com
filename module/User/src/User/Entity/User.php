<?php
namespace User\Entity;
 
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use ZfcUser\Entity\UserInterface as ZfcUserInterface;
use ZfcRbac\Identity\IdentityInterface;
use LosBase\Entity\AbstractEntity;
 
/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends AbstractEntity implements ZfcUserInterface, IdentityInterface
{
 
    /**
     * @ORM\Column(type="string", length=250)
     */
    protected $name;
 
    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $email = '';
 
    /**
     * @ORM\ManyToOne(targetEntity="Client\Entity\Client", inversedBy="users")
     * @ORM\JoinColumn(nullable=true, onDelete="CASCADE")
     * @ORM\OrderBy({"nome" = "ASC"})
     */
    protected $client;
 
    /**
     * @ORM\Column(type="string", length=32)
     * Possible: guest, user, admin
     */
    protected $permission = 'guest';
 
    protected $username;
 
    /**
     * @ORM\Column(type="string", length=128)
     */
    protected $password = '';
 
    protected $confirmpassword;
 
    /**
     * @ORM\OneToMany(targetEntity="User\Entity\Access", mappedBy="user")
     * @ORM\JoinColumn(nullable=false)
     */
    protected $accesses;
 
    public function __construct()
    {
        $this->created = new \DateTime('now');
        $this->updated = new \DateTime('now');
        $this->accesses = new ArrayCollection();
    }
 
    /**
     * @return string the $name
     */
    public function getName()
    {
        return $this->name;
    }
 
    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
 
        return $this;
    }
 
    /**
     * @return $permission
     */
    public function getPermission()
    {
        return $this->permission;
    }
 
    /**
     * @param field_type $permission
     * @return $this
     */
    public function setPermission($permission)
    {
        $this->permission = $permission;
 
        return $this;
    }
 
    public function getRoles()
    {
        return array(
            $this->permission
        );
    }
 
    public function getEmail()
    {
        return $this->email;
    }
 
    public function setEmail($email)
    {
        $this->email = $email;
    }
 
    public function getId()
    {
        return $this->id;
    }
 
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }
 
    public function getUsername()
    {
        return $this->username;
    }
 
    public function setUsername($username)
    {
        $this->username = $username;
        return $this;
    }
 
    public function getDisplayName()
    {
        return $this->getNome();
    }
 
    public function setDisplayName($displayName)
    {}
 
    public function getPassword()
    {
        return $this->password;
    }
 
    public function setPassword($password)
    {
        if (! empty($password)) {
            $this->password = (string) $password;
        }
    }
 
    public function getState()
    {}
 
    public function setState($state)
    {}
 
    public function getConfirmpassword()
    {
        return $this->confirmpassword;
    }
 
    public function setConfirmpassword($confirmpassword)
    {
        $this->confirmpassword = $confirmpassword;
        return $this;
    }
 
    public function getClient()
    {
        return $this->client;
    }
 
    public function setClient($client)
    {
        $this->client = $client;
        return $this;
    }
 
    public function getAccesses()
    {
        return $this->accesses;
    }
 
    public function setAccesses($accesses)
    {
        $this->accesses = $accesses;
        return $this;
    }
 
    public function addAccesses(Collection $accesses)
    {
        foreach ($accesses as $access) {
            $access->setUser($this);
            $this->accesses->add($access);
        }
    }
 
    public function removeAccesses(Collection $accesses)
    {
        foreach ($accesses as $access) {
            $this->accesses->removeElement($access);
        }
    }
 
    public function addAccess($access)
    {
        foreach ($this->accesses as $tok) {
            if ($tok->getId() == $access->getId()) {
                return $this;
            }
        }
        $this->accesses[] = $access;
        return $this;
    }
 
    public function __toString()
    {
        return $this->getDisplayName();
    }
}