<?php
include 'config.php';
session_start();

if (empty($_SESSION['sadmin_username'])) {
    header('Location: login.php ');
}

// how many rows to show per page
$rowPerPage = 5;

// by default, we show the first page
$pageNum = 1;

// if $_GET['page'] defined, use it as the page number
if (isset($_GET['page'])) {
    $pageNum = $_GET['page'];
}

// counting the offset
$offset = ($pageNum - 1) * $rowPerPage;
$query = "SELECT * FROM pengunjung ORDER BY id DESC LIMIT $offset, $rowPerPage";
$result = mysqli_query($conn, $query) or die('Error, query failed');

// jumlah total
$query1 = "SELECT COUNT(id) AS numrows FROM pengunjung";
$result1 = mysqli_query($conn, $query1) or die ('Error, query failed');
$row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
$numrows = $row1['numrows'];
echo "Total Number Guestbook : $numrows";
?>
<p><h2 align="center">Daftar Buku Tamu</h2></p>
<table align="center">
    <tr>
        <td><a href="input_bukutamu.php">Isi Buku Tamu</a></td>
        <td> | </td>
        <td><a href="logout.php">Logout</a></td>
    </tr>
    <tr>
        <td></td>
    </tr>
</table>

<table width="90%" border="1" align="center" cellpadding="2" cellspacing="2" class="content">
    <tr valign="top" bgcolor="#FFDFAA">
        <td width="8%">
            <div align="center"><strong>No</strong></div>
        </td>
        <td width="56%">
            <div align="center"><strong>guestbook</strong></div>
        </td>
        <td width="9%"><strong>Delete</strong></td>
        <td width="9%">
            <div align="center"><strong>Update</strong></div>
        </td>
    </tr>

    <?php
    $no = 1;
   foreach ($result as $row) {
        echo "
        <tr>
        <td>" . $no . "</td>
        <td>Dari : " . $row['nama'] . "<br>" . $row['komentar'] . "</td>
        <td><a href='delete.php?id=$row[id]'>Delete</a></td>
        <td><a href='update.php?id=$row[id]'>Update</a></td>
        </tr>";
        $no++;
    }
    ?>
</table>

<?php
// how many rows we have in the database
$query = "SELECT COUNT(id) AS numrows FROM pengunjung";
$result = mysqli_query($conn, $query) or die('Error, query failed');
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$numrows = $row['numrows'];

// how many pages we have when using paging?
$maxPage = ceil($numrows / $rowPerPage);

// print the link to access each page
$self = $_SERVER["PHP_SELF"];
$nav = '';
for ($page = 1; $page <= $maxPage; $page++) {
    if ($page == $pageNum) {
        $nav .= " $page "; // no need to create a link to the current page
    } else {
        $nav .= " <a href=\"$self?page=$page\">$page</a> ";
    }
}

// creating previous and next links
// plus the links to go straight to
// the first and last page

if ($pageNum > 1) {
    $page = $pageNum - 1;
    $prev = " <a href=\"$self?page=$page\">[Prev]</a> ";

    $first = " <a href=\"$self?page=1\">[First Page]</a> ";
} else {
    $prev = '&nbsp;'; // we're on page one, don't print the previous link
    $first = '&nbsp;'; // near the first page link
}

if ($pageNum < $maxPage) {
    $page = $pageNum + 1;
    $next = " <a href=\"$self?page=$page\">[Next]</a> ";

    $last = " <a href=\"$self?page=$maxPage\">[Last Page]</a> ";
} else {
    $next = '&nbsp;'; // we're on the last page, don't print the next link
    $last = '&nbsp;'; // nor the last page link
}

// print the navigation links
echo "<center>$first " . " $prev " . " $nav " . " $next " . " $last</center>";
?>
<?php
mysqli_close($conn);
?>
