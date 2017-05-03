<?php
namespace QuickBooksOnline\API\QueryFilter;

//Why this folder exists? @hao
/**
 * Class to have query message
 */
class QueryMessage
{

    /**
     * variable SQL
     * @var string $sql
     */
    public $sql;


    /**
     * variable Projection
     * @var array projection
     */
    public $projection;

    /**
     * variable entity
     * @var string $entity
     */
    public $entity;

    /**
     * variable whereClause
     * @var array whereClause
     */
    public $whereClause;

    /**
     * variable startposition
     * @var int startposition
     */
    public $startposition;

    /**
     * variable
     * @var int maxresults
     */
    public $maxresults;

    /**
     * variable orderByClause
     * @var string orderByClause
     */
    public $orderByClause;

    /**
     * Initialize a QueryMessage object
     */
    public function __construct()
    {
        $projection = array();
        $whereClause = array();
    }

    /**
     * Get SQL query specified by object's members
     * @return string query
     */
    public function getString()
    {
        if (empty($this->sql) || empty($this->entity)) {
            return null;
        }

        $query = "";
        $query .= $this->sql;

        if (0==count($this->projection)) {
            $query .= " "."*";
        } else {
            if (count($this->projection)) {
                $query .= " " . implode(", ", $this->projection);
            }
        }

        $query .= " FROM " . $this->entity;

        if (!empty($this->whereClause)) {
            if (count($this->whereClause)) {
                $query .= " WHERE " . implode(" AND ", $this->whereClause);
            }
        }

        if (!empty($this->orderByClause)) {
            $query .= " ORDERBY " . $this->orderByClause;
        }

        if (!empty($this->startposition)) {
            $query .= " STARTPOSITION " . $this->startposition;
        }

        if (!empty($this->maxresults)) {
            $query .= " MAXRESULTS " . $this->maxresults;
        }

        return $query;
    }
}
