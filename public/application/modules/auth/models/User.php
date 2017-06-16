<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @Table(name="user")
 * @Entity
 */
class User
{
    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", nullable=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $name
     *
     * @Column(name="name", type="string", length=200, nullable=true)
     */
    private $name;

    /**
     * @var string $email
     *
     * @Column(name="email", type="string", length=200, nullable=true)
     */
    private $email;

    /**
     * @var string $password
     *
     * @Column(name="password", type="string", length=200, nullable=true)
     */
    private $password;

    /**
     * @var datetime $created
     *
     * @Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @var string $pathimg
     *
     * @Column(name="pathimg", type="string", length=500, nullable=false)
     */
    private $pathimg;

    /**
     * @var string $company
     *
     * @Column(name="company", type="string", length=200, nullable=false)
     */
    private $company;

    /**
     * @var string $role
     *
     * @Column(name="role", type="string", length=200, nullable=false)
     */
    private $role;


    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $name
     *
     * @Column(name="name", type="string", length=200, precision=0, scale=0, nullable=true, unique=false)
     */
    private $name;

    /**
     * @var string $email
     *
     * @Column(name="email", type="string", length=200, precision=0, scale=0, nullable=true, unique=false)
     */
    private $email;

    /**
     * @var string $password
     *
     * @Column(name="password", type="string", length=200, precision=0, scale=0, nullable=true, unique=false)
     */
    private $password;

    /**
     * @var datetime $created
     *
     * @Column(name="created", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $created;

    /**
     * @var string $pathimg
     *
     * @Column(name="pathimg", type="string", length=500, precision=0, scale=0, nullable=false, unique=false)
     */
    private $pathimg;

    /**
     * @var string $company
     *
     * @Column(name="company", type="string", length=200, precision=0, scale=0, nullable=false, unique=false)
     */
    private $company;

    /**
     * @var string $role
     *
     * @Column(name="role", type="string", length=200, precision=0, scale=0, nullable=false, unique=false)
     */
    private $role;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set created
     *
     * @param datetime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * Get created
     *
     * @return datetime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set pathimg
     *
     * @param string $pathimg
     */
    public function setPathimg($pathimg)
    {
        $this->pathimg = $pathimg;
    }

    /**
     * Get pathimg
     *
     * @return string 
     */
    public function getPathimg()
    {
        return $this->pathimg;
    }

    /**
     * Set company
     *
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set role
     *
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }
}