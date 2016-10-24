<?php

namespace App\Custom\Pagination;

use Illuminate\Pagination\LengthAwarePaginator;

class Presenter extends \Illuminate\Pagination\LengthAwarePaginator
{
    /**
     * Get the total count of pages.
     *
     * @return string|null
     */
    public function totalPages()
    {
        return ceil($this->total() / $this->perPage());
    }

    /**
     * Determine if there are more items in the data source.
     *
     * @return bool
     */
    public function hasMorePages()
    {
        return $this->currentPage() < $this->lastPage();
    }

    /**
     * Determine if there are more items in the data source.
     *
     * @return bool
     */
    public function hasPrevPages()
    {
        return $this->currentPage() > 1;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
      $pageCount=ceil($this->total()/$this->perPage());
        return [
            'success' => true,
            'data' => array_values($this->items->toArray()),
            'pagination' => [
                'page_count' => $pageCount,
                'current_page' => $this->currentPage(),
                'has_next_page' => $this->hasMorePages(),
                'has_prev_page' => $this->hasPrevPages(),
                'count' => $this->total(),
                'limit' => $this->perPage(),
            ],
        ];
    }
}
