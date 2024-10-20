<?php
function get_CURL($url) {

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  $result = curl_exec($curl);
  curl_close($curl); // Ditambahkan tanda kurung yang benar
  
 return json_decode($result, true); // Menghapus tanda kurung yang tidak perlu
}

$result = get_CURL('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCM_XYR_aEfnG-ovmdomcRmQ&key=AIzaSyBchVvyZyeJxqKD6hibgKJpMmm_Ydzp0Ok');

$youtubeProfilePicture = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$chennelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];

// latest video
$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyBchVvyZyeJxqKD6hibgKJpMmm_Ydzp0Ok&channelId=UCM_XYR_aEfnG-ovmdomcRmQ&maxResults=1&order=date&part=snippet';
$result = get_CURL($urlLatestVideo);
$urlLatestVideo = $result['items'][0]['id']['videoId']

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>My Blog | About Me</title>
    <link rel="icon" href="img/Logo.png" type="image/png" />
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <!--AOS-->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Besley:ital,wght@0,400..900;1,400..900&family=Edu+VIC+WA+NT+Beginner:wght@400..700&family=Roboto+Slab:wght@200&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-md shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="img/Logo.png" alt="Logo" width="50" height="50" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Ichwan Ardianto</h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link" href="index.html">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">About Me</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <!--akhir navbar-->

    <section id="about">
      <div class="container text-center">
        <div class="row">
          <div class="welcome col">
            <h1 data-aos="fade-down" data-aos-duration="4000">About <span class="underline">Me</span></h1>
          </div>
        </div>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row mt-5">
          <div class="col-md-8">
            <p data-aos="fade-up" data-aos-duration="4000" id="intruduceAbout" style="text-align: justify">
              Selamat datang di blog pribadi saya. Nama saya Ichwan, seorang pemuda berusia 21 tahun yang penuh rasa ingin tahu dan semangat belajar. Blog ini menjadi tempat saya berbagi pengalaman hidup, tantangan, dan impian yang terus
              saya kejar. Setiap tulisan mencerminkan refleksi diri, dunia di sekitar, dan upaya saya untuk memberikan dampak positif. Melalui kata-kata, saya mengekspresikan hal-hal yang sulit diucapkan dan menemukan maknanya di sini.
            </p>
          </div>

          <div class="col-md-4 mb-5">
            <img data-aos="fade-up" data-aos-duration="4000" class="img-about" src="img-blog/bitcoin.jpg" width="400" />
          </div>
        </div>
        <hr />
      </div>
    </section>

    <section id="Youtube">
      <div class="container text-center">
        <div class="row">
          <div class="welcome col mt-3">
            <h1 data-aos="fade-down" data-aos-duration="4000">Follow My <span class="underline">Youtube</span></h1>
          </div>
        </div>
      </div>
    </section>

    <section id="Youtube">
      <div class="container" data-aos="fade-up" data-aos-duration="4000">
        <div class="row justify-content-center ">
          <div class=" col-md-2 mt-5 float-start">
            <img  src="<?= $youtubeProfilePicture; ?>" width="150" class="rounded-circle img-thumbnail profile-img">

          </div>
          <div class="col-md-4 mt-3">
          <h3><?= $chennelName; ?></h3>
          <h5 class="text-muted"><?= $subscriber; ?> Subscriber.</h5>
            <div class="embed-responsive embed-responsive-16by9">
              <iframe src="https://www.youtube.com/embed/<?= $urlLatestVideo ?>?rel=0" class="embed-responsive-item" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="text-black text-center">
      <hr />
      <p>Created with <i class="bi bi-heart-fill text-danger"></i> by <a class="text-black fw-bold" href="https://www.instagram.com/ichwan_ardi22/">Ichwan Ardianto</a></p>
    </footer>

    <script src="main.js"></script>

    <!--AOS-->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init({
        once: true,
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
