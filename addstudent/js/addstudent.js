<script type="text/javascript">
    function getDepartments(college){
      document.getElementById('department_select').innerHTML = "";
      console.log('I was called');
      var college_id = college;
      <?php 
      $url= $link . $site . "get-departments?college_id=".'<script>document.write(college_id)</script>';
      echo $url;
      $json = file_get_contents($url);
      $array = json_decode($json); 
      $c=count($array->departments);
      $i=0;
      while($i<$c)
      {
        echo "<option value='". $array->departments[$i]->department_id. "'>" . $array->departments[$i]->department_name."</option>";
        $i++;
      }?>
    }
  </script>