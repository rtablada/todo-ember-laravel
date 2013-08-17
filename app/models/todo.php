<?php

class Todo extends Eloquent
{
	protected $fillable = array(
		'is_completed',
		'title'
	);
}
