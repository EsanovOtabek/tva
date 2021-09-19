<? 
$list_url=trim($_SERVER['REQUEST_URI'],'/');
$obj=new File();
$rows = $obj->select("user_id=".$_SESSION['user']['id']." AND file_tip='".$list_url."'");
?>

<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
        <div class="table-responsive">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
              <tr>
                <th>id</th>
                <th>Name</th>
                <th>Author name</th>
                <th>Language</th>
                <th>DateTime</th>
                <th>View</th> 
                <th>Edit</th>
                <th>Delete</th>
              </tr>
            </thead>
            <tbody>
              <? 
              foreach ($rows as $key => $row) {?>
                <tr>
                  <td><?=$key+1?></td>
                  <td><?=$row['name']?></td>
                  <td><?=$row['author']?></td>
                  <td><?=$row['language']?></td>
                  <td><?=$row['vaqt']?></td>
                  <td>
                  <?
                  
                  
                  if($row['matn']!="in_progress"){?>
                    <a href="<?=DR."/nutq/".$row['id']?>" class="btn btn-success"><i class="fa fa-eye"> View</i></a>
                  <?}else{
                      $status=$obj->checkRevai($row['rev_job_id'])['status'];
                      if($status=="transcribed"){
                        $obj->update($row['id'],$row['rev_job_id']);?>
                        <a class="btn btn-warning"><i class="fa fa-eye"> in_progress</i></a>
                      <?}else{?>
                    <a class="btn btn-warning"><i class="fa fa-eye"> <?=$status?></i></a>
                  <?} }?>

                  </td>
                  <td> 
                    <a href="<?=DR."/edit/".$row['id']?>" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a> 
                  </td>
                  <td>
                    <a href="" onclick="delet(<?=$row['id']?>)" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</a> 
                  </td>
                </tr>
                <?}?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">

    function delet(id) {
      if(confirm("Do you want to delete the file?")){
        var uri="<?=DR?>/delet.php?object=file&id="+id;
        location.href=uri;
        alert("File deleted!");
      }
    }

  </script>
