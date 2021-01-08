<?php
include_once 'dbconnect.php';

// fetch files
$sql = "select id, filename from files";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload View & Download file in PHP and MySQL | Demo</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" type="text/css" />
</head>
<body>
<br/>
<div class="container">
    <div class="col-xs-8 col-xs-offset-2 well">
        <div class="col-xs-8 col-xs-offset-2 well">
        <form action="uploads.php" method="post" enctype="multipart/form-data">
            <legend>Select File to Upload:</legend>
            <div class="col-xs-8 col-xs-offset-2 well">
                <input type="file" name="file1" />
            </div></br>
            <div class="col-xs-8 col-xs-offset-2 well">
                <input type="submit" name="submit" value="Upload" class="btn btn-primary"/>
            </div></br>
            <?php if(isset($_GET['st'])) { ?>
                <div class="alert alert-danger text-center">
                <?php if ($_GET['st'] == 'success') {
                        echo "File Uploaded Successfully!";
                    }
                    else
                    {
                        echo 'Invalid File Extension!';
                    } ?>
                </div>
            <?php } ?>
        </form>
        </div>
        <!-- <form action="delete.php" method="post"> -->
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Sl.No</th>
                        <th>File Name</th>
                        <!-- <th>View</th> -->
                        <th>View / Download</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['filename']; ?></td>
                    <!-- <td><a href="uploads/<?php echo $row['filename']; ?>" target="_blank">View</a></td> -->
                    <td><a href="uploads/<?php echo $row['filename']; ?>" download>Download</td>
                    <td> <a href="delete.php?id=<?php echo $row['id']; ?>"> Delete </a>  </button> </td> 
                </tr>
                <?php } ?>
                </tbody>
            </table>
            <!-- </form> -->
        </div>
    </div>
</div>
</body>
</html>