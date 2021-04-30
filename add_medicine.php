<?php
require_once 'views/header.php';
require_once 'Models/Medicine.php';
$obj_m = new Medicine();
$medicines = $obj_m->get_medicines();
?>
    <div class="container">
        <h3 class="text-center">Add Medicine</h3>
        <div class="card">
            <form method="post" action="process/add_medicine.php">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Medicine Name</label>
                                <input type="text" name="name" placeholder="Name of Medicine" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Formula/Ingredients</label>
                                <input type="text" name="formula" placeholder="Formula/Ingredients"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Company</label>
                                <input type="text" name="company" placeholder="Company" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Price <small>&euro;</small></label>
                                <input type="number" step="0.1" name="price" placeholder="50.0" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
<?php
require_once 'views/footer.php';
?>