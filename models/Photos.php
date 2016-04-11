<?php

class Photos extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $userid;

    /**
     *
     * @var string
     */
    public $imagepath;

    /**
     *
     * @var string
     */
    public $comments;

    /**
     *
     * @var string
     */
    public $created;

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'photos';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Photos[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Photos
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
