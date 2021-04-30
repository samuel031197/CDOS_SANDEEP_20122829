<?php
require_once 'views/header.php';
require_once 'Models/Medicine.php';
$obj_m = new Medicine();
$medicines = $obj_m->get_medicines();
?>
    <div class="container">
        <h3 class="text-center">All Medicines</h3>
        <table class="table table-bordered">
            <thead class="bg-dark text-white">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Formula</th>
                <th>Price</th>
                <th>Company</th>
                <th>Qr</th>
                <th>Operations</th>
            </tr>
            </thead>
            <tbody style="    vertical-align: middle;">

            <?php
            if (empty($medicines)){
                echo "
                <tr>
                <td colspan='8'>No Data Available</td>
                </tr>
                ";
            }
            foreach ($medicines as $medicine):
                $output = implode(', ', array_map(
                    function ($v, $k) {
                        if(is_array($v)){
                            return $k.'[]='.implode('&'.$k.'[]=', $v);
                        }else{
                            return $k.'='.$v;
                        }
                    },
                    $medicine,
                    array_keys($medicine)
                ));
            ?>
            <tr>
                <td><?php echo $medicine['id']?></td>
                <td><?php echo $medicine['medicine_name']?></td>
                <td><?php echo $medicine['formula']?></td>
                <td><?php echo $medicine['price']?></td>
                <td><?php echo $medicine['company_name']?></td>
                <td><img class="img-fluid" style="max-height: 200px" src="http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl=<?php  echo $output ?>&chld=H|0
" alt=""></td>
                <td>
                    <a data-bs-toggle="modal" data-bs-target="#Modal<?php echo $medicine['id']?>" class="btn btn-warning">Edit/View</a>
                    <a href="process/delete_medicine.php?id=<?php echo $medicine['id']?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
                <!-- Modal -->
                <div class="modal fade" id="Modal<?php echo $medicine['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit <small><?php echo $medicine['medicine_name']?></small></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="post" action="process/update_medicine.php">
                            <div class="modal-body">
                                <input type="hidden" name="id" value="<?php echo $medicine['id']?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Medicine Name</label>
                                                    <input type="text" value="<?php echo $medicine['medicine_name']?>" name="name" placeholder="Name of Medicine" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Formula/Ingredients</label>
                                                    <input type="text" name="formula" value="<?php echo $medicine['formula']?>" placeholder="Formula/Ingredients"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Company</label>
                                                    <input type="text" name="company" value="<?php echo $medicine['company_name']?>" placeholder="Company" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Price <small>&euro;</small></label>
                                                    <input type="number" value="<?php echo $medicine['price']?>" step="0.1" name="price" placeholder="50.0" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Description</label>
                                                    <textarea name="description" id="" class="form-control"><?php echo $medicine['description']?></textarea>
                                                </div>
                                            </div>
                                        </div>

                            </div>
                            <div class="modal-footer">
                                <button type="reset" data-bs-dismiss="modal" class="btn btn-secondary">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
      <?php
      endforeach;
      ?>
            </tbody>
        </table>
    </div>
<?php
require_once 'views/footer.php';
?>
