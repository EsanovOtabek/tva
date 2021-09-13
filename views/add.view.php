<?
  $_SESSION['_shrft']=md5(time()).rand();
?>
<div class="row">
 <div class="col-md-12">
  <div class="tile">
    <h3 class="tile-title">Vertical Form</h3>
    <div class="tile-body">
      <form method="POST" action="fetch.php" enctype="multipart/form-data">
        <div class="row">

          <div class="form-group col-md-6">
            <label class="control-label">Name</label>
            <input class="form-control" name="name" type="text" placeholder="Name">
          </div>
          <div class="form-group col-md-6">
            <label class="control-label">Author Name</label>
            <input class="form-control" name="author" type="name" placeholder="Author name">
          </div>

          <div class="form-group col-md-6">
            <label for="exampleSelect1">Language</label>
            <select class="form-control" id="exampleSelect1" name="language">
              <option value="eng">eng</option>
              <option value="rus">rus</option>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label for="exampleSelect2">File Tip</label>
            <select class="form-control" id="exampleSelect2" name="file_tip">
              <option value="video">video</option>
              <option value="audio">audio</option>
            </select>
          </div>

          <div class="form-group col-md-6">
            <label class="control-label">File Change</label>
            <input class="form-control" type="file" name="file">
          </div>
        </div>

        <input type="hidden" name="object" value="file">
        <input type="hidden" name="method_name" value="add">
        <input type="hidden" name="_shrft" value="<?=$_SESSION['_shrft']?>">
        <div class="tile-footer">
          <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add File</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>