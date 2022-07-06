<script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.js"></script>
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800"><?= $title_page; ?></h1>
<div class="card-header">
<h5>SELAMAT DATANG DI SISTEM INFORMASI AKADEMIK</h5>
</div>

<div class="container mt-3">
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between">
		  	<h6 class="m-0 font-weight-bold text-primary">Grafik Siswa</h6>
		</div>
		<div class="card-body">
			<div style="width: 800px;height: 700px">
                    <canvas id="myChart"></canvas>
                    <?php
				    //Inisialisasi nilai variabel awal
				    $jenis_kelamin= "";
				    $jumlah=null;
				    foreach ($grafiksiswa as $item)
				    {
				        $jk=$item->jenis_kelamin;
				        $jenis_kelamin .= "'$jk'". ", ";
				        $jum=$item->total;
				        $jumlah .= "$jum". ", ";
				    }
				    ?>

				    <script>
				    var ctx = document.getElementById('myChart').getContext('2d');
				    var chart = new Chart(ctx, {
				        // The type of chart we want to create
				        type: 'bar',
				        // The data for our dataset
				        data: {
				            labels: [<?php echo $jenis_kelamin; ?>],
				            datasets: [{
				                label:'Jenis Kelamin ',
				                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
				                borderColor: ['rgb(255, 99, 132)'],
				                data: [<?php echo $jumlah; ?>]
				            }]
				        },
				        // Configuration options go here
				        options: {
				            scales: {
				                yAxes: [{
				                    ticks: {
				                        beginAtZero:true
				                    }
				                }]
				            }
				        }
				    });
				</script>
                   
            </div>
		</div>
	</div>
</div>

<div class="container mt-3">
	<div class="card shadow mb-4">
		<div class="card-header py-3 d-flex justify-content-between">
		  	<h6 class="m-0 font-weight-bold text-primary">Grafik Guru</h6>
		</div>
		<div class="card-body">
			<div style="width: 800px;height: 700px">
                    <canvas id="myChart2"></canvas>
                    <?php
				    //Inisialisasi nilai variabel awal
				    $jenis_kelamin= "";
				    $jumlah=null;
				    foreach ($grafikguru as $item)
				    {
				        $jk=$item->jenis_kelamin;
				        $jenis_kelamin .= "'$jk'". ", ";
				        $jum=$item->total;
				        $jumlah .= "$jum". ", ";
				    }
				    ?>

				    <script>
				    var ctx = document.getElementById('myChart2').getContext('2d');
				    var chart = new Chart(ctx, {
				        // The type of chart we want to create
				        type: 'bar',
				        // The data for our dataset
				        data: {
				            labels: [<?php echo $jenis_kelamin; ?>],
				            datasets: [{
				                label:'Jenis Kelamin ',
				                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
				                borderColor: ['rgb(255, 99, 132)'],
				                data: [<?php echo $jumlah; ?>]
				            }]
				        },
				        // Configuration options go here
				        options: {
				            scales: {
				                yAxes: [{
				                    ticks: {
				                        beginAtZero:true
				                    }
				                }]
				            }
				        }
				    });
				</script>
                   
            </div>
		</div>
	</div>
</div>