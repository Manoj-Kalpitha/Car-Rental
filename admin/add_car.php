<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    

    <section class="container my-5">
        <div class="row justify-content-center">
           <div class="col-md-6">
              <form action="" method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow-sm">
                 <h3 class="text-center mb-4 text-muted">Add New Car</h3>
                 <div class="mb-3">
                    <input type="text" class="form-control" required placeholder="Name" name="name" autocomplete="off">
                 </div>
                 <div class="mb-3">
                    <input type="number" min="0" class="form-control" required placeholder="Price (Rs.)" name="price" autocomplete="off">
                 </div>
                 <div class="mb-3">
                    <select name="category_id" class="form-select" required>
                       <option value="">Select Category</option>
                       <?php
                      
                          $select_categories = mysqli_query($conn, "SELECT * FROM categories") or die('query failed');
                          while ($fetch_categories = mysqli_fetch_assoc($select_categories)) {
                             echo '<option value="' . $fetch_categories['category_id'] . '">' . $fetch_categories['name'] . '</option>';
                          }
                       ?>
                    </select>
                 </div>
                 <div class="mb-3">
                    <input type="file" accept="image/jpg, image/jpeg, image/png, image/webp" required class="form-control" name="image" autocomplete="off">
                 </div>
                 <div class="mb-3">
                    <input type="file" accept="image/jpg, image/jpeg, image/png, image/webp" required class="form-control" name="image" autocomplete="off">
                 </div>
                 <div class="mb-3">
                    <input type="file" accept="image/jpg, image/jpeg, image/png, image/webp" required class="form-control" name="image" autocomplete="off">
                 </div>
                 <div class="mb-3">
                    <input type="file" accept="image/jpg, image/jpeg, image/png, image/webp" required class="form-control" name="image" autocomplete="off">
                 </div>
                 <div class="mb-3">
                    <input type="text" class="form-control" required placeholder="Description" name="details" autocomplete="off">
                 </div>
                 <div class="text-center">
                    <input type="submit" value="Add Product" name="add_product" class="btn button w-50">
                 </div>
              </form>
           </div>
        </div>
     </section>







</body>
</html>