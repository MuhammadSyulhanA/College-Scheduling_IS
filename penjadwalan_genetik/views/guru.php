<head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>SB Admin 2 - Bootstrap Admin Theme</title>

   <!-- Bootstrap Core CSS -->
   <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

   <!-- MetisMenu CSS -->
   <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

   <!-- Timeline CSS -->
   <link href="../dist/css/timeline.css" rel="stylesheet">

   <!-- Custom CSS -->
   <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

   <!-- Morris Charts CSS -->
   <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">

   <!-- Custom Fonts -->
   <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
   <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
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
               <button type="button" class="close" data-dismiss="alert">x</button>
               <?php echo $this->session->flashdata('msg'); ?>
            </div>
         <?php } ?>

         <div class="row-fluid">
            <a href="<?php echo base_url() . 'web/guru_add'; ?>"> <button class="btn btn-primary pull-right"><i class="icon-plus"></i> Konten Baru</button></a>

            <form class="form-inline" method="POST" action="<?php echo base_url() . 'web/guru_search' ?>">
               <input type="text" placeholder="Nama" name="search_query" value="<?php echo isset($search_query) ? $search_query : ''; ?>">
               <button type="submit" class="btn">Cari</button>
               <a href="<?php echo base_url() . 'web/guru'; ?>"><button type="button" class="btn">Clear</button> </a>
            </form>

            <?php if ($rs_guru->num_rows() === 0) : ?>
               <div class="alert alert-error">
                  <button type="button" class="close" data-dismiss="alert">�</button>
                  Tidak ada data.
               </div>
            <?php else : ?>
               <div id="content_ajax">

                  <div class="pagination" id="ajax_paging">
                     <ul>
                        <?php echo $this->pagination->create_links(); ?>
                     </ul>
                  </div>

                  <div class="widget-content">
                     <table class="table table-striped table-bordered">
                        <thead>
                           <tr>
                              <th>#</th>
                              <th>nip</th>
                              <th>Nama</th>
                              <th>Telp</th>

                              <th style="width: 65px;"></th>
                           </tr>
                        </thead>
                        <tbody>

                           <?php
                           $i =  intval($start_number) + 1;
                           foreach ($rs_guru->result() as $guru) { ?>
                              <tr>
                                 <td><?php echo str_pad((int) $i, 2, 0, STR_PAD_LEFT); ?></td>
                                 <td><?php echo $guru->nip; ?></td>
                                 <td><?php echo $guru->nama; ?></td>
                                 <td><?php echo $guru->telp; ?></td>


                                 <td>
                                    <a href="<?php echo base_url() . 'web/guru_edit/' . $guru->kode; ?>" class="btn btn-small"><i class="icon-pencil"></i></a>
                                    <a href="<?php echo base_url() . 'web/guru_delete/' . $guru->kode; ?>" class="btn btn-small" onClick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="icon-trash"></i></a>
                                 </td>
                              </tr>
                           <?php $i++;
                           } ?>

                        </tbody>
                     </table>
                  </div>


                  <div class="pagination" id="ajax_paging">
                     <ul>
                        <?php echo $this->pagination->create_links(); ?>
                     </ul>
                  </div>
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
</body>