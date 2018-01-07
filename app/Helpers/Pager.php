<?php

namespace Studentlist\Helpers;
/**
 * pagination and url generation class
 */

class Pager
{
    protected $params = []; // array of GET-variables
    protected $totalPages;
    protected $currentPage;


    public function __construct(array $params, $studentQuantity, $limit = 15)
    {
        $this->params = $params;
        $this->totalPages = ceil($studentQuantity / $limit);
        $this->currentPage = isset($params['page']) ? $params['page'] : 1;
    }

    public function getSortingLink($field)
    {
        $direction = 'asc';
        if ($field == $this->params['field']) {
            $direction = $this->params['direction'] == 'asc' ? 'desc' : 'asc';
        }
        return $this->generateURL(['direction' => $direction, 'field' => $field, 'page' => 1]);
    }

    public function getPageLink($page)
    {
        return $this->generateURL(['page' => $page]);
    }

    private function generateURL($params)
    {
        return http_build_query(array_replace($this->params, $params));
    }

    public function getPointer($field)
    {
        if ($field == $this->params['field']) {
            $glyph = $this->params['direction'] == 'asc' ? '▲' : '▼';
            return $glyph;
        }
    }

    public function getTotalPages()
    {
        return $this->totalPages;
    }

    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    public function getSearch()
    {
        return $this->params['search'];
    }

    public function getNotify ()
    {
        return $this->params['notify'];
    }
}