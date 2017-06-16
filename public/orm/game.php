<?php

/**
 * game
 *
 * @Table(name="game")
 * @Entity
 */
class game
{
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
     * @Column(name="name", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

}