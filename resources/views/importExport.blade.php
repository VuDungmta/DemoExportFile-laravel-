<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<title>Import - Export Laravel 5</title>
 <meta charset="utf-8">
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" >
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Import - Export file  in Excel and CSV - PDF  Laravel 5- DungVT</a>
			</div>
		</div>
	</nav>
	<div class="container">
		<a href="{{ URL::to('downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
		<a href="{{ URL::to('downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
		<a href="{{ URL::to('downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
   	<a href="{{ URL::to('downloadExcel/pdf') }}"><button class="btn btn-success">Download PDF-PhpExcel</button></a>
   <a href="{{ route('pdfview',['download'=>'pdf']) }}"><button class="btn btn-success">Download PDF</button></a>
	<div>	<form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
			<input type="file" name="import_file" />
      </br>
			<button class="btn btn-primary">Import File</button>
		</form>
    </br>
    </br>
     </div>
   <div>
   <p style="font-size:30px;color:blue">
   List infomation users
   </p>
   <div>
   <table class="table">
		<tr>
			<th>No</th>
			<th>ID</th>
			<th>Name</th>
		</tr>
		@foreach ($items as $key => $item)
		<tr>
			<td>{{ ++$key }}</td>
			<td>{{ $item->id }}</td>
			<td>{{ $item->title }}</td>
		</tr>
		@endforeach
	</table>
   </div>
   </div>
	</div>
</body>
</html>
