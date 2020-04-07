<!DOCTYPE html>
<html>
<head>
	<title></title>
	
   <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
      <form class="form-inline" action="<?= base_url('Final_sub/custom') ?> " >
  <div class="form-group mb-2">
   
    <input type="text" class="form-control" id="title" placeholder="Title">
  </div>
  
   <div class="form-group mb-2">
   
    <input type="text" class="form-control" id="class" placeholder="class">
  </div>
  
  <div class="form-group mb-2">
   
    <input type="text" class="form-control" id="subject" placeholder="subject">
  </div>
  <button type="submit" class="btn btn-primary mb-2" name="submit">Submit</button>
</form>
<br><br><br>
<button type="submit" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">Add custom quiz</button>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add a question </h4>
        </div>
        <div class="modal-body">
         <form method="post" action="<?= base_url('Final_sub/display_questions') ?> ">
          <input type="text" name="question" placeholder="enter a questions">
        </div>
        <div class="modal-footer">
         <input type="submit" name="submit" value="Save" >
          </form>
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>
      </div>
      
    </div>
  </div>
  
</div>
<div class="container">
	<form  action="<?= base_url('Final_sub/view_q') ?> " 
        method= "post">
	<?php
	if(isset($data)){
		foreach($data->result() as $row)
			echo '<div class="checkbox">
      <input type="checkbox"  name ="ques[]" value='.$row->question.'><b>'.$row->question.'</b><br><br></label>
    </div>';
		
	}
	?>
	
	<button type="submit" value="Create quiz" name="submit">Create quiz</button>
</form>
</div>
</body>
</html>