<?php

namespace App\Http\Controllers\Helpers;

// Set Filters for Eloquent Query
function AddQueryFilters(&$query, array $filters, array &$errors) {
  	if ($filters != null && count($filters) > 0) {
  		foreach ($filters as $key=>$value) {
  			$filter = $value;
			if (!property_exists($filter, 'key') || !property_exists($filter, 'operator') || !property_exists($filter, 'value')) {
				array_push($this->Errors, [
					'message' => "ERROR at index '$key' - Incorrectly Formed.", 
					'description' => "A filter must have a KEY, an OPERATOR, and a VALUE"
				]);
			}

  			$query = $query->where($filter->key, $filter->operator, $filter->value);
  		}
  	}
}

// Set Sorts for Eloquent Query
function AddQuerySorts(&$query, array $sorts, array &$errors) {

	if ($sorts != null && count($sorts) > 0) {
		foreach ($sorts as $key=>$value) {

			$sort = $value;
			if (!property_exists($sort, 'key') || !property_exists($sort, 'direction')) {
				array_push($errors, [
					'message' => "ERROR at index '$key' - Incorrectly Formed.", 
					'description' => "A sort must have a KEY and DIRECTION which can be either 'asc' or 'desc'"
				]);
			}

			$sort->direction = $sort->direction != 'asc' ? $sort->direction = 'desc' : $sort->direction;
			$query = $query->orderBy($sort->key, $sort->direction);
		}
	}
}


