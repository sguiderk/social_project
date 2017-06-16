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


}