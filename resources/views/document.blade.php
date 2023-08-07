<html>
<head>
<title>SCRUM</title>
<script type="text/javascript" src="<?php echo asset('js/jquery.min.js')?>"></script>
<script type="text/javascript" src="<?php echo asset('js/jquery.mask.min.js')?>"></script>
<script type="text/javascript" src="<?php echo asset('js/bootstrap.min.js')?>"></script>
<link rel="stylesheet" href="<?php echo asset('css/bootstrap.min.css')?>" type="text/css">

<script language="javascript">
function newDocument(){
    window.location.replace("{{ Route('prepareNewDocument') }}")
}

$(document).ready(function(){
	$('#addBtn').click(function(){
		$.post("{{ Route('addData') }}",{ 
			'_token':'{{ csrf_token() }}', 
			'column_one' : $('#column_one').val(), 
			'column_two' : $('#column_two').val(), 
			'column_three' : $('#column_three').val(), 
			'column_four' : $('#column_four').val() },function(data){
			console.log(data);
			document.forms[0].reset();
			$('#returnMessage').html('Data inserted sucessfully.');
			$('#returnMessage').attr('display','block');
			$('#returnMessage').fadeIn('slow');
			setTimeout("$('#returnMessage').fadeOut('slow')",3750);
			setTimeout("$('#returnMessage').attr('display','none')",5000);
		});
	});
});
</script>
</head>
<body>
<form action="{{ Route('generatePDF') }}" meyhod="post">
    <div class="container">
        <div class="row">
            <div class="col-lg-12" align="center"><input type="button" class="btn btn-primary" id="documentBtn" value="New Document"  onclick="newDocument()"></div>
		</div>
    </div>
    <div class="container" id="main_div"  style="display: none">
        <div class="row">
            <div class="col-lg-3"><input type="text" name="column_one" id="column_one" placeholder="Value of Column 1" required="required"></div>
            <div class="col-lg-3"><input type="text" name="column_two" id="column_two" placeholder="Value of Column 2" required="required"></div>
            <div class="col-lg-3"><input type="text" name="column_three" id="column_three" placeholder="Value of Column 3" required="required"></div>
            <div class="col-lg-3"><input type="text" name="column_four" id="column_four" placeholder="Value of Column 4" required="required"></div>
		</div>
        <div class="row">
        <input type="button" class="btn btn-primary" id="addBtn" value="Add Value"></div>
		</div>
		<div align="center" class="alert alert-success col-lg-12" role="alert" id="returnMessage" style="display: none"></div>
    </div>
    <div class="row"><input type="submit" class="btn btn-success" id="generatePDF" value="Generate PDF"></div>
</form>
</body>
</html>