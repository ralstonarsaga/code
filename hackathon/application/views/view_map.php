<html>
<head>
	<script type="text/javascript">
		var centreGot = false;
	</script>
	<?php echo $map['js']; ?>
</head>
<body>
<select class="form-control">
            <?php 

            foreach($groups as $row)
            { 
              echo '<option value="'.$row->description.'">'.$row->description.'</option>';
            }
            ?>
            </select>


</html>