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


}