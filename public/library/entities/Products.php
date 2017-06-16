<?php



use Doctrine\ORM\Mapping as ORM;

/**
 * Products
 *
 * @Table(name="products")
 * @Entity
 */
class Products
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
     * @Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;


}