<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<?php


if(isset($data)){
foreach($data->result() as $row){
	echo '
	<b>Title:'.$row->title.'</b>
	<br><br>
	<b>Class'.$row->class.'</b>
	<br><br>

	<div class="container">
	 <form method="post" action = "'.base_url('Final_sub/store_a').'">

	<div class="form-group">

	<input type="text" name="question" value="'.$row->question.' "><br><br>
	</div>
	<div class="form-group">

	<input type="text" name = "answer" placeholder="enter  answer"><br><br>
	</div>
	<div class="form-group">
	<input type="hidden" name="hidden_id" value="'.$row->q_id.'"/>
	<input type="hidden" name="hidden_title" value="'.$row->title.'"/>
	<button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
	</div>
</form>
</div>

	';
}
}

?>




</body>
</html>