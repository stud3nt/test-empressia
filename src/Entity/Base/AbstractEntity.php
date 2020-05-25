<?php

namespace App\Entity\Base;

use Doctrine\ORM\Mapping as ORM;

abstract class AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", length=10, nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    public function getClass()
    {
        $pos = strpos(get_called_class(), 'App');

        if ($pos > 0)
            return substr(get_called_class(), $pos);

        return get_called_class();
    }

    public function getClassName()
    {
        $arr = explode('\\', $this->getClass());

        return end($arr);
    }

    public function getEntity()
    {
        return ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', $this->getClassName())), '_');
    }
}