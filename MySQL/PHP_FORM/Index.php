<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP FORM</title>
    <!-- bootstrao cdn  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- style.css  -->
    <link rel="stylesheet" href="style.css">


</head>
<body>
    
            <section class=" mt-5">
             <div class="container">
                 <div class="row">
                   <div class="heading-container_ADD">
                    <h1 class="update-heading">Add Information</h1>
                     </div>


                    <div class="form_row">
                
                    <!-- This is Image Section  -->
                        <div class="col-lg-7 col-md-6 col-12">
                        <div class="b2b_left_block">
                        <img src="image/form-img" class="img-fluid b2b-img" alt="B2B-image">
                        <h1 class="b2b-title">
                        Share your important information
                        </h1>
                        <p class="common-paragraph">to accelerate the speed of your digital expansion.</p>
                        </div>
                        </div>





          <!-- this IS Form section  -->
            <div class="col-lg-5">

            <form class="B2B_form" action="Save.php" method="POST">
                

             <div class="mb-3">
            <label class="form-label required">Full Name</label>
            <input type="text" class="form-control input_text" name="Full_Name" placeholder="Enter Name" id="full_name">
            </div>

              

            <div class="mb-3">
            <label for="contact_no" class="form-label required">Contact No.</label>
            <div class="input-group">
            <span class="input-group-text" id="basic-addon1">+91</span>
            <input type="text" class="form-control" name="Contact_No" id="contact_no" placeholder="00000-00000" autocomplete="off">
            </div>
            </div>


            <div class="mb-3">
            <label for="InputEmail" class="form-label required">Mail ID</label>
            <input type="email" name="Email" class="form-control" id="InputEmail" placeholder="Enter Email" aria-describedby="email" autocomplete="off">
            </div>


            <div class="mb-3">
            <label for="dealer_name" class="form-label required">Gender</label>
            <div class="gender-option">
                   <div class="form-check">
                <input type="radio" name="Gender" class="form-check-input" value="male" id="male">
                <label for="male" class="form-check-label">Male</label>
            </div>
            <div class="form-check">
                <input type="radio" name="Gender" class="form-check-input" value="female" id="female">
                <label for="female" class="form-check-label">Female</label>
            </div>
             <div class="form-check">
                <input type="radio" name="Gender" class="form-check-input" value="other" id="other">
                <label for="other" class="form-check-label">Other</label>
            </div>
            </div>

        
      


            <div class="mb-3">
            <label for="city" class="form-label required">City</label>
            <select name="City" class="form-select">
            <option value="">Select City</option>
            <option value="Mumbai">Mumbai</option>
            <option value="Delhi">Delhi</option>
            <option value="Kolkata">Kolkata</option>
            <option value="Chennai">Chennai</option>
            </select>
            </div>


            <div class="mb-3">
            <label for="address" class="form-label required"> Address</label>
            <input type="text" name="Address" id="dealer_address" class="form-control input_address" placeholder="Enter Address" autocomplete="off">
            </div>


            <div class="B2B_sub_btn">
            <button type="submit" name="submit" class="mt-2 common-button">
            Submit
            </button>
            </div>
            </form>
            </div>
            </div>
            </div>
            </section>






            
<!-- Bootstrap script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
