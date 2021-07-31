


      <!-- fifo -->
      <?php 
  
  $n = (isset($_POST['ln']) ? $_POST['ln'] : '');
  $st = (isset($_POST['st']) ? $_POST['st'] : '');
  $nf = (isset($_POST['nf']) ? $_POST['nf'] : '');

  
  $ara= explode(" ", $st);


//   echo $n, "<br>";
//   for($i=0;$i<$n;$i++)echo $ara[$i]," ";
//   echo "<br>";
//   echo $nf, "<br>";

$frame=array();
for($i=0;$i<$nf;$i++){
    $frame[$i]= (int)-1;
}

// for($i=0;$i<$n;$i++)echo $frame[$i]," ";


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


<!-- opt -->


<?php 
  
  $n = (isset($_POST['ln']) ? $_POST['ln'] : '');
  $st = (isset($_POST['st']) ? $_POST['st'] : '');
  $m = (isset($_POST['nf']) ? $_POST['nf'] : '');

  
  $request= explode(" ", $st);
  $memory=array();
  for($i=0;$i<$n;$i++){
    $memory[$i]= (int)-1;
}

  $capacity=0;
  $j=0;
  $k;
  $l;

  
   $hit=0;
   $val=-1;
   $key;
   $vv;
  for($i=0;$i<$n;$i++)
  {
       $current=$request[$i];
       $fl=0;
      for($k=0;$k<$m;$k++)
      {
          if($memory[$k]==$current)
          {
              $fl=1;
              break;
          }
      }
      if($fl==1)$hit++;
      else{
      if($capacity<$m)
      {
          $capacity++;
          $memory[$j]=$current;
          $j++;
      }
      else
      {
          $mini=0;
          for($k=0;$k<$m;$k++)
          {
              $key=$memory[$k];
              $pos=4565824;
              for($l=$i+1;$l<$n;$l++)
              {
                  if($request[$l]==$key)
                  {
                      $pos=$l;
                      break;
                  }
              }
              if($pos>$mini)
              {
                  $mini=$pos;
                  $val=$key;
              }

          }
          for($k=0;$k<$m;$k++)
          {
              if($memory[$k]==$val)
              {
                  $memory[$k]=$current;
                  break;
              }
          }
      }
      }

  }

  
  $o_hit=$hit;
  $o_miss=($n-$hit);
  $ohr=$hit/$n;
  $omr=$o_miss/$n;


?>







                     <!-- LRU -->
    


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


  #leftbox { 
	float:left;  
    background-image: linear-gradient(#4d4949,	#0c0b0c,#333030);
	width:33%; 
	height:360px; 
	border: 5px;
	border-color: black;
	border-radius: 10px;
    color:white;
} 
#middlebox{ 
	float:left;  
    background-image: linear-gradient(#4d4949,	#0c0b0c,#333030);
	width:34%; 
	height:360px; 
	border: 5px;
	border-color: black;
	border-radius: 10px;
    color:white;
} 
#rightbox{ 
	float:right; 
    background-image: linear-gradient(#4d4949,	#0c0b0c,#333030); 
	width:33%; 
	height:360px; 
	border: 5px;
	border-color: black;
	border-radius: 10px;
    color:white;
} 
.pdiv{
     
     /* background-color: #d5dfd6; */
     padding: 30px !important;
     border-radius: 3px;
     transition: 0.3s;
     width: 1200px;
     height:120px;
     position:relative;
     margin-top: 80px;
     /* border: 1px solid rgb(243, 238, 238); */
     margin-left: 10px;
     box-shadow: 0 0 25px 0 #0f0f0f;
    
    
   }
 
   .heading-p{
             
             font-size:1.3rem;
             font-weight:100;
             line-height: 1.1;
             word-spacing: 4px;
             color:#f3ecec;
             /* box-shadow: 0 0 25px 0 #0f0f0f; */
            
   }

   span{
            color:#1c2833;
            font-weight:bold;
            font-size:1.5rem;
   }
   .heading{
            margin-top:10px;
            margin-left:10px;
            font-size:2.2rem;
            font-weight:bold;
            line-height: 1.1;
            word-spacing: 4px;
            color:white;
            text-shadow: 1px 1px #4682B4
  }


    </style>
  </head>
  <body>
         <br>
    <div>
        <h1 class="heading">Compared Result</h1>
    </div>
    <br><br>
   <div class="dtani">
       <div id = "leftbox"> 

      
          
           <h3 style=" box-shadow: 0 0 5px 0 #d5dfd6; color:black;">Least Recently Used</h3>
           <?php 
               echo "The number of Hit: ",$l_hit,"<br>";
               echo "The number of page fault: ",$l_miss,"<br>";
               echo "HIT ratio: ",$lhr,"<br>";
               echo "MISS ratio: ",$lmr,"<br>";



           ?>
       </div>
       
       <div id = "middlebox"> 
        <h3 style=" box-shadow: 0 0 5px 0 #d5dfd6;color:black;">Optimal Page Replacement</h3>

       <?php 
               echo "The number of Hit: ",$o_hit,"<br>";
               echo "The number of page fault: ",$o_miss,"<br>";
               echo "HIT ratio: ",$ohr,"<br>";
               echo "MISS ratio: ",$omr,"<br>";



           ?>
        </div>

       <div id = "rightbox"> 
       <h3 style=" box-shadow: 0 0 5px 0 #d5dfd6;color:black;">Fist In First Out</h3>
       <?php 
               echo "The number of Hit: ",$f_hit,"<br>";
               echo "The number of page fault: ",$f_miss,"<br>";
               echo "HIT ratio: ",$fhr,"<br>";
               echo "MISS ratio: ",$fmr,"<br>";



      ?>
      </div>

       

  </div>

   
  <div id="underbox">
        
        <?php 
 
           $mx=max($f_hit,$o_hit,$l_hit);
 
         if($mx==$f_hit){?>
              <!-- <h3 style="color :black">So,For This input <span>FIFO algorithm</span> is better</h3> -->

              <div class="pdiv">
              <p class="heading-p">
                  A good page replacement algorithm reduces the number of page fault.
                  In the above study  for the given data, it is found that the least number of page fault
                  is given by the <span>FIFO algorithm</span>. So for your given data <span>FIFO algorithm</span> will be best 
                  page replacement algorithm. 

              </p>
              </div>

              <?php 
           }
           else if($mx==$o_hit){ ?>
           <!-- <h3 style="color: black">So,For This input <span>OPT algorithm</span> is better</h3> -->

             <div class="pdiv">
              <p class="heading-p">
                  A good page replacement algorithm reduces the number of page fault.
                  In the above study  for the given data, it is found that the least number of page fault
                  is given by the <span>OPT algorithm</span>. So for your given data <span>OPT algorithm</span> will be best 
                  page replacement algorithm. 

              </p>
              </div>


            <?php 
           }
           else{?>

              <!-- <h3 style="color:black">So,For This input <span>LRU algorithm</span> is better</h3> -->

              <div class="pdiv">
              <p class="heading-p">
                  A good page replacement algorithm reduces the number of page fault.
                  In the above study  for the given data, it is found that the least number of page fault
                  is given by the <span>LRU algorithm</span>. So for your given data <span>LRU algorithm</span> will be best 
                  page replacement algorithm. 

              </p>
              </div>

             <?php 
           }
        ?>
          
       </div>
  <br>
    
  </body>
</html>






 
