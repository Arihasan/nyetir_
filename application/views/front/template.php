<!doctype html>
<html lang="en">
  <head>
    <title><?= $this->config->item('title') ?> - <?= $judul ?></title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= site_url() ?>aset/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link href="<?= site_url() ?>aset/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" />
    
    <script src="<?= site_url() ?>aset/js/jquery-3.4.1.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <style type="text/css">
      *{
        font-family: 'Quicksand', sans-serif;
      }
      #konten{
        min-height: 100vh;
      }
      .navbar-nav .dropdown-menu{
        border-radius: 0;
        background-color: #74b9ff;
      }
      .dropdown-item{
        font-weight: bold;
      }
      .navbar-dark .navbar-toggler{
        border: 0;
      }
    </style>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-info text-center">
      <div class="ml-auto mr-auto">
        <a class="navbar-brand text-light" href="<?= site_url() ?>">
          <img width="50" src="<?= site_url('aset/svg/sedan.svg') ?>" alt="">
          <b><?= strtoupper($this->config->item('title')) ?></b>
        </a>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarAplikasi" aria-controls="navbarAplikasi" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarAplikasi">
        <ul class="navbar-nav ml-auto">

          <?php 
          $menu = $this->config->item('menu');
          for ($i=0; $i < count($menu); $i++) { ?>

            <?php if ( $this->session->has_userdata('id_peserta_peserta') == $menu[$i]['peserta'] || $menu[$i]['keduanya'] ): ?>      
              <li class="nav-item <?= $id_menu  == $menu[$i]['id'] ? 'active' : '' ?> <?= $menu[$i]['sub'] ? 'dropdown' : '' ?>">
                <?php if ($menu[$i]['sub']){ ?>
                  <a class="nav-link dropdown-toggle" href="<?= $menu[$i]['nama'] ?>" id="<?= $menu[$i]['id'] ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b><?= $menu[$i]['nama'] ?></b>
                  </a>
                <?php }else{ ?>
                  <a class="nav-link" href="<?= site_url($menu[$i]['url']) ?>"><b><?= $menu[$i]['nama'] ?></b></a>
                <?php } ?>

                <?php if ($menu[$i]['sub']): ?>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="<?= $menu[$i]['id'] ?>">
                  <?php 
                  $subitem = $menu[$i]['subitem'];
                  for ($s=0; $s < count($subitem); $s++) { ?>
                    <a class="dropdown-item" href="<?= site_url($subitem[$s]['url']) ?>"><?= $subitem[$s]['nama'] ?></a>
                  <?php } ?>
                </div>
                <?php endif ?>

              </li>
            <?php endif // penutup if session ?>
          
          <?php } // penutup php ?>

        </ul>
      </div>
    </nav>

    <div id="konten">
      <?php for ($i=0; $i < count($konten); $i++) {
        $this->load->view($konten[$i]);
      } ?>
    </div>

    <footer class="bg-light">
      <div class="mr-auto">
        <p class="m-0 p-3">Copyright &copy; <?= date('Y') ?> | <?= $this->config->item('title') ?></p>
      </div>
    </footer>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= site_url() ?>aset/js/bootstrap.min.js"></script>
    <script src="<?= site_url() ?>aset/js/popper.min.js"></script>
    <script src="<?= site_url() ?>aset/js_custom/konversi.js"></script>

    <script src="<?= site_url() ?>aset/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= site_url() ?>aset/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  </body>
</html>