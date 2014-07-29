<?php
class Transaction extends \Eloquent {
	/**
	 * Fillable.
	 *
	 * @return 
	 */
	protected $fillable = [];

	/**
	 * Belongs to.
	 *
	 * @return object
	 */
	public function policy() {
		return $this->belongsTo('Policy');
	}

	/**
	 * Get annaul sales statistics.
	 *
	 * @return object
	 */
	public function getAnnualSales() {
		// Query
		$sql = '
			SELECT 
				DATE_FORMAT(transactionDate, "%Y") AS year, 
				SUM(amount) AS amount
			FROM 
				transactions
			GROUP BY 
				DATE_FORMAT(transactionDate, "%Y")
		';

		// Return
		return DB::select($sql);
	}
}