<body bgcolor="#333333">

<?php
include "header.php";
?>
<body><!--
<div class="row">
    <div class="col-lg-12">
        <br />
        <ol class="breadcrumb">
            <li class="active"><a href="index.php">Home</a>
        </ol>
    </div>
</div>
-->
<div class="col-lg-12 container" >
<div class="page-header">
  <h1 style="color:white">Digital Soccer System </h1>
</div>
    <h1 align="center"  style="color:white">MashEast Division 1 League</h1>
    <br>
	</div>
    <script>
var i = 0; var path = new Array(); 

// LIST OF IMAGES 
path[0] = "../images/1.jpg"; 
path[1] = "../images/5.jpg"; 
path[2] = "../images/2.jpg"; 
path[3] = "../images/child.jpg"; 
path[4] = "../images/6.jpg"; 
path[5] = "../images/7.jpg"; 



function swapImage() 
{ 
document.slide.src = path[i]; 
if(i < path.length - 1) i++; 
else i = 0; 
setTimeout("swapImage()",3000); 
} 
window.onload=swapImage; 
</script>
<div class="container">
           <div class="panel panel-primary" style="background-color:#006600">
    <div class="row">
       <div class="col-md-4 "  >
            <div class="row "  >
              <div class="col-md-12 "  >
                 <div class="customDiv sidebarContent " >
<?php include 'slider.php';?>
				 <ul style="color:white" >
                <li  ><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
                <li><a href="info.php"><span class="glyphicon glyphicon-info-sign"></span>Teams</a></li>
                <li ><a href="#">Fixture</a></li>
                <li ><a href="#">Results</a></li>
                <li><a href="#">Log Standings</a></li>
				</div></div>
</div>
</div>
<div class="col-md-7 pull-right">
  <div class="mainContent customDiv " style="color:white"><strong >ABOUT ZIFA MashEast Division 1 League</strong><br></br>  <p >Zimbabwe Football Association (ZIFA)  is the football governing body in MashonaLand East Province. Which controls all football activities in MashonaLand East Province. It controls Division One League which consist of 16 teams. Zifa does registration of clubs, scheduling of matches and also recording of match statistics. </p><br></br>
   <img  src="../images/child.jpg" width="200"  height="150" /><img src="../images/6.jpg" width="200"  height="150" /><img src="../images/7.jpg" width="200"  height="150" /></div>
 
  </div></div></div>
    <div class="col-md-12 ">
  <h2 align="center" style="color:white" >Get involved in the local league games now, and enjoy the sport!!</h2>
</div>
</br></br></br></br></br></br></br>
<div class=" Footer navbar  navbar-fixed-bottom ">
<div class="container">
<?php
include "footer.php";
?> 
</div></div>
</div>

<style>
.mainContent {
text-align:center;
font-size:18px;
}

ul{ list-style:none;}
.customDiv ul li a{ color:black; margin-left:55px;}
nav ul li a{ color:#000000}

</style>

