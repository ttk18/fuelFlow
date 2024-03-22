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
            <h5><?php echo $lang['report_page']['order_report_page']['datewise_sales_report_management'] ?></h5>
        </div>

        <div class="col-md-7  align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)"><?php echo $lang['report_page']['order_report_page']['home'] ?></a></li>
                <li class="breadcrumb-item active"><?php echo $lang['report_page']['order_report_page']['sales_report'] ?></li>
            </ol>
        </div>
    </div>



    <div class="container-fluid">
        <div class="row">
        <!-- // Author Name: Mayuri K.
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com
// Visit website : www.mayurik.com  -->
            <div class="col-lg-8" style="margin-left: 10%;">
                <div class="card">
                    <div class="card-body">

                        <div class="tab-content">

                            <div class="tab-pane active p-3" id="home" role="tabpanel">
                                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                                    <div class="form-group">
                                        <div class="row">
        <!-- // Author Name: Mayuri K.
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com
// Visit website : www.mayurik.com  -->
                                            <label class="col-sm-3 control-label"><?php echo $lang['report_page']['order_report_page']['start_date'] ?></label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control " name="fromdate" required value="<?php echo $fromdate; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="row">
        <!-- // Author Name: Mayuri K.
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com
// Visit website : www.mayurik.com  -->
                                            <label class="col-sm-3 control-label"><?php echo $lang['report_page']['order_report_page']['end_date'] ?></label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control " name="todate" required value="<?php echo $todate; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <center>

                                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                            <label for="validationCustomUsername"></label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                </div>

                                                <button class="btn btn-primary" type="submit" name="search"><?php echo $lang['report_page']['order_report_page']['search'] ?></button>
                                            </div>
                                        </div>
                                    </center>
                                </form>
                            </div>
                        </div>

                    </div>
                </div><!--end card-->
            </div><!--end col-->
        </div><!--end row-->
    </div> <!-- Page content Wrapper -->
</div> <!-- content -->


<div class="row">
        <!-- // Author Name: Mayuri K.
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com
// Visit website : www.mayurik.com  -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">

                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;" enctype="multipart/form-data">
                        <thead>
                            <tr>
                                <th><?php echo $lang['report_page']['order_report_page']['serial'] ?></th>
                                <th><?php echo $lang['report_page']['order_report_page']['customer_name'] ?></th>
                                <th><?php echo $lang['report_page']['order_report_page']['customer_no'] ?></th>
                                <th><?php echo $lang['report_page']['order_report_page']['address'] ?></th>
                                <th><?php echo $lang['report_page']['order_report_page']['email'] ?></th>
                                <th><?php echo $lang['report_page']['order_report_page']['gst'] ?></th>
                                <th><?php echo $lang['report_page']['order_report_page']['discount'] ?></th>
                                <th><?php echo $lang['report_page']['order_report_page']['subtotal'] ?></th>
                                <th><?php echo $lang['report_page']['order_report_page']['final_total'] ?> </th>
                                <th><?php echo $lang['report_page']['order_report_page']['created_date'] ?> </th>
                                <th><?php echo $lang['report_page']['order_report_page']['action'] ?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (isset($_POST['search'])) {
                                $stmt = $conn->prepare("SELECT * FROM `tbl_invoice` WHERE delete_status='0' AND created_date BETWEEN ? AND ?");
                                $stmt->execute([$_POST['fromdate'], $_POST['todate']]);
                                $record = $stmt->fetchAll();
                                $i = 1;
                                foreach ($record as $key) { ?>


                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td> <?php
                                                $stmt2 = $conn->prepare("SELECT * FROM `customer` WHERE delete_status='0' AND id=? ");
                                                $stmt2->execute([$key['customer_id']]);
                                                $record2 = $stmt2->fetch();
                                                echo $record2['brandName'];
                                                ?></td>
                                        <td><?php echo $key['customerPhone']; ?></td>
                                        <td><?php echo $key['customerAddress']; ?></td>
                                        <td><?php echo $key['customerEmail']; ?></td>
                                        <td><?php echo $key['gst_rate']; ?></td>
                                        <td><?php echo $key['discount']; ?></td>
                                        <td><?php echo $key['subtotal']; ?></td>
                                        <td><?php echo $key['final_total']; ?></td>
                                        <td><?php echo $key['created_date']; ?></td>
                                        <td>
                                            <center><a href='#' onclick="editForm(event, <?php echo $key['id'] ?>, 'print.php')" class="btn btn-info"><i class="fas fa-print"></i></a>
                                                <a href='#' onclick="editForm(event, <?php echo $key['id'] ?>, 'invoice.php')" class="btn btn-warning"><i class="fas fa-print"></i></a>
                                            </center>
                                        </td>

                                    </tr> <?php
                                            $i++;
                                        }
                                    } ?>

                        </tbody>
                        </tbody>

                    </table>






                </div><!--end /tableresponsive-->
            </div><!--end card-body-->
        </div><!--end card-->
    </div><!--end col-->


</div><!--end row-->

<?php include('include/footer.php'); ?>
