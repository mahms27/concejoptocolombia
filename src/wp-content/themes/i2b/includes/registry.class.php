<?php
/**
 * Registry
 *
 * @author Made By Me
 * @version v0.0.1
 */
class Registry
{
    # +------------------------------------------------------------------------+
    # MEMBERS
    # +------------------------------------------------------------------------+
    private $properties = array();

    # +------------------------------------------------------------------------+
    # ACCESSORS
    # +------------------------------------------------------------------------+
    /**
     * @set     mixed   Objects
     * @param   string  $index  A unique index
     * @param   mixed   $value  Objects to be stored in the registry
     * @return  void
     */
    public function __set($index, $value)
    {
        $this->properties[ $index ] = $value;
    }

    /**
     * @get     mixed   Objects stored in the registry
     * @param   string  $index  A unique ID for the object
     * @return  object  Returns a object used by the core application.
     */
    public function __get($index)
    {
        return $this->properties[ $index ];
    }

    # +------------------------------------------------------------------------+
    # CONSTRUCTOR
    # +------------------------------------------------------------------------+
    public function __construct()
    {
    }


}
?>