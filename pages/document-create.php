<?php
include_once 'general.php';
$page_title = "Create Document";
?>
<!DOCTYPE html>
<html>

    <?php include_once 'head.php'; ?>
    <body>
        <div id="wrapper">

            <?php include_once 'navigation-bar.php' ?>

            <?php
            ///Check if form is submitted then:
            ///Validate fields
            //If data is valid then upload attachment: 1)

            if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') 
            {
                upload_file();
            }
            
            ?>
            <section>
                <div class="container">
                    <div class="panel">
                        <div class="panel-body">                               
                            <form action="document-create.php" method="post" enctype="multipart/form-data">
                                <?php
                                if (isset($success) && $success) 
                                {
                                    echo "<div class='alert alert-success'>$message</span></div>";
                                }
                                else if (isset($success) && !$success)
                                {
                                    echo "<div class='alert alert-danger'>$message</span></div>";    
                                }
                                ?>
                                
                                <h3><span class="glyphicon glyphicon-briefcase"></span> Create Document</h3>
                                <div class="form-group">
                                  <label for="formTitle">Title</label>
                                  <input type="text" class="form-control input-lg" id="formTitle">
                                </div>
                                <div class="form-group">
                                  <label for="formDesc">Description</label>
                                  <textarea class="form-control input-lg" id="formDesc"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="formDesc">Access Level</label>
                                  <select class="form-control input-lg" id="formAccess">
                                      <option value="1">General</option>                     
                                      <option value="2">Manager</option>                  
                                      <option value="3">Administrator</option>
                                  </select>
                                </div>
                                  <div class="form-group">
                                    <label for="category">Category</label><select name="category" class="form-control input-lg" id="category"><option value="1">Classified</option><option value="2">Unclassified</option><option value="3">Misc</option><option value="4">Category C</option><option value="5">ttrt</option></select>
                                </div>  
                                  <div class="form-group">
                                   <label for="category">Access Level</label><select name="accessLvl" class="form-control input-lg" id="accessLvl"><option value="1">General</option><option value="2">Manager</option><option value="3">Administrator</option><option value="4">Root</option></select>              
                                  </div>
                                  <div class="form-group">
                                      <label for="category">Tags</label>
                                      <input field="text" name="tags" data-role="tagsinput" />
                                  </div>  
                                  <div class="form-group">
                                      <label for="version">Version</label>
                                      <input type="text" name="version" class="form-control input-lg" id="version" value="1.0" disabled="disabled">
                                  </div>                                     
                                    <label class="btn btn-warning" for="my-file-selector">
                                        <input id="my-file-selector" type="file" class="btn btn-danger" name="uploadfile" style="display:none;" onchange="$('#upload-file-info').html('<span class=\'glyphicon glyphicon-file\'></span> ' + $(this).val())">
                                        <span class="fa fa-folder-open"></span> Browse...
                                    </label>
                                    <h1 class="label label-default" id="upload-file-info"></h1>
                                </div>
                                <input type="submit" value="Submit" class="btn btn-warning" name="submit">
                            </form>
                        </div>
                    </div>
                
            </section>
        <?php include_once 'footer.php'; ?></div>
   
    </body>
</html>
