<!-- 
Through this page 
We add student details in database and then go next page to upload student marks in database. 
-->

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1" />

   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
      crossorigin="anonymous" />

   <title>Admin Panel!</title>
</head>

<body>
   <div class="bg-primary text-light h1 py-3">
      <div class="container">Admin Panel</div>
   </div>

   <div class="mx-auto">
      <div class="container py-4">


         <div class="card">
            <div class="card-header">
               <div class="d-flex justify-content-between">
                  <a title="Go Back" class="btn btn-danger" href="<?=site_url('admin');?>"><i class="fa fa-arrow-left">
                        &nbsp; Go Back</i></a>
                  <a title="Add Student" class="btn btn-primary" href="<?=site_url('admin/add_student');?>"><i
                        class="fa fa-user-plus"></i> &nbsp; Add Student</a>
                  <a title="Go to view deleted data" class="btn btn-warning" href="<?=site_url('admin/stu_bin');?>"><i
                        class="fa fa-recycle"></i> Recycle Bin &nbsp; <i class="fa fa-arrow-right"></i></a>
                  <?php if($verified_admin):?>
                  <a title="Go to view deleted data" class="btn btn-danger" href="<?=site_url('admin/logout_admin');?>">
                     Logout <i class=" fa fa-sign-out"></i>
                  </a>
                  <?php else: ?>
                  <a title="Go to view deleted data" class="btn btn-success"
                     href="<?=site_url('admin/verify_admin');?>">
                     Login <i class=" fa fa-sign-in"></i>
                  </a>
                  <?php endif; ?>
               </div>
            </div>
            <div class="card-body">
               <h2 class="text-center bg-success text-light py-2">List of Students</h2>
               <div class="table-responsive">
                  <table class='table border table-striped'>
                     <thead>
                        <tr>
                           <th>Stu. Id</th>
                           <th>Stu. Name</th>
                           <th>Father</th>
                           <!-- <th>Mother</th>
                           <th>Gender</th> -->
                           <th>D.O.B.</th>
                           <!-- <th>Address</th>
                           <th>Mobile</th>
                           <th>Created_at</th>
                           <th>Updated_at</th> -->
                           <th>Result Status</th>
                           <th class="text-center" colspan="3">Action</th>
                        </tr>
                     </thead>
                     <?php if(!empty($rows)):
      
    foreach ($rows as $r) :
      ?>
                     <tr>
                        <td><?=$r["id"];?></td>
                        <td><?=$r["stu_name"];?></td>
                        <td><?=$r["father_name"];?></td>
                        <!-- <td><?=$r["mother_name"];?></td>
                        <td><?=$r["gender"];?></td> -->
                        <td><?=$r["dob"];?></td>
                        <!-- <td><?=$r["address"];?></td>
                        <td><?=$r["mobile"];?></td>
                        <td><?=$r["created_at"];?></td>
                        <td><?=$r["updated_at"];?></td> -->
                        <td class="text-center">

                           <!-- This is conditional link -->
                           <!-- if result uploaded -->
                           <?php if ($r['stu_id'] != null): ?>
                           <i class="fa fa-check text-success"></i>
                           <?php else: ?>
                           <!-- if result didn't upload -->
                           <i class="fa fa-times text-danger"></i>
                           <?php endif;?>

                           <!-- <?php
                                 if ($r['stu_id'] != null) {
                                    echo '<span class="btn btn-success">Uploaded</span>';
                                 } else {
                                    echo '<a class="btn btn-danger" href="'.site_url("admin/upload_result/".$r["id"]).'">Upload</a>';
                                 }
                              ?> -->
                        </td>
                        <td>
                           <div class="btn-group" style="width:200px">
                              <!-- This is conditional link -->
                              <!-- if result uploaded -->
                              <?php if ($r['stu_id'] != null): ?>
                              <a title="View Result with marksheet." class="btn btn-primary"  data-bs-toggle="tooltip" data-bs-placement="top"
                                 href="<?=site_url('admin/single_result/'.$r["id"])?>"><i class="fa fa-eye"></i></a>
                              <?php else: ?>
                              <!-- if result didn't upload -->
                              <a title="Upload result." class="btn btn-warning"  data-bs-toggle="tooltip" data-bs-placement="top"
                                 href="<?=site_url("admin/upload_result/".$r["id"])?>"><i class="fa fa-upload"></i></a>
                              <?php endif;?>

                              <a title="Edit & Update Student Details." class="btn btn-info"  data-bs-toggle="tooltip" data-bs-placement="top"
                                 href="<?=site_url('admin/edit_stu/'.$r["id"])?>"><i class="fa fa-user">&nbsp;</i><i class="fa fa-pencil"></i></a>
                              <a title="Edit & Update Result." class="btn btn-warning"  data-bs-toggle="tooltip" data-bs-placement="top"
                                 href="<?=site_url('admin/edit_result/'.$r["id"])?>"> <i class="fa fa-list">&nbsp;<i class="fa fa-pencil"></i></i></a>
                              <a title="Detele" class="btn btn-danger"  data-bs-toggle="tooltip" data-bs-placement="top"
                                 onclick="return confirm('Are you confirm to delete <?=$r["stu_name"];?> ?');"
                                 href="<?=site_url('admin/del_stu/'.$r["id"])?>"><i class="fa fa-trash"></i></a>
                           </div>
                        </td>
                     </tr>
                     <?php
    
                  endforeach;
               
                     endif;
                     ?>

                  </table>
               </div>

            </div>
         </div>
      </div>
   </div>

   <!-- Optional JavaScript; choose one of the two! -->

   <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
   </script>

   <!-- Option 2: Separate Popper and Bootstrap JS -->
   <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->

    <script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
});
    </script>
</body>

</html>