<?php require '../help/connect.php';

$idphylum0=$_POST['namephylum0'];
$idphylum1=$_POST['namephylum1'];
$idphylum2=$_POST['namephylum2'];



$sql = "UPDATE phylum SET 
phylum_eng='$idphylum1',
phylum_thai='$idphylum2'
WHERE phylum_id='$idphylum0'";


$result=mysqli_query($connection,$sql);
if($result) {
    echo "<script>alert('แก้ไขแล้ว');</script>";
    echo "<script>window.location='phylum_show.php'</script>";
}
else{
    echo "<script>alert('แก้ไขไม่ได้');</script>";
}

mysqli_close($connection); ?>