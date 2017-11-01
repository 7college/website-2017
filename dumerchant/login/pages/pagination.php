<?php
$page_rows=100;
$last=ceil($rows/$page_rows);
$lastPage=$last;

if($last<1){
   
     $last=1;
}

//$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$actual_link=$_SERVER['PHP_SELF'].'?data='.$_GET['data'];
$pagenum=1;

if(isset($_GET['pn'])){
   
   
   $pagenum=preg_replace('#[^0-9]#','',$_GET['pn']);
}

if($pagenum<1){
    $pagenum=1;
}
else if($pagenum>$last){
   
     $pagenum=$last;
   
}

$limit='LIMIT '.($pagenum -1)*$page_rows.','.$page_rows;

//echo $limit;


$textline1="Total <b>$rows</b>";
$textline2="Page <b>$pagenum</b> of $last";

$paginationCtrls='';
if($last!=1){
   
    if($pagenum>1){
       
        $previous=$pagenum -1;
        //echo $previous;
        $paginationCtrls .='<a href="'.$actual_link.'&pn='.$previous.'">Previous</a> &nbsp;&nbsp;';
        for($i=$pagenum -4; $i<$pagenum; $i++){
           
            if($i>0){
               
                $paginationCtrls .='<a href="'.$actual_link.'&pn='.$i.'">'.$i.'</a>&nbsp;&nbsp;';
            }
        }
       
       
    }
    $paginationCtrls .=''.$pagenum.' &nbsp;';
   
    for($i=$pagenum +1; $i<$last; $i++){
        $paginationCtrls .='<a href="'.$actual_link.'&pn='.$i.'">'.$i.'</a> &nbsp;&nbsp;';
           
            if($i>$pagenum + 4){
                break;
               
            }
        }
       
   
   
    if($pagenum!=$last)
   
    {
        $next=$pagenum +1;
        $paginationCtrls .='<a href="'.$actual_link.'&pn='.$next.'">Next</a> &nbsp;&nbsp;';
       
    }
}
?>