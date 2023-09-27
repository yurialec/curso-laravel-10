<?php

namespace App\Adapters;

use App\Http\Resources\DefaultResource;
use App\Interfaces\PaginationInterface;

class ApiAdapter
{
    public static function tojson(
        PaginationInterface $data
    ) {
        return DefaultResource::collection($data->items())
            ->additional([
                'meta' => [
                    'total' => $data->total(),
                    'is_first_page' => $data->isFirstPage(),
                    'is_last_page' => $data->isLastPage(),
                    'current_page' => $data->currentPage(),
                    'get_next_page' => $data->getNumberNextPage(),
                    'get_prev_page' => $data->getNumberPreviousPage(),
                ]
            ]);
    }
}
