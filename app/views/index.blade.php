@extends('layout')

@section('message') 
	@if (isset($message))
		<p class="text-danger">{{ $message }}</p>
	@endif
@stop

@section('content')

	<div class="page-header">
		<h1>Policies</h1>
	</div>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<form class="navbar-form navbar-left" role="search">
						<span class="caption">Simple search by record id</span>
					<div class="form-group">
						<input type="text" class="form-control" id="keywords" placeholder="Search">
					</div>
					<button type="submit" class="btn btn-default btn-search">Submit</button>
				</form>
			</div>
		</div>
	</nav>

	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Policy Holders</h3>
				</div>
				<div class="panel-body">
					@if ($policy_holders->isEmpty())
						<p>No policy holders</p>
					@else
						<table id="policy-holders" class="table table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>Address</th>
									<th>Address2</th>
									<th>City</th>
									<th>State</th>
									<th>Zip</th>
									<th>Status</th>
									<th>&nbsp;</th>
								</tr>
							</thead>
							<tbody>
							@foreach($policy_holders as $policy_holder)
								<tr>
									<td>{{ $policy_holder->id }}</td>
									<td>{{ $policy_holder->street_address }}</td>
									<td>{{ $policy_holder->street_addres_2 }}</td>
									<td>{{ $policy_holder->city }}</td>
									<td>{{ $policy_holder->state }}</td>
									<td>{{ $policy_holder->postal_code }}</td>
									<td>{{ $policy_holder->status }}</td>
									<td><a href="/view/{{ $policy_holder->id }}">Details</a></td>
								</tr>
							@endforeach
							</tbody>
						</table>
					@endif
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Annual Sales</h3>
				</div>
				<div class="panel-body">
					<table class="table table-condensed">
					<thead>
					<tr><th>Year</th><th>Amount</th></tr>
					</thead>
					<tbody>
					@foreach ($sales as $sale)
						<tr><td>{{ $sale->year }}</td><td>${{ number_format($sale->amount, 2) }}</td></tr>
					@endforeach
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<script type="text/html" id='table-data'>
		<% _.each(items, function(item, key, list) { %>
		<tr>
			<td><%= item.id %></td>
			<td><%= item.street_address %></td>
			<td><%= item.street_addres_2 %></td>
			<td><%= item.city %></td>
			<td><%= item.state %></td>
			<td><%= item.postal_code %></td>
			<td><%= item.status %></td>
			<td><a href="/view/<%= item.id %>">Details</a></td>
		</tr>
	    <% }) %>
	</script>
	<script type="text/javascript">
		$( document ).ready(function() {
			$('.navbar-form').submit(function(e){
				e.preventDefault();
				var input = $('#keywords').val();
				getPolicyHolders(input);
			});
			function getPolicyHolders(input) {
				var tableTemplate = $("#table-data").html();
				$.ajax({
				url: '/policy_holders',
				data: {input: input},
				dataType: 'json',
					success: function (data) {
						$("table#policy-holders tbody").html(
							_.template( tableTemplate, {items: data}
						));
					}
				});
			}
		});
	</script>
@stop
