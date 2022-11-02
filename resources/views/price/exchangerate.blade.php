<table class="table table-responsive table-bordered">
	<thead>
		<th>Product Name</th>
		<th>Actual Cost</th>
		<th>Dohome</th>
		<th>tai Watsadu</th>
		<th>tai Watsadu</th>
		<th>tai Watsadu</th>
		<th>tai Watsadu</th>
	</thead>
	<tbody>
		<?php foreach($data as $obj) { ?>
			<tr>
				<td>{{ $obj->name }}</td>
				<td>900</td>
				<td><input type="text" class="form-control "></td>
				<td><input type="text" class="form-control "></td>
				<td><input type="text" class="form-control "></td>
				<td><input type="text" class="form-control "></td>
				<td><input type="text" class="form-control "></td>
			</tr>
		<?php } ?>
	</tbody>
 </table>