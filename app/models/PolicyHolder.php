<?php
class PolicyHolder extends \Eloquent {
	/**
	 * Fillable.
	 *
	 * @return 
	 */
	protected $fillable = [];

	/**
	 * Has many.
	 *
	 * @return object
	 */
	public function policies() {
	  return $this->hasMany('Policy');
	}

	/**
	 * AJAX search method - simple search by id 
	 *
	 * @param $input array
	 * @return object
	 */
	public function search($input) {
		$result = PolicyHolder::find($input);
		return $result;
	}
}