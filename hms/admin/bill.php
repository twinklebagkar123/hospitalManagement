<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Bill</title>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-6 ">
      <div class="input-group">
      <input type="text"  class="form-control"  id="service" placeholder="service">
      <input type="text"  class="form-control" id="price" placeholder="price">
  
<button type="button" class="btn btn-outline-secondary btn-sm" id="add">  ADD</button>
</div>
    </div>
    <div class="col-6">
    <table class="table table-bordered" id="display">
    <thead>
    <tr>
      <th >Name</th>
      <th >Price</th>
  </tr>
  </thead>
  <tbody id="tbid">
  

  
  </tbody>  
  <tfoot>
   <tr >
      
      <td>TOTAL</td>
     <td id="total"></td>
    </tr>
</tfoot>
</table>

    </div>

    </div>
    
  </div>
 <script src="i.js"></script>



</body>
</html>