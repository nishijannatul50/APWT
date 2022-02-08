@extends('layout.navbar')
@section('Title')
<marquee><h1 align="left" style="color:black;"><b>This is service page</span></b></h1></marquee>
<h1 align="left" style="color:black;"><b>Product Information</span></b></h1>
<h3 align="left" style="color:black;"><b>
@foreach($array as $title => $info)
    {{

         $title . " = " . $info;

    }}
    
    <?php 
        echo "<br>";
        ?>
    @endforeach
    </span></b></h3>
@endsection