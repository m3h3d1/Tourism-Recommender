<html>

<head>
    <title>Search Place</title>
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popper.min.js"></script>
    <style>
        .box4{background: burlywood;}
        .design{background: darkgrey;}
    </style>
</head>

<body>
    
        <div class="row">
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-center text-danger"><b>Search Place</b></h4>
                    </div>
                    <div class=" box4">
                    <div class="row">
                        <div class="col-md-6">
                            <form action=" " method="post">
                                <div class="form-group">
                                    <input type="text" name="get_place" placeholder="Enter division" class="form-control" style="margin-left:390px;margin-top:40px" required>

                                </div>
                                <button type="submit" name="search_by_division" class="btn btn-primary text-center" style="margin-left:690px;margin-top:40px">Search</button>
                            </form>
                        </div>
                    </div>
                  
               

                    <?php

                    $hostname = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "travelrecommend";


                    $connect = mysqli_connect("localhost", "root", "", "travelrecommend");

                    if (isset($_POST['search_by_division'])) {
                        $division = $_POST['get_place'];
                        $query = "SELECT * FROM places  WHERE division='$division' ";
                        // $query="SELECT COUNT(*) as count FROM roombook where  roomtype='$roomtype'";
                        $query_run = mysqli_query($connect, $query);




                    ?>
                        <div class="table-responsive design">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>

                                        <th scope="col">Place_name</th>
                                        </th>
                                        <th scope="col">division</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Picture</th>



                                    </tr>
                                </thead>
                                <tbody><?php
                                        if (mysqli_num_rows($query_run) > 0) {
                                            while ($row = mysqli_fetch_array($query_run)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $row['place_name']; ?></td>

                                                <td><?php echo $row['division']; ?></td>
                                                <td><?php echo $row['description']; ?></td>

                                                <td><img width="300px" src="upload/<?php echo $row['image']; ?>"></td>


                                            </tr>
                                        <?php
                                            }
                                        } else { ?>
                                        <tr>
                                            <td colspan="6">No Data Available</td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>