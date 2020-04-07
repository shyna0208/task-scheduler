<head>
<style>
.btn{ font-size:18px; font-weight:300; background-color:#999999; margin-left:65px;}
#b1{margin-left:100px;}
.l1{font-weight:bold}
</style>
<title>Task Scheduler</title></head>
<form action="#" method="post" >
<Table class="division" border="1" align="center">
<TR> <th colspan="2"><center><h2>Task Scheduler</h2></center></th></TR>
<tr><td>
<label class="l1"> Name of Employee</label></td>
<td>
<input type="text"  name="name" /></td></tr>
   <tr><td>
     <label class="l1" >Task</label></td>
<td>
			<input type="text"  name="task"/></td></tr>
        <tr><td>
<label class="l1"> Deadline Date</label></td>
<td>
			<input type="date"  name="deadline" /></td>
            </tr>
         <tr>
            <td>
           
<label class="l1">Priority</label></td>
<td>
			<select name="priority">
            <option>High</option>
            <option>Medium</option>
            <option>Low</option>
            
            
            
            </select></td></tr>
		
        <tr><td colspan="2">
       
<input type="submit" value="Add Task" name="submit" class="btn" id="b1"/> </td>
</tr>           
		
     
        </form>
        <table align="center">
 <tr><td colspan="2">  For results click on VIEW TASK...</td></tr>
   <tr> <td><input type="submit" value="View Task" name="view" class="btn"/>   </td></tr>   
        </table>
<?php
include('connection.php');

if(isset($_POST['submit']))
{
$a=$_POST['name'];
$b=$_POST['task'];
$c=$_POST['deadline'];
$d=$_POST['priority'];

$q="insert into Task(name,task,due,priority)values('$a','$b','$c','$d')";
if(mysqli_query($con,$q))
{
echo "<script> alert('Data has been inserted');</script>";
}
else
{
echo mysqli_error($con);
}
}
?>

<?php
include('connection.php');
if(isset($_POST['view']))
{
$sql="select * from task ORDER BY FIELD(priority,'High','Medium','Low')";
$query=mysqli_query($con,$sql);

?>
<html>
<table align="center" border="1">
<tr>
<th>Name</th>
<th>Task</th>
<th>Deadline</th>
<th>Priority</th>
</tr>
</html>
<?php
while($show=mysqli_fetch_array($query))
{
	?>      	<tr>
                	
                    <td><?php echo $show['name'] ?></td>
					<td><?php echo $show['task'] ?></td><br />
                    <td> </label><span class="fontt"><?php echo $show['due'] ?></span></td>
                    <td></label><span class="fontt"><?php echo $show['priority'] ?></span></td>
                    </tr>
                   
       
  <?php
}

}

?>
</table>
