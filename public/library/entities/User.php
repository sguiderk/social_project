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


}