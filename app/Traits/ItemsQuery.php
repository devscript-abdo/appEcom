<?php

namespace App\Traits;

use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class ItemsQuery extends QueryBuilder
{
    public function __construct(array $filter = [], $model)
    {
        //request()->query->set('filter', $filter);

        $query = $model->query();

        parent::__construct($query, request());
        
        $this->request->query->set('filter', $filter);
        // $this->request->appends(request()->query());

        $this->allowedFilters([
            'nom', 'ville', 'produit',
            AllowedFilter::scope('from_to'),
            //AllowedFilter::exact('dateCommand', 'created_at'),
        ]);
    }
}
