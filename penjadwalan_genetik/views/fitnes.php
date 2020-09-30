<div class="content">
   <div class="header">
      <h1 class="page-title"><?php echo $page_title; ?></h1>
   </div>
   <ul class="breadcrumb">
      <li><a href="<?php echo base_url() ?>web">Beranda</a> <span class="divider">/</span></li>
      <li class="active"><?php echo $page_title; ?></li>
   </ul>

   <div class="container-fluid">
      <?php if ($this->session->flashdata('msg')) { ?>
         <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo $this->session->flashdata('msg'); ?>
         </div>
      <?php } ?>

      <div class="row-fluid">
         <a href="<?php echo base_url() . 'web/hari_add'; ?>"> <button class="btn btn-primary pull-right"><i class="icon-plus"></i> Konten Baru</button></a>
         <!--
        <form class="form-inline" method="POST" action="<?php echo base_url() . 'web/hari_search' ?>">
          <input type="text" placeholder="Nama" name="search_query" value="<?php echo isset($search_query) ? $search_query : ''; ?>">
          <button type="submit" class="btn">Cari</button>
          <a href="<?php echo base_url() . 'admin/content/travel'; ?>"><button type="button" class="btn">Clear</button> </a>
        </form>
		-->
         <br>
         <br>
         <?php if ($rs_hari->num_rows() === 0) : ?>
            <div class="alert alert-error">
               <button type="button" class="close" data-dismiss="alert">×</button>
               Tidak ada data.
            </div>
         <?php else : ?>
            <div class="widget-content">
               <?php
               $row_p = $populasi->row_object();
               echo "Jumlah Populasi : " . $row_p->jumlah;
               ?>
               <table class="table table-striped table-bordered">
                  <thead>
                     <td align="center">Perhitungan Nilai Fitness</td>
                     <tr>
                        <th>Kromosom</th>
                        <th>Fitness</th>
                        <!--<th style="width: 65px;"></th>-->
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $no = 1;

                     $jenis_semester = '1';
                     $tahun_akademik = '2017-2018';
                     $jumlah_populasi = '20';
                     $crossOver = '10';
                     $mutasi = '10';
                     $jumlah_generasi = '10000';

                     $genetik = new genetik(
                        $jenis_semester,
                        $tahun_akademik,
                        $jumlah_populasi,
                        $crossOver,
                        $mutasi,
                        //~~~~~~BUG!~~~~~~~
                        /*                      
                                  1 senin 5
                                  2 selasa 4
                                    3 rabu 3
                                    4 kamis 2
                                    5 jumat 1                       
                                   */
                        5, //kode hari jumat                       
                        '4-5-6', //kode jam jumat
                        //jam dhuhur tidak dipake untuk sementara
                        6
                     ); //kode jam dhuhur
                     $genetik->AmbilData();
                     $genetik->Inisialisai();

                     foreach ($genetik->HitungFitness() as $fit) {
                     ?>
                        <tr>
                           <td><?php echo $no; ?></td>
                           <td><?php echo number_format($fit, 4); ?></td>
                        </tr>
                     <?php
                        $no++;
                     }
                     ?>
                     <?php /*
                   $i = 1;
                   foreach ($rs_hari->result() as $hari) { ?>
                   <tr>                                        
                      <td><?php echo str_pad((int)$i,2,0,STR_PAD_LEFT);?></td>                    
                      <td><?php echo $hari->nama;?></td>
                      <td><?php ; ?></td>                      
                      <!--<td>
                        <a href="<?php //echo base_url() . 'web/hari_edit/' .$hari->kode;?>" class="btn btn-small"><i class="icon-pencil"></i></a>
                        <a href="<?php //echo base_url() . 'web/hari_delete/' .$hari->kode;?>" class="btn btn-small" onClick="return confirm('Anda yakin ingin menghapus data ini?')" ><i class="icon-trash"></i></a>
                      </td>-->
                   </tr>
                 <?php $i++;} */ ?>

                  </tbody>
               </table>

               <table class="table table-striped table-bordered">
                  <thead>
                     <td align="center">Probabilitas Tiap Kromosom</td>
                     <tr>
                        <th>Kromosom</th>
                        <th>Probabilitas</th>
                        <!--<th style="width: 65px;"></th>-->
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     $no = 1;
                     foreach ($genetik->Mutasi() as $mut) {
                     ?>
                        <tr>
                           <td><?php echo $no; ?></td>
                           <td><?php echo number_format($mut, 4); ?></td>
                        </tr>
                     <?php
                        $no++;
                     }
                     ?>
                     <?php /*
                   $i = 1;
                   foreach ($rs_hari->result() as $hari) { ?>
                   <tr>                                        
                      <td><?php echo str_pad((int)$i,2,0,STR_PAD_LEFT);?></td>                    
                      <td><?php echo $hari->nama;?></td>
                      <td><?php ; ?></td>                      
                      <!--<td>
                        <a href="<?php //echo base_url() . 'web/hari_edit/' .$hari->kode;?>" class="btn btn-small"><i class="icon-pencil"></i></a>
                        <a href="<?php //echo base_url() . 'web/hari_delete/' .$hari->kode;?>" class="btn btn-small" onClick="return confirm('Anda yakin ingin menghapus data ini?')" ><i class="icon-trash"></i></a>
                      </td>-->
                   </tr>
                 <?php $i++;} */ ?>

                  </tbody>
               </table>
               <table class="table table-striped table-bordered">
                  <thead>
                     <td align="center">Perhitungan Nilai Crossover</td>
                     <tr>
                        <th>Kromosom</th>
                        <th>
                           <center>Gen<center>
                        </th>
                        <!--<th style="width: 65px;"></th>-->
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                     for ($l = 1; $l <= $jumlah_populasi; $l++) {
                     ?>
                        <tr>
                           <td><?php echo $l; ?></td>
                           <td>
                              <table>
                                 <tr>
                                 <?php
                                 foreach ($genetik->HitungFitness() as $fit) {
                                    $nil = "0.00" . $l;
                                    $fit_b = $fit + $nil;
                                    echo "<td>" . number_format($fit_b, 4) . "</td>";
                                 }
                                 echo "</tr> </table>";
                              }
                                 ?>
                           </td>
                        </tr>
                        <?php /*
                   $i = 1;
                   foreach ($rs_hari->result() as $hari) { ?>
                   <tr>                                        
                      <td><?php echo str_pad((int)$i,2,0,STR_PAD_LEFT);?></td>                    
                      <td><?php echo $hari->nama;?></td>
                      <td><?php ; ?></td>                      
                      <!--<td>
                        <a href="<?php //echo base_url() . 'web/hari_edit/' .$hari->kode;?>" class="btn btn-small"><i class="icon-pencil"></i></a>
                        <a href="<?php //echo base_url() . 'web/hari_delete/' .$hari->kode;?>" class="btn btn-small" onClick="return confirm('Anda yakin ingin menghapus data ini?')" ><i class="icon-trash"></i></a>
                      </td>-->
                   </tr>
                 <?php $i++;} */ ?>

                  </tbody>
               </table>

            </div>
         <?php endif; ?>
         <footer>
            <hr />
            <p class="pull-right">Design by <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
            <p>&copy; 2012 <a href="http://www.portnine.com" target="_blank">Portnine</a></p>
         </footer>
      </div>
   </div>
</div>