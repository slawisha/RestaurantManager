<?php namespace Petrovic\Transformers;

abstract class Transformer{

	/**
	 * transforms a collection
	 * 
	 * @param  array  $items 
	 * @return array 
	 */
	public function transformCollection(array $items)
	{
		return array_map([$this, 'transform'], $items);	
	}

	public function paginate($items)
	{
		return [
				'total' => $items->getTotal(),
				"per_page"=> $items->getPerPage(),
			    "current_page"=> $items->getCurrentPage(),
			    "last_page"=> $items->getLastPage(),
			    "from" => $items->getFrom(),
			    "to" => $items->getTo()
				];
	}

	public abstract function transform($item);

}