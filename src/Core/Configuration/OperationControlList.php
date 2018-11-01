<?php
namespace QuickBooksOnline\API\Core\Configuration;

/**
 * Provides controll over executable operations per described entities
 * Supports wildcards as global level.
 *
 * For instance, following array will set any operation available for any entity:
 * array( "*" => array( "*" => true ));
 *
 * Next example will restrict an operation for all entities, except Foo
 * array(
 *  "*"   => array( "operation" => false ),
 *  "Foo" => array( "operation" => true  ),
 * );
 *
 * @author amatiushkin
 */
class OperationControlList
{
    private $operationList = array();
    const ALL = '*';

    /**
     * It is possible to specify rules upon instance creation
     * In common it used to add first global rule, e.g.
     *
     * Next line of code will enable all for all:
     *  new OperationControlList( OperationControlList::getDefaultList(true) )
     *
     * @param array $array
     */
    public function __construct($array = array())
    {
        $this->setOperationList($array);
    }

    /**
     * Defines operations control list, any previosly existing rules will be removed
     * @param array $array
     */
    public function setOperationList($array)
    {
        $this->operationList = $array;
    }

    /**
     * Returns current operations control list
     * @return array
     */
    public function getOperationList()
    {
        return $this->operationList;
    }

    /**
     * Verifies if operation is available for some entity
     * @param string $entity
     * @param string $operation
     * @return bool
     */
    public function isAllowed($entity, $operation)
    {
        //fallback to global rules if entity wasn't specified in the rules
        $lookupEn = array_key_exists($entity, $this->operationList)
                            ? $entity
                            : self::ALL;

        //fallback to global rules if operation wasn't specified in the rules
        $lookupOp = array_key_exists($operation, $this->operationList[$lookupEn])
                            ? $operation
                            : self::ALL;

        // entity and operation were found as is
        if (($entity === $lookupEn) && ($operation === $lookupOp)) {
            return $this->operationList[$lookupEn][$lookupOp];
        }

        //lookup for operation for current entity if it exists
        if (array_key_exists($lookupOp, $this->operationList[$lookupEn])) {
            return $this->operationList[$lookupEn][$lookupOp];
        }

        //lookup for operation for current entity if it exists
        if (array_key_exists($operation, $this->operationList[self::ALL])) {
            return $this->operationList[self::ALL][$operation];
        }

        //fallback to global entity
        if (array_key_exists($lookupOp, $this->operationList[self::ALL])) {
            return $this->operationList[self::ALL][$lookupOp];
        }

        //fall back to global entity and operation
        return $this->operationList[self::ALL][self::ALL];
    }

    /**
     * Returns global configuration array (in other words global rule)
     * @param bool $value
     * @return array
     */
    public static function getDefaultList($value)
    {
        return array(self::ALL => array(self::ALL => $value));
    }

    /**
     * Appends rules to existing list
     * @param array $array
     */
    public function appendRules($array = array())
    {
        $this->setOperationList(array_merge_recursive($this->getOperationList(), $array));
    }
}
