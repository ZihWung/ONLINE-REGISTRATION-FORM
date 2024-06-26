<?php
include('config.php');

if (isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $sql = "SELECT student.*, department.name AS department_name
            FROM student
            INNER JOIN department ON student.department_id = department.id
            WHERE student.id='$student_id'";
    $query = mysqli_query($con, $sql) or die(mysqli_error($con));
    $student = $query->fetch_assoc();
}
?>
<!doctype html>
<html>
<head>
    <title>Student Profile - <?php echo $student['first_name'] . " " . $student['last_name']; ?></title>
    <link rel="stylesheet" href="assets/css/style.css"/>
</head>
<body>
<?php include('includes/header.php') ?>
<div class="container">
    <div>
        <?php include('includes/left-sidebar.php') ?>
        <main class="student-info">
            <h1>Student Profile - <?php echo $student['first_name'] . " " . $student['last_name']; ?></h1>
            <table style="font-size: 20px;">
                <tr>
                    <td>ID:</td>
                    <td><?php echo $student['id']; ?></td>
                </tr>
                <tr>
                    <td>First Name:</td>
                    <td><?php echo $student['first_name']; ?></td>
                </tr>
                <tr>
                    <td>Last Name:</td>
                    <td><?php echo $student['last_name']; ?></td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><?php echo $student['date_of_birth']; ?></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td><?php echo $student['gender']; ?></td>
                </tr>
                <tr>
                    <td>Place of Birth:</td>
                    <td><?php echo $student['place_of_birth']; ?></td>
                </tr>
                <tr>
                    <td>Phone Number:</td>
                    <td><?php echo $student['phone_number']; ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $student['email']; ?></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><?php echo $student['address']; ?></td>
                </tr>
                <tr>
                    <td>Department:</td>
                    <td><?php echo $student['department_name']; ?></td>
                </tr>
                <tr>
                    <td>Level:</td>
                    <td><?php echo $student['level']; ?></td> <!-- Display Level -->
                </tr>
            </table>
        </main>
    </div>
</div>
<?php include('includes/footer.php') ?>

<script type="text/javascript">
    function PrintDiv() {
        var divToPrint = document.getElementById('divToPrint');
        var popupWin = window.open('', '_blank', 'width=300,height=300');
        popupWin.document.open();
        popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
</script>
</body>
</html>
