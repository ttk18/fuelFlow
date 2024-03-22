<?php 
session_start();
 include '../assets/constant/config.php';
// Author Name: Mayuri K. 
//  for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com -->  
 
 try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }
        catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
        }
?>
<?php include('include/sidebar.php');?>
                    <!-- Top Bar End -->
<?php include('include/header.php');?>
                    <div class="page-content-wrapper ">

                        <div class="container-fluid">

                            <div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->
                                <div class="col-sm-12">
                                    <div class="page-title-box">
                                        <div class="btn-group float-right">
                                          
                                         
                                        </div>
                                        <h4 class="page-title">Edit Profile</h4>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- end page title end breadcrumb -->
    <div class="row">
        <!-- // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com  -->
        <div class="col-lg-12">
            <div class="card">
            <div class="card-body">

                    <div class="tab-content">

                        <div class="tab-pane active p-3" id="home" role="tabpanel">
                    <form name="myform"class="row" method="POST"  >

                         <div class="form-group col-md-6">
                         <label class="control-label">Full Name<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="heading" required="">
                        </div>

                        <div class="form-group col-md-6">
                        <label class="control-label">Age<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="heading" required="">    
                        </div>

                         <div class="form-group col-md-6">
                                <label class="control-label">Nationality<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="heading" required="">      
                         </div>

                         <div class="form-group col-md-6">
                                <label class="control-label">Languages<span class="text-danger">*</span></label>
                                 <select id="" name="" class="form-control">
    <option value="english">English</option>
    <option value="hindi">Hindi</option>
    <option value="marathi">Marathi</option>
    <option value="tamil">Tamil</option>
  </select>
                         </div>

                          <div class="form-group col-md-6">
                                <label class="control-label">Experience<span class="text-danger">*</span></label>
                                <input  class="form-control" type="text" name="">
                        </div>

                   

                          <div class="form-group col-md-6">
                             <label class="control-label">Availability</label>
                                <input class="form-control" type="datetime-local" name="metatitle">
                        </div>

                         <div class="form-group col-md-6">
                                <label class="control-label">Hourly Rate</label>
                                <input class="form-control" type="text" name="metadescription">
                        </div>

                         <div class="form-group col-md-6">
                                <label class="control-label">Services Offered</label><br>
                                <input class="" type="radio" id="" name="fav_language" value="">
                                <label for="html">Yes</label><br>
                                <input type="radio" id="" name="fav_language" value="">
                                <label for="css">No</label><br>
                        </div>

                         <div class="form-group col-md-6">
                                <label class="control-label">Location</label>
                                <input class="form-control" type="text" name="">
                        </div>
                        
                        <div class="form-group col-md-12">
                         
                                <button class="btn btn-primary" type="submit" name="submit" onclick="addService()">Submit</button>
                           
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

<?php include('include/footer.php');?>
<!--      // Author Name: Mayuri K. 
// for any PHP, Codeignitor, Laravel OR Python work contact me at mayuri.infospace@gmail.com  
// Visit website : www.mayurik.com
 -->


<script>
    function validation() {
        var fileInput = document.getElementById('add_service').photo;
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

        if (!allowedExtensions.exec(filePath)) {
            alert('Invalid file type! Please upload a JPG, JPEG, or PNG image.');
            fileInput.value = '';
            return false;
        }
        return true;
    }
</script> 
<script>
    function validation() {
        var fileInput = document.getElementById('add_service').banner;
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;

        if (!allowedExtensions.exec(filePath)) {
            alert('Invalid file type! Please upload a JPG, JPEG, or PNG image.');
            fileInput.value = '';
            return false;
        }
        return true;
    }
</script> 
<script type="text/javascript">
  function addService(){
     jQuery.validator.addMethod("alphanumeric", function (value, element) {
    return this.optional(element) || /^(?=.*[a-zA-Z])[a-zA-Z0-9\s!@#$%^&*()_-]+$/.test(value);
  }, "Please enter alphabet characters only");
     
      jQuery.validator.addMethod("lettersonly", function(value, element) {
  // Check if the value is empty
  if (value.trim() === "") {
    return false;
  }
  return /^[a-zA-Z\s]*$/.test(value);
}, "Please enter alphabet characters only");
  $('#add_service').validate({
      rules: {
        heading: {
          required: true,
          lettersonly: true
        },
        
        shortcontent: {
          required: true
        },
        content: {
          required: true
        },
        metatitle: {
          required: true
        },
         metadescription: {
          required: true
        },
         keywords: {
          required: true
         },
          robots: {
          required: true
         } 
      },
      messages: {
        heading: {
          required: "Please enter a heading",
          pattern: "Only alphanumeric characters and spaces are allowed"
        },
       
        shortcontent: {
          required: "Please enter a short content",
          pattern: "Only alphanumeric characters and spaces are allowed"
        },
        content: {
          required: "Please enter a content",
          pattern: "Only alphanumeric characters and spaces are allowed"
        },
        metatitle: {
          required: "Please enter a metatitle",
        },
        metadescription: {
          required: "Please enter a metadescription",
         },
          keywords: {
          required: "Please enter a keywords",
         },
          robots: {
          required: "Please enter a robots",
         }
        }
  });
};
</script>