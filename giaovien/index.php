<?php
include '../index/header.php';

include 'check_login_gv.php';
?>
<nav class="navbar navbar-expand-lg navbar-light bg-danger">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php"><i class="far fa-calendar-alt me-1"></i>Môn học</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="../index/logout.php"><i class="fas fa-sign-out-alt me-1"></i>Đăng xuất</a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<div class="main-content bg-light" style="height: 500px;">
    <div class="container">
    <h3 class="text-center py-4">Môn được phân công</h3>
    
    <table class="table">
        <thead class = "bg-primary">
        <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên học phần</th>
            <th scope="col">Tổng sinh viên</th>
            <th scope="col">Số sinh viên</th>
            <th scope="col">Tên phòng</th>
            <th scope="col">Tuần học</th>
            <th scope="col">Giờ học</th>
            <th scope="col">Danh sach Sv</th>   
        </tr>
        </thead>
        <?php
        $gv_id = $_SESSION['giao_vien'];
        $sql = "SELECT * FROM dang_ki_tin_chi WHERE gv_id='$gv_id'";
        $res = mysqli_query($conn,$sql);
        if(mysqli_num_rows($res)>0){
           $i = 1;
            while($row=mysqli_fetch_assoc($res)){
                echo '<tbody>';
                echo '<tr>';
                echo '<td>'.$i++.'</td>';
                
                echo '<td>'.$row['lop_ten_hoc_phan'].'</td>';
                echo '<td>'.$row['lop_max_sv'].'</td>';
                echo '<td>'.$row['lop_current_sv'].'</td>';
                echo '<td>'.$row['lop_ten_phong'].'</td>';
                echo '<td>'.$row['lop_tuan_hoc'].'</td>'; 
                echo '<td>'.$row['lop_gio_hoc'].'</td>';
                echo '<td><a href ="getSv.php?lop_id='.$row['lop_id'].'" class = "text-primary"><i class="fas fa-list"></i></a></td>'; 
                
                echo '</tr>';
                echo '</tbody>';
              
            }
        }
        ?>


        
    </table>
    
</div>
</div>

<?php
include '../index/footer.php';
?>
<div class="end"></div>
