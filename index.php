<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Sample PHP</title>
</head>

<body>
    <ul class="text-3xl bg-[#000] text-[#fff] shadow-lg gap-3 p-7">
    <?php
    $arr = array("black"=>"white","green"=>"yellow","red"=>"blue");
    foreach($arr as $key =>$i){
      echo "<div>$key =/is/or/the $i</div>";
    }


    $num  = 1;
    while($num <= 15) {
      echo "<div>$num</div>";
      $num++;
    }

    for($i=1; $i <= 100; $i++){
      echo $i;
      if($i == 10) {
        continue;
      }if($i == 40){
        break;
      }
    }

    ?>
    </ul>
</body>

</html>