
      <!-- fifo -->
<?php 
  
  $n = (isset($_POST['ln']) ? $_POST['ln'] : '');
  $st = (isset($_POST['st']) ? $_POST['st'] : '');
  $nf = (isset($_POST['nf']) ? $_POST['nf'] : '');

  
  $ara= explode(" ", $st);

$frame=array();
for($i=0;$i<$nf;$i++){
    $frame[$i]= (int)-1;
}




$j=0;
$hit=0;
$miss=0;


for($i=0;$i<$n;$i++)
{


    $avail=0;

    for($k=0; $k<$nf ; $k++)
    {
        if($frame[$k]==$ara[$i])$avail=1;
    }

    if ($avail==0)
    {
        $frame[$j]=$ara[$i];
        $j=($j+1)%$nf;
        $miss++;

    }
    else
        $hit++;

}

$fhr=$hit/$n;
$fmr=$miss/$n;
$f_hit=$hit;
$f_miss=$miss;


?>





          <!-- html_part -->




<html>
  <head>
    <title>ALGO Result</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://fonts.googleapis.com/css?family=Cantora One' rel='stylesheet'>
    <style>
        
  body{
    background-image: linear-gradient(#181616,	#3a0913,#923c4d);
    background-repeat: no-repeat;
    /* background-size: 100% 100%; */
    height: 100vh;
  }

  *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Cantora One";


  }


  #box { 
	float:left;  
    /* background-image: linear-gradient(#4d4949,	#0c0b0c,#333030); */
	width:300px; 
	height:360px; 
	border: 5px;
	border-color: black;
	border-radius: 10px;
    color:white;
    margin-left:200px;
} 

.x{
    padding: 30px !important;
    border-radius: 3px;
    transition: 0.3s;
    width: 1000px;
    height:500px;
    position:relative;
    margin-top: 80px;
    border: 1px solid rgb(243, 238, 238);
    margin-left: 30px;
    box-shadow: 0 0 25px 0 #0f0f0f;
}

td{
    width:500px;
    font-size:1.4rem;
    color:white;
    font-weight:100;
    text-align:center; 
    height: 4rem;
}

.table{
  row-gap:55px; 
  margin-top:60px;


}
.heading{
    font-weight:100;
    text-align:center;
    color:white;
    font-size:2rem;
    /* box-shadow: 0 0 5px 0 #d5dfd6; */
}


    </style>
  </head>
  <body>

   <div class="x">
     
      

      
       <h3 class="heading"><u>Fist In First Out</u></h3>
         

              <table class="table">
                 <tr>
                  <td>The number of Hit</td><td><?php echo $f_hit ?></td>
                 </tr>
                
            
                <tr>
                  <td>The number of miss</td><td><?php echo $f_miss ?></td>
                </tr>

                <tr>
                  <td>Hit ratio</td><td><?php echo $fhr ?></td>
                </tr>

                <tr>
                  <td>Miss ratio</td><td><?php echo $fmr ?></td>
                </tr>
        
               </table>
       

  </div>

   

    
  </body>
</html>






 
