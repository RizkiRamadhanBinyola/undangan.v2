<?php
    include 'config.php';
    $page = (isset($_POST['page']))? $_POST['page'] : 1;
    $limit = 5; 
    $limit_start = ($page - 1) * $limit;
    $no = $limit_start + 1;


    $query = "SELECT * FROM msg ORDER BY id DESC LIMIT $limit_start, $limit";
    $dewan1 = $conn->prepare($query);
    $dewan1->execute();
    $res1 = $dewan1->get_result();
    while ($row = $res1->fetch_assoc()) {
?>


    <div class="col m-3">
      <div class="card h-100" style="width: 100%;">
        <div class="card-body">
          <span style="font-size: 14px; text-transform: uppercase; letter-spacing: 2px; font-weight: 700; display: block;"><?= $row['name'] ?> Di <span style="color: #F14E95; font-weight: 300;"><?= $row['asal'];?></span></span>
          <small style="font-size: .8em;"><?= $row['date'] ?></small>
          <br>
          <span class="card-text" style="font-style: italic; color: #8f989f; font-size: 20px; line-height: 1.6em;">"<?= $row['msg']; ?>" - <br> <small style="font-size: .8em;"><span class="badge text-bg-secondary">✔ <?= $row['present'] ?></span></small></span>

        </div>
      </div>
    </div>

    <?php }?>

    <?php
      $query_jumlah = "SELECT count(*) AS jumlah FROM msg";
      $dewan1 = $conn->prepare($query_jumlah);
      $dewan1->execute();
      $res1 = $dewan1->get_result();
      $row = $res1->fetch_assoc();
      $total_records = $row['jumlah'];
    ?>
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          <?php
           $jumlah_page = ceil($total_records / $limit);
           $jumlah_number = 1; // jumlah halaman ke kanan dan kiri dari halaman yang aktif
           $start_number = ($page > $jumlah_number) ? $page - $jumlah_number : 1;
           $end_number = ($page < ($jumlah_page - $jumlah_number)) ? $page + $jumlah_number : $jumlah_page;
           
           if ($total_records == 0) {
               echo '<li class="page-item disabled"><a class="page-link" href="#content">First</a></li>';
               echo '<li class="page-item disabled"><a class="page-link" href="#content"><span aria-hidden="true">&laquo;</span></a></li>';
               echo '<li class="page-item disabled"><a class="page-link" href="#content">Next</a></li>';
               echo '<li class="page-item disabled"><a class="page-link" href="#content"><span aria-hidden="true">&raquo;</span></a></li>';
               echo '<li class="page-item disabled"><a class="page-link" href="#content">Last</a></li>';
           } else {
               if ($page == 1) {
                   echo '<li class="page-item disabled"><a class="page-link" href="#content">First</a></li>';
                   echo '<li class="page-item disabled"><a class="page-link" href="#content"><span aria-hidden="true">&laquo;</span></a></li>';
               } else {
                   $link_prev = ($page > 1) ? $page - 1 : 1;
                   echo '<li class="page-item halaman" id="1"><a class="page-link" href="#content">First</a></li>';
                   echo '<li class="page-item halaman" id="' . $link_prev . '"><a class="page-link" href="#content"><span aria-hidden="true">&laquo;</span></a></li>';
               }
           
               for ($i = $start_number; $i <= $end_number; $i++) {
                   $link_active = ($page == $i) ? ' active' : '';
                   echo '<li class="page-item halaman ' . $link_active . '" id="' . $i . '"><a class="page-link" href="#content">' . $i . '</a></li>';
               }
           
               if ($page == $jumlah_page) {
                   echo '<li class="page-item disabled"><a class="page-link" href="#content"><span aria-hidden="true">&raquo;</span></a></li>';
                   echo '<li class="page-item disabled"><a class="page-link" href="#content">Last</a></li>';
               } else {
                   $link_next = ($page < $jumlah_page) ? $page + 1 : $jumlah_page;
                   echo '<li class="page-item halaman" id="' . $link_next . '"><a class="page-link" href="#content"><span aria-hidden="true">&raquo;</span></a></li>';
                   echo '<li class="page-item halaman" id="' . $jumlah_page . '"><a class="page-link" href="#content">Last</a></li>';
               }
           }
           
          ?>
        </ul>
      </nav>

      <small class="pt-3">Total Ucapan dan doa : <?php echo $total_records; ?></small>