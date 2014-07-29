<?php
class Policy extends \Eloquent {
	/**
	 * Fillable.
	 *
	 * @return object
	 */
	protected $fillable = [];

	/**
	 * Belongs to.
	 *
	 * @return object
	 */
	public function policy_holder() {
		return $this->belongsTo('PolicyHolder');
	}

	/**
	 * Has many.
	 *
	 * @return object
	 */
	public function transactions() {
		return $this->hasMany('Transaction', 'policyID');
	}
}