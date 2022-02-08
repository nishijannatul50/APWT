<!DOCTYPE html>
<html>
<head>
	<title></title>


	<style>


.nav{
	
	height:80px;
	padding-top: 20px;
}
.nav a{
	color: white;
	font-size: 20px;
	text-transform: uppercase;
	font-weight: bold;
	text-decoration: none;
	padding:15px 20px;
	background-color: #c0392b;
	text-align: center;
	border-radius: 15px;
	margin-left: 7px;
	margin-right: 7px;
}
.nav a:hover{
	background-color: #229954;
}
</style>

</head>
<body>
<fieldset align = "left">
	

<div class="nav">
	<table width=50%>
		


		<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
	  <a class="btn btn-primary" href="{{route('login')}}">Login</a>
      </li>
      <li class="nav-item">
	  <a class="btn btn-primary" href="{{route('registration')}}"> Registration </a>
      </li>
      <li class="nav-item">
	  <a class="btn btn-primary" href="{{route('contact')}}"> Contact </a>
      </li>
    </ul>
    
  </div>
</nav>


	</table>
</div>
	@yield('Title')
	

</body>
</html>