<?php

namespace App\Traits;

use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class ItemsQuery extends QueryBuilder
{
    public function __construct(array $filter = [], $leadRepo)
    {
        //request()->query->set('filter', $filter);

        $query = $leadRepo->query();

        parent::__construct($query, request());
        $this->request->query->set('filter', $filter);
        // $this->request->appends(request()->query());

        $this->allowedFilters([
            'nom', 'ville', 'produit',
            AllowedFilter::exact('dateCommand', 'created_at'),
        ]);
    }
}
