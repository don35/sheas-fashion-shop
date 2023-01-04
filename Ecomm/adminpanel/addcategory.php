
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop"style="left: 25px;">Add Categories
        </button>

     <!-- Modal -->
              <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Categories</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                        <label> Category Name </label>
                        <input type="text" name="name" class="form-control" placeholder="Enter Category Name" required="true">
                        </div>

                        <div class="form-group">
                        <label>Category Tag Name</label>
                        <input type="text" name="tag_name" class="form-control" placeholder="Enter Category Tag Name" required="true">
                        </div>

                        <div class="form-group">
                        <label for="">Category Description</label>
                        <textarea rows="3" name="description" placeholder="Enter Category Description" class="form-control" required="true"></textarea>
                        </div>

                        <div class="form-group">
                        <label for="formFileMultiple">Upload Image</label>
                        <input type="file" name="image" class="form-control">
                        
                        <div>
                        <label for="">Status</label>
                        <input type="checkbox" name="status">
                        </div>

                        <div>
                        <label for="">Top Sales</label>
                        <input type="checkbox" name="topsales">
                        </div>
                        
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>     
                        <button type="submit" class="btn btn-outline-success" name="add_category_btn">Save</button>
                        </div>
                        </form>
                        </div>
                </div>
                
                </div>
</div>

<div>    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</div>
</body>
</html>

<?php
