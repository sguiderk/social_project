<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * News
 *
 * @Table(name="news")
 * @Entity
 */
class News
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
     * @var string $title
     *
     * @Column(name="title", type="string", length=200, nullable=false)
     */
    private $title;

    /**
     * @var string $content
     *
     * @Column(name="content", type="string", length=200, nullable=false)
     */
    private $content;

    /**
     * @var datetime $date
     *
     * @Column(name="date", type="datetime", nullable=false)
     */
    private $date;

    /**
     * @var integer $userid
     *
     * @Column(name="userid", type="integer", nullable=false)
     */
    private $userid;


    /**
     * @var integer $id
     *
     * @Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @Id
     * @GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string $title
     *
     * @Column(name="title", type="string", length=200, precision=0, scale=0, nullable=false, unique=false)
     */
    private $title;

    /**
     * @var string $content
     *
     * @Column(name="content", type="string", length=200, precision=0, scale=0, nullable=false, unique=false)
     */
    private $content;

    /**
     * @var datetime $date
     *
     * @Column(name="date", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $date;

    /**
     * @var integer $userid
     *
     * @Column(name="userid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $userid;


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
     * Set title
     *
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
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

    /**
     * Set userid
     *
     * @param integer $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * Get userid
     *
     * @return integer 
     */
    public function getUserid()
    {
        return $this->userid;
    }
}