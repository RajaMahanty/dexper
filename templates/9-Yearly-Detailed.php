<?php 
	include_once "../init.php";

	// User login check
	if ($getFromU->loggedIn() === false) {
        header('Location: ../index.php');
	}
	
	include_once 'skeleton.php';	
?>

<div class="wrapper">
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					
					<!-- <i class="fas fa-ellipsis-h"></i> -->
					<h4 style="font-family:'Source Sans Pro'; font-size: 1.3em; text-align: center">Expenses incurred between <?php echo $_SESSION['yrfrom'] ?> and <?php echo $_SESSION['yrto'] ?> </h4>    

				</div>
				<div class="card-content">
					<table>
						<thead>
							<tr>
								<th>#</th>
								<th>Item</th>
								<th>Cost</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody id="chart-facilitate">
							<?php 
								$yrexp = $getFromE->yrwise($_SESSION['UserId'],$_SESSION['yrfrom'],$_SESSION['yrto']);
								if($yrexp !== NULL)
								{
									$len = count($yrexp);
									for ($x = 1; $x <= $len; $x++) {
									echo "<tr>
										<td>".$x."</td>
										<td>".$yrexp[$x-1]->Item."</td>
										<td>"."₹ ".$yrexp[$x-1]->Cost."</td>
										<td>".date("g:i A - d/m/Y",strtotime($yrexp[$x-1]->Date))."</td>
									</tr>";	
									}
								}
							?>					
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-12 col-m-12 col-sm-12">
			<div class="card">
				<div class="card-header">
					<h3>
						Expense Graph
					</h3>
					<div class="card-content">
						<canvas id="myChart3"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="../static/js/9-Yearly-Detailed.js"></script>

