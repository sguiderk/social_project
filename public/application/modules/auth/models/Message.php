<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @Table(name="message")
 * @Entity
 */
class Message
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
     * @var string $message
     *
     * @Column(name="message", type="string", length=50, nullable=false)
     */
    private $message;

    /**
     * @var string $username
     *
     * @Column(name="username", type="string", length=200, nullable=false)
     */
    private $username;

    /**
     * @var datetime $date
     *
     * @Column(name="date", type="datetime", nullable=false)
     */
    private $date;


    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $message
     *
     * @Column(name="message", type="string", length=50, precision=0, scale=0, nullable=false, unique=false)
     */
    private $message;

    /**
     * @var string $username
     *
     * @Column(name="username", type="string", length=200, precision=0, scale=0, nullable=false, unique=false)
     */
    private $username;

    /**
     * @var datetime $date
     *
     * @Column(name="date", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $date;


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
     * Set message
     *
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set date
     *
     * @param datetime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return datetime 
     */
    public function getDate()
    {
        return $this->date;
    }
}