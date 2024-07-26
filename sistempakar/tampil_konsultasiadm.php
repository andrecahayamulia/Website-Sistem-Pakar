<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penyakit</title>
</head>
<body>
    <div class="card">
        <div class="card-header bg-primary text-white border-dark"><strong>DATA HASIL KONSULTASI</strong></div>
            <div class="card-body">
                    <table class="table table-bordered" id="myTable">
                        <thead>
                        <tr>
                            <th width="20px"> No.</th>
                            <th width="200px">Tanggal</th>
                            <th width="200px">Nama Pasien</th>
                            <th width="100px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        
                                <?php
                                $no=1;
                                $sql = "SELECT * FROM konsultasi ORDER BY tanggal DESC";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                            ?>
                        <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $row['tanggal']; ?></td>
                                <td><?php echo $row['nama']; ?></td>

                            <td width="10px" align="center">
                                <a class="btn btn-primary" href="?page=konsultasiadm&action=detail&id=<?php echo $row['idkonsultasi']; ?>">
                                    <i class='fas fa-list'></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                        }
                        $conn->close();
                    ?>
                    </tbody>
            </table>
        </div>
    </div>
    
</body>
</html>