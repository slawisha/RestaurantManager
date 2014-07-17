<?php

class ItemOrder extends \Eloquent {
	protected $table = 'item_order';
	protected $fillable = ['order_id','item_id','quantiy'];
}