function cariFilm() {
    $('#daftar-film').html('');
    $.ajax({
        url: 'http://omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey': '5dbd1f8a',
            's': $('#cari-input').val()
        },
        success: function (result) {
            if (result.Response == "True") {
                let movies = result.Search;

                $.each(movies, function (i, data) {
                    $('#daftar-film').append(`
                    <div class="col-md-4">
                
                    <div class="card mb-3" >
                    <img src="`+ data.Poster + `" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">`+ data.Title + `</h5>
                        <h6 class="card-subtitle mb-2 text-muted">`+ data.Year + `</h6>
                        <a href="#" class="card-link see-detail" data-toggle="modal" data-target="#exampleModal" data-id="`+ data.imdbID + `">Selengkapnya</a>
 
                    </div>
                    </div>
                    </div>
                    `);
                });

                $('#cari-input').val('');


            } else {
                $('#daftar-film').html(`
                <h1 class="text-center">Tidak ditemukan Film !</h>
                `)
            }
        }
    });

}

$('#cari-button').on('click', function () {
    cariFilm();
});

$('#cari-input').on('keyup', function (e) {
    if (e.keyCode === 13) {
        cariFilm();
    }
});

$('#daftar-film').on('click', '.see-detail', function () {
    $.ajax({
        url: 'http://omdbapi.com',
        type: 'get',
        dataType: 'json',
        data: {
            'apikey': '5dbd1f8a',
            'i': $(this).data('id')
        },
        success: function (movie) {
            if (movie.Response === "True") {
                $('.modal-body').html(`
                <div class="container-fluid">
                <div class="row">
                <div class="col-md-4">
                    <img src="`+ movie.Poster + `" class="img-fluid"></img>
                </div>

                <div class"col-md-8">
                <ul class="list-group">
                <li class="list-group-item"><h3>`+ movie.Title + `</h3></li>
                <li class="list-group-item">Rilis: `+ movie.Released + `</li>
                <li class="list-group-item">Genre: `+ movie.Genre + `</li>
                <li class="list-group-item">Diketor: `+ movie.Director + `</li>
                <li class="list-group-item">Aktor: `+ movie.Actors + `</li>
               
                </ul>
                </div>
                </div>
                </div>
                `);
            }
        }
    })
});

