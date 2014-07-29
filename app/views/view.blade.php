@extends('layout')

@section('content')
	<div class="page-header">
		<h1>Policy Holder: {{ $policy_holder->id }}</h1>
	</div>
  <a href="{{ action('HomeController@index') }}">&laquo; Back to List</a>
	<div class="panel panel-default">
		@if ($policy)
			<dl class="dl-horizontal">
			<dt>Policy #</dt><dd>{{ $policy->policyNumber }}</dd>
			<dt>Effective Date</dt><dd>{{ date('m/d/Y', strtotime($policy->effectiveDate)) }}</dd>
			<dt>Expiration Date</dt><dd>{{ date('m/d/Y', strtotime($policy->expirationDate)) }}</dd>
			<dt>Premium</dt><dd>${{ number_format($policy->premium, 2) }}</dd>
			<dt>State</dt><dd>{{ $policy->state }}</dd>
			<dt>Status</dt><dd>{{ $policy->policyStatus }}</dd>
			@if ($policy->policyStatus == 'Canceled')
				<dt>Cancellation Date</dt><dd>{{ date('m/d/Y', strtotime($policy->cancellationDate ))  }}</dd> 
			@endif
			</dl>
		@else 
			<p class="text-warning">No policies found</p>
		@endif
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Transactions</h3>
		</div>
		<div class="panel-body">
			@if (count($transactions))
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Transaction Date</th>
							<th>Description</th>
							<th>Amount</th>
							<th>Author Name</th>
						</tr>
					</thead>
					<tbody>
					@foreach($transactions as $transaction)
						<tr>
							<td>{{ date('m/d/Y', strtotime($transaction->transactionDate)) }} {{ date('g:i a', strtotime($transaction->transactionTime)) }}</td>
							<td>{{ $transaction->description }}</td>
							<td>${{ number_format($transaction->amount, 2) }}</td>
							<td>{{ $transaction->authorName }} </td>
						</tr>
					@endforeach
					</tbody>
				</table>
			@else 
				<p>No transactions found</p>
			@endif
		</div>
	</div>


	@if (count($policy_holder->policies) > 1)
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Policy History</h3>
			</div>
			<div class="panel-body">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Policy #</th>
							<th>Effective Date</th>
							<th>Expiration Date</th>
							<th>PremiumPremium</th>
							<th>State</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
					@foreach($policy_holder->policies as $pol)
						@if ($policy->id != $pol->id)
						<tr @if ($pol->policyStatus == 'Canceled') class="text-danger" @endif>
							<td>{{ $pol->policyNumber }}</td>
							<td>{{ date('m/d/Y', strtotime($pol->effectiveDate)) }}</td>
							<td>{{ date('m/d/Y', strtotime($pol->expirationDate)) }}</td>
							<td>${{ number_format($pol->premium, 2) }}</td>
							<td>{{ $pol->state }}</td>
							<td>{{ $pol->policyStatus }} @if ($pol->policyStatus == 'Canceled') {{ date('m/d/Y', strtotime($pol->cancellationDate)) }} @endif</td>
						</tr>
						@endif
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
	@endif
@stop
