
<?php 
  
  $n = (isset($_POST['ln']) ? $_POST['ln'] : '');
  $st = (isset($_POST['st']) ? $_POST['st'] : '');
  $nf = (isset($_POST['nf']) ? $_POST['nf'] : '');

  
  $ara= explode(" ", $st);

  $f=array();

for($i=0;$i<$nf;$i++){
    $f[$i]= (int)-1;
}
  


$hit=0;

for($i=0; $i<$n; $i++)
{
    $c=0;
    for($j=0; $j<$nf; $j++)
    {
        if($f[$j]==$ara[$i])
        {
            $hit++;
            $c++;
            break;
        }
    }
    for($j=0; $j<$nf; $j++)
    {
        if($f[$j]==-1)
        {
            $f[$j]=$ara[$i];
            $c++;
            break;
        }
    }
    if($c==0)
    {
        $vis=array();
        $pos=array();
        $mn=10000;
        $val=-1;
        $cnt=0;

        for($j=0; $j<$nf; $j++)
        {
            $vis[$f[$j]]=-1;
            $pos[$f[$j]]=0;
        }

        for($j=$i-1; $j>=0; $j--)
        {    

            $u=$ara[$j];
            $v=$ara[$j];

            $x=$vis[$u];
            $y=$pos[$v];

            if($x==-1 and $y==0)
            {
                $pos[$ara[$j]]=$j;
                if($j<$mn)
                {
                    $mn=$j;
                    $val=$ara[$j];
                }
                $cnt++;
                if($cnt==$nf)break;
            }
        }
        for($j=0; $j<$nf; $j++)
        {
            if($f[$j]==$val)
            {
                $f[$j]=$ara[$i];
                break;
            }
        }
    }
}

$l_miss=($n-$hit);
$l_hit=$hit;
$lhr=$hit/$n;
$lmr=($n-$hit)/$n;





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
     
      

      
       <h3 class="heading"><u>Optimal Page Replacement</u></h3>
         

              <table class="table">
                 <tr>
                  <td>The number of Hit</td><td><?php echo $l_hit ?></td>
                 </tr>
                
            
                <tr>
                  <td>The number of miss</td><td><?php echo $l_miss ?></td>
                </tr>

                <tr>
                  <td>Hit ratio</td><td><?php echo $lhr ?></td>
                </tr>

                <tr>
                  <td>Miss ratio</td><td><?php echo $lmr ?></td>
                </tr>
        
               </table>
       

  </div>

   

    
  </body>
</html>






 
