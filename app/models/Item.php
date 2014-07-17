<?php

class Item extends \Eloquent {
	protected $fillable = ['name', 'description', 'price', 'category_id'];
}