<!DOCTYPE html>
<html>
<head>
	<title></title>


	<style>


.nav{
	
	height: 60px;
	padding-top: 20px;
}
.nav a{
	color: white;
	font-size: 20px;
	text-transform: uppercase;
	font-weight: bold;
	text-decoration: none;
	padding:13px 12px;
	background-color: #c0392b;
	text-align: center;
	border-radius: 7px;
	margin-left: 5px;
}
.nav a:hover{
	background-color: #229954;
}
</style>

</head>
<body>
<fieldset align = "right">
	
<h1 align="left" style="color: blue;"><b> Our website</span>.com</b></h1>
<div class="nav">
	<table width=50%>
		<tr>
			<td><a href="{{ route('home') }}"> Home </a></td>
			<td><a href="{{ route('teams') }}"> Teams </a></td>
			<td><a href="{{ route('service') }}"> Service </a></td>
			<td><a href="{{ route('contact') }}"> Contact</a></td>
			<td><a href="{{ route('about') }}"> About us </a></td>

		</tr>
	</table>
</div>
	@yield('Title')
	

</body>
</html>