<?php include('header.php'); ?>

<div class="container mt-5">
<div class="row justify-content">
    <div class="col-md-8">
        
    <form actiom="" method="GET">
    <div class="input-group mb-3">
    <input type="text" class="form-control" value="<?php if(isset($GET['search'])) {
        echo $_GET['search'];}
    
    ?>" name="search" class="form-control" placeholder="Search">
    <button type="submit" class="btn btn-primary">Search</button>
</div>
</form>
        <div class="card">
            <div class="card-header"><h4>Search Data</h4>
        </div>

            <div class="card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <b><th>#</th></b>
                            <b><th>REGIONS</th></b>
                            <b><th>PROVINCE</th></b>
                            <b><th>RTOM_CODE</th></b>
                            <b><th>SO_ORDT_TYPE</th></b>
                            <b><th>SERVICE_TYPE</th></b>
                            <b><th>SO_STATUS</th></b>
                            <b><th>SALES_CHANNEL</th></b>
                            <b><th>SALES_PERSON</th></b>
                            <b><th>BB_PACKAGE</th></b>
                            <b><th>IMEI_NO</th></b>
                           
                        
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                        if(isset($_GET['search'])) {

                            $conn = mysqli_connect("localhost","root","","excelread");
                            $filtervalue = $_GET['search'];
                            $filterdata = "SELECT * FROM tb_data WHERE CONCAT (regions, province, rtom_code, so_ordt_type, service_type, so_status, sales_channel, 
                            sales_person, bb_package, imei_no) LIKE '%$filtervalue%'";
                            $filterdata_run = mysqli_query($conn, $filterdata);

                            if(mysqli_num_rows($filterdata_run) > 0) {
                               foreach($filterdata_run as $row) 
                               {
                                ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['regions']; ?></td>
                                        <td><?php echo $row['province']; ?></td>
                                        <td><?php echo $row['rtom_code']; ?></td>
                                        <td><?php echo $row['so_ordt_type']; ?></td>
                                        <td><?php echo $row['service_type']; ?></td>
                                        <td><?php echo $row['so_status']; ?></td>
                                        <td><?php echo $row['sales_channel']; ?></td>
                                        <td><?php echo $row['sales_person']; ?></td>
                                        <td><?php echo $row['bb_package']; ?></td>
                                        <td><?php echo $row['imei_no']; ?></td>
                                    
                                    </tr>
                                <?php
                               }
                          
                            }
                            else
                         {
                            ?>
                            <tr>
                                <td colspan="4">No Record Found</td>
                            </tr>
                        <?php
                         }
                        }

                        
                        
                        ?>
                    </tbody>
                    
            </div>
        </div>
    </div>
    
</div>
</div>

<?php include('footer.php');?>