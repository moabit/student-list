<?php

namespace Studentlist\Helpers;
/**
 * pagination and url generation class
 */

/**
 * Class Pager
 * @package Studentlist\Helpers
 */
class Pager
{
    /**
     * @var array
     */
    protected $params = []; // array of GET-variables
    /**
     * @var float
     */
    protected $totalPages;
    /**
     * @var int|mixed
     */
    protected $currentPage;


    /**
     * Pager constructor.
     * @param array $params
     * @param $studentQuantity
     * @param int $limit
     */
    public function __construct(array $params, $studentQuantity, $limit = 15)
    {
        $this->params = $params;
        $this->totalPages = ceil($studentQuantity / $limit);
        $this->currentPage = isset($params['page']) ? $params['page'] : 1;
    }

    /**
     * @param $field
     * @return string
     */
    public function getSortingLink($field)
    {
        $direction = 'asc';
        if ($field == $this->params['field']) {
            $direction = $this->params['direction'] == 'asc' ? 'desc' : 'asc';
        }
        return $this->generateURL(['direction' => $direction, 'field' => $field, 'page' => 1]);
    }

    /**
     * @param $page
     * @return string
     */
    public function getPageLink($page)
    {
        return $this->generateURL(['page' => $page]);
    }

    /**
     * @param $params
     * @return string
     */
    private function generateURL($params)
    {
        return http_build_query(array_replace($this->params, $params));
    }

    /**
     * @param $field
     * @return string
     */
    public function getPointer($field)
    {
        if ($field == $this->params['field']) {
            $glyph = $this->params['direction'] == 'asc' ? '▲' : '▼';
            return $glyph;
        }
    }

    /**
     * @return float
     */
    public function getTotalPages()
    {
        return $this->totalPages;
    }

    /**
     * @return int|mixed
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @return mixed
     */
    public function getSearch()
    {
        return $this->params['search'];
    }

    /**
     * @return mixed
     */
    public function getNotify ()
    {
        return $this->params['notify'];
    }
}