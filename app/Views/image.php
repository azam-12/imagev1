 <!doctype html>
 <html lang="en">

 <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- jquery cdn link -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

     <title>Image Manipulation</title>


 </head>

 <body>

     <div class="container">
         <h1>Image Manipulation</h1>
         <?php

            use CodeIgniter\HTTP\Request;

            if (isset($validation)) : ?>
             <div class="text-danger">
                 <?= $validation->listErrors() ?>
             </div>
         <?php endif; ?>
         <form method="post" enctype="multipart/form-data">
             <div class="form-group">
                 <label for="">Upload File</label>
                 <input type="file" name="theFile" class="form-control" id="inputGroupFile03">
             </div>
             <button type="submit" name="Upload" class="btn btn-primary">Submit</button>
             
             <button type="button" id="btnId" class="btn btn-primary ajaxShow">Show All Images</button>
         </form>

         <div class="row" id="images_preview">
         
         </div>

         <script>

            $("#btnId").click(function () {
                $.ajax({
                        url: '<?= base_url('post/loadAll') ?>',
                        // url: "<php echo base_url(); ?>/Image/loadAll",
                        method: "GET",
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data){
                        $("#images_preview").html(data);
                        }
                    });
                event.preventDefault();
            });    

            //  $(document).on("#button", "form", function(e) {
            //      $.ajax({
            //             url: '<?= base_url('post/loadAll') ?>',
            //             // url: "<php echo base_url(); ?>/Image/loadAll",
            //             method: "GET",
            //             contentType: false,
            //             cache: false,
            //             processData: false,
            //             success: function(data){
            //             $("#images_preview").html(data);
            //             }
            //         });
            //         e.preventDefault();
            //  });
         </script>



     </div>



     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

     <!-- jquery cdn link -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 </body>

 </html>