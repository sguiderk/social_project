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


}