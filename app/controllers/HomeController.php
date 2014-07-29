<?php

class HomeController extends BaseController {

	/**
	 * Default method.
	 *
	 * @return void
	 */
	public function index() {
		// Show a listing of policies.
		$policy_holders = PolicyHolder::all();

		// Display error message
		if (Session::get('error')) {
			$message = Session::get('error');
		}

		// Get yearly sales statistics
		$sales = Transaction::getModel()->getAnnualSales();

		// Return
		return View::make('index', compact('policy_holders', 'message', 'sales'));
	}

	/**
	 * View method
	 *
	 * @param $id int
	 * @return void
	 */
	public function view($id) {
		// Get policy holder
		$policy_holder = PolicyHolder::find($id);
		if (!isset($policy_holder->id)) {
			Session::flash('error', 'Invalid ID');
			return Redirect::to('/');
		}

		// Get most recent policy details
		$policy     = last($policy_holder->policies->toArray());
		$policy     = Policy::find($policy['id']);
		$policy_ids = array_pluck($policy_holder->policies->toArray(), 'id');

		// Get all transactions for this policy holder
		$transactions = DB::table('transactions')
			->whereIn('policyID', $policy_ids)
			->orderBy('transactionDate', 'desc')
			->get();

		// Return 
		return View::make('view', compact('policy_holder', 'policy', 'transactions'));
	}
}
