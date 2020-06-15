<?php
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCsGrMyCVoAK90ivvcM3efpg&key=AIzaSyA41JAbN52El4O469LRXTybPfQ110_HyAQ');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
curl_close($curl);

$result = json_decode($result, true);

$youtubeProfilePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$namaChannel = $result['items'][0]['snippet']['title'];
$subscribers = $result['items'][0]['statistics']['subscriberCount'];

//video

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyA41JAbN52El4O469LRXTybPfQ110_HyAQ&channelId=UCsGrMyCVoAK90ivvcM3efpg&maxResults=1&order=date&part=snippet');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
curl_close($curl);

$result = json_decode($result, true);

$videoTerakhir = $result['items'][0]['id']['videoId'];
?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">


    <link rel="stylesheet" href="css/style.css">

    <title>My Portfolio</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Movie Asik - 02734</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Cari Film <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="profil.php">Profil Pembuat <span class="sr-only">(current)</span></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <div class="jumbotron" id="home">
        <div class="container">
            <div class="text-center">
                <img src="<?= $youtubeProfilePic; ?>" class="rounded-circle img-thumbnail">
                <h1 class="display-4">Nico Fernades</h1>
                <h3 class="lead">Founder MabaKampus | Programmer | Youtuber</h3>
            </div>
        </div>
    </div>


    <!-- About -->
    <section class="about" id="about">
        <div class="container">
            <div class="row mb-4">
                <div class="col text-center">
                    <h2>About</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <p>On this occasion, allow me to make an introduction to who I am. My name is Nico Fernades. I am only child. I was born in Semarang, January 11th 2001. Currently, I live in Semarang, Central Java.

                        Speaking of a hobby, vidography is one of my hobbies.
                        I has been made several short film projects with my friends during high school</p>
                </div>
                <div class="col-md-5">
                    <p>At this age, I am also establishing an educational platform called MabaKampus. Mabakampus is one of the online guidance websites that is useful to facilitate prospective new students to get information about state and official tertiary institutions, train the ability of prospective new students to work on UTBK questions that are HOTS (Higher Over Thinking Skills), and prepare themselves to go to the world of lectures.</p>
                </div>
            </div>
        </div>
    </section>
    <!--- Sosial Media -->
    <section class="social bg-light" id="social">
        <div class="container">
            <div class="row pt-4 mb-4">
                <div class="col text-center">
                    <h2>Sosial Media</h2>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="row">
                    <div class="col-md-4">

                        <img src="<?= $youtubeProfilePic; ?>" width="150" class="rounded-circle img-thumbnail">
                    </div>
                    <div class="col-md-8">
                        <h5><?= $namaChannel; ?></h5>
                        <p><?= $subscribers; ?> Subscribers</p>
                        <div class="g-ytsubscribe" data-channelid="UCsGrMyCVoAK90ivvcM3efpg" data-layout="default" data-theme="dark" data-count="default"></div>
                    </div>
                </div>
                <div class="row mt-3 pb-3">
                    <div class="col">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $videoTerakhir; ?>?rel=0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Maaf ternyata rest api instagram masih di disable sampai tanggal 29 Juni 2020 -->
            <!-- <div class="col-md-5">
                <div class="row">
                    <div class="col-md-4">
                        <img src="img/profile1.png" width="150" class="rounded-circle img-thumbnail">
                    </div>
                    <div class="col-md-8">
                        <h5>Nico Fernades</h5>
                        <p>823 Followers</p>
                    </div>
                </div> -->
            <!-- <div class="row mt-3 pb-3"> -->
            <!-- <div class="col">
            <div class="ig-thumbnail">
              <img src="img/thumbs/1.png" alt="">
            </div>
            <div class="ig-thumbnail">
              <img src="img/thumbs/2.png" alt="">
            </div>
            <div class="ig-thumbnail">
              <img src="img/thumbs/3.png" alt="">
            </div> -->
            <!-- </div>
            </div> -->
        </div>


    </section>



    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <p>Copyright &copy; 2020. A22.2019.02734</p>
                </div>
            </div>
        </div>
    </footer>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
</body>

</html>