<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @Table(name="comment")
 * @Entity
 */
class Comment
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
     * @var integer $newsid
     *
     * @Column(name="newsid", type="integer", nullable=false)
     */
    private $newsid;


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
     * @var integer $newsid
     *
     * @Column(name="newsid", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $newsid;


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
     * Set newsid
     *
     * @param integer $newsid
     */
    public function setNewsid($newsid)
    {
        $this->newsid = $newsid;
    }

    /**
     * Get newsid
     *
     * @return integer 
     */
    public function getNewsid()
    {
        return $this->newsid;
    }
}