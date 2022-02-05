<!-- <?php



foreach($contatti as $contatto){

    echo $contatto -> nome."<br>";
    
    echo $contatto -> cognome."<br>";
    echo $contatto -> numero."<br>";
}

?> -->

<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
}
</style>
</head>
<body>

<table>
  <tr>
    <td>Nome</td>
    <td>Cognome</td>
    <td>Numero</td>
</tr>

  
  <?php



  foreach($contatti as $contatto){
    echo '<tr><td>'.$contatto -> nome.'</td><td>'.$contatto -> cognome.'</td><td>'.$contatto -> numero.'</td></tr>';
      
}
      
?>
     
      
  

  
</table>

</body>
</html>