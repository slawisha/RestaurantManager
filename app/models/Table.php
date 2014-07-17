<?php

class Table extends \Eloquent {
	protected $fillable = ['number', 'seats', 'position', 'description', 'reserved', 'available', 'image_url'];
}