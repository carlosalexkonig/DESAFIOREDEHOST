<html>
 <head>
  <title>Ansible Application</title>
 </head>
 <body>
 </br>
  <a href=http://187.84.228.110/index.html>Homepage</a>
 </br>
<?php 
 Print "Hello, World! I am a web server configured using Ansible and I am : ";
 echo exec('hostname');
 Print  "</BR>";
echo  "List of Databases: </BR>";
                        $link = mysqli_connect('187.84.228.107', 'foouser', 'abc') or die(mysqli_connect_error($link));
                $res = mysqli_query($link, "SHOW DATABASES;");
        while ($row = mysqli_fetch_assoc($res)) {
                echo $row['Database'] . "\n";
        }
?>
</body>
</html>
