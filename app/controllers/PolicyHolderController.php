<?php

class PolicyHolderController extends BaseController {
	public function index() {
		$input = Input::all();
		$items = PolicyHolder::getModel()->search($input);
		return Response::json($items);
	}
}
