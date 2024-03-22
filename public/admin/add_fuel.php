<?php
session_start();
include '../assets/constant/config.php';
// Author Name: Mayuri K.
//  for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com
// Visit website : www.mayurik.com -->

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
<?php include('include/sidebar.php'); ?>
<!-- Top Bar End -->
<?php include('include/header.php'); ?>
<div class="page-content-wrapper ">



  <div class="row tittle">

    <div class="top col-md-5 align-self-center">
      <h5><?php echo $lang['fuel_page']['add_fuel_page']['add_fuel'] ?></h5>
    </div>

    <div class="col-md-7  align-self-center">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo $lang['fuel_page']['add_fuel_page']['home'] ?></a></li>
        <li class="breadcrumb-item active"><?php echo $lang['fuel_page']['add_fuel_page']['add_fuel'] ?></li>
      </ol>
    </div>
  </div>



  <div class="container-fluid">
    <div class="row">
        <!-- // Author Name: Mayuri K.
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com
// Visit website : www.mayurik.com  -->
      <div class="col-lg-10" style="margin-left: 10%;">
        <div class="card">
          <div class="card-body">

            <div class="tab-content">

              <div class="tab-pane active p-3" id="home" role="tabpanel">
                <form name="myform" method="POST" class="row" id="add_fuel" action="app/fuel_crud.php">

                  <div class="form-group col-md-6">
                    <label class="control-label"><?php echo $lang['fuel_page']['add_fuel_page']['fuel_name'] ?></label>
                    <input type="text" class="form-control" id="fuelName" name="fuelName">
                  </div>
                  <div class="form-group col-md-6">
                    <label class="control-label"><?php echo $lang['fuel_page']['add_fuel_page']['number_of_liters'] ?></label>
                    <input type="text" class="form-control" id="openning_stock" name="openning_stock">
                  </div>

                  <div class="form-group col-md-6">
                    <label class="control-label"><?php echo $lang['fuel_page']['add_fuel_page']['rate'] ?></label>
                    <input type="text" class="form-control" id="rate" name="rate">
                  </div>

                  <div class="form-group col-md-6">
                    <label class="control-label"><?php echo $lang['fuel_page']['add_fuel_page']['unit_price'] ?></label>
                    <input type="text" class="form-control" id="unit_price" name="unit_price">
                  </div>

                  <div class="form-group col-md-6">
                    <label class="control-label"><?php echo $lang['fuel_page']['add_fuel_page']['batch_no'] ?></label>
                    <input type="text" class="form-control" id="bno" name="bno">
                  </div>

                  <div class="form-group col-md-6">
                    <label class="control-label"><?php echo $lang['fuel_page']['add_fuel_page']['expiry_date'] ?></label>
                    <input type="date" class="form-control" id="expdate" name="expdate">
                  </div>

                  <!-- <div class="form-group col-md-6">
                    <label class="control-label">Formula</label>
                    <select class="form-control" id="formula" name="formula">
                      <option value="">~~SELECT~~</option>
                      <option value="1">Available</option>
                      <option value="2">Not Available</option>
                    </select>
                  </div> -->

                  <div class="form-group col-md-6">
                    <label class="control-label"><?php echo $lang['fuel_page']['add_fuel_page']['supplier_name'] ?></label>
                    <select class="form-control" id="supplierName" name="supplierName">
                      <option value="">~~<?php echo $lang['fuel_page']['add_fuel_page']['select'] ?>~~</option>
                      <?php
                      $stmt = $conn->prepare("SELECT * FROM `supplier` WHERE delete_status='0' ");
                      $stmt->execute();
                      $record = $stmt->fetchAll();
                      foreach ($record as $key) {
                      ?>
                        <option value="<?php echo $key['id'] ?>"><?php echo $key['brandName'] ?></option>
                      <?php } ?>
                    </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label class="control-label"><?php echo $lang['fuel_page']['add_fuel_page']['category_name'] ?></label>
                    <select class="form-control" id="categoryName" name="categoryName">
                      <option value="">~~<?php echo $lang['fuel_page']['add_fuel_page']['select'] ?>~~</option>
                      <?php
                      $stmt = $conn->prepare("SELECT * FROM `fuel_category` WHERE delete_status='0' ");
                      $stmt->execute();
                      $record = $stmt->fetchAll();
                      foreach ($record as $key) {
                      ?>
                        <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                      <?php } ?>
                    </select>
                  </div>



                  <div class="form-group col-md-6 col-md-12">
                    <button class="btn btn-primary" type="submit" onclick="addFuel()" name="submit"><?php echo $lang['fuel_page']['add_fuel_page']['submit'] ?></button>
                  </div>


                </form>
              </div>




            </div>

          </div>
        </div><!--end card-->
      </div><!--end col-->
    </div><!--end row-->
  </div> <!-- Page content Wrapper -->
</div> <!-- content -->

<?php include('include/footer.php'); ?>

<script>
  function addFuel() {
    jQuery.validator.addMethod("alphanumeric", function(value, element) {
      // Check if the value is empty
      if (value.trim() === "") {
        return false;
      }
      // Check if the value contains at least one alphabet character
      if (!/[a-zA-Z]/.test(value)) {
        return false;
      }
      // Check if the value contains only alphanumeric characters, spaces, and allowed special characters
      return /^[a-zA-Z0-9\s!@#$%^&*()_-]+$/.test(value);
    }, "Please enter alphanumeric characters with at least one alphabet character.");

    jQuery.validator.addMethod("noDigits", function(value, element) {
      return this.optional(element) || !/\d/.test(value);
    }, "Please enter a value without digits.");

    jQuery.validator.addMethod("noSpacesOnly", function(value, element) {
      // Check if the input contains only spaces
      return value.trim() !== '';
    }, "Please enter a non-empty value");

    $('#add_fuel').validate({
      rules: {
        fuelName: {
          required: true,
          noSpacesOnly: true,
          alphanumeric: true,
          noDigits: true
        },
        openning_stock: {
          required: true,
          number: true,
          noSpacesOnly: true,
        },
        rate: {
          required: true,
          number: true,
          noSpacesOnly: true,
        },
        unit_price: {
          required: true,
          number: true,
          noSpacesOnly: true,
        },
        bno: {
          required: true,
          noSpacesOnly: true,
        },
        expdate: {
          required: true,
          noSpacesOnly: true,
        },
        formula: {
          required: true,
          noSpacesOnly: true,
        },
        supplierName: {
          required: true,
          noSpacesOnly: true,
        },
        categoryName: {
          required: true,
          noSpacesOnly: true,
        }
      },
      messages: {
        fuelName: {
          required: "Please enter a fuel name.",
          alphanumeric: "Only alphanumeric characters are allowed.",
          noDigits: "Fuel name should not contain digits"
        },
        openning_stock: {
          required: "Please enter number of liters.",
          noDigits: "Number of liters should not contain digits"
        },
        rate: {
          required: "Please enter rate.",
          noDigits: "Rate should not contain digits"
        },
        unit_price: {
          required: "Please enter unit_price.",
          noDigits: "unit_price should not contain digits"
        },
        bno: {
          required: "Please enter batch number.",
          noDigits: "Batch number should not contain digits"
        },
        expdate: {
          required: "Please enter expiry date."
        },
        formula: {
          required: "Please select a formula."
        },
        supplierName: {
          required: "Please select a supplier."
        },
        categoryName: {
          required: "Please select a category."
        }
      }
    });
  }
</script>
