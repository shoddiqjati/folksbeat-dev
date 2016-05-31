@extends('layout.default')
@section('title') halaman home @endsection
@section('sidebar') @extends('layout.sidebar-playlist') @endsection
@section('content')
          <div class="content">
              <div class="row songdesc" style="z-index:1;">
                  <div class="col-md-12" style="background color:grey">
                      <h1>Hymn For The Weekend</h1>
                      <h2>Coldplay</h2>
                      <h3>About the song</h3>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus est, si videtur,
                       et recta quidem ad me. In his igitur partibus duabus nihil erat, quod Zeno commutare gestiret.
                       Duo Reges: constructio interrete. Optime, inquam. Iubet igitur nos Pythius Apollo noscere nosmet ipsos.
                       Hic ego: Pomponius quidem, inquam, noster iocari videtur,
                       et fortasse suo iure. Immo vero, inquit, ad beatissime vivendum parum est, ad beate vero satis. Nam quid possumus facere melius?
                     </p>
                   </div>
              </div>
               <!-- <div class="row">
                 <div class="col-md-12">
                        <div class="col-md-8">
                          <ul class="nav nav-tabs">
                          <li role="presentation" class="active"><a href="#">POPULAR</a></li>
                          <li role="presentation"><a href="#">NEW</a></li>
                          <li role="presentation"><a href="#">FEATURED</a></li>
                           </ul>
                        </div>
                      <div class="col-md-4">
                        <span class="pull-right">
                        <form class="navbar-form navbar-left" role="search">
                          <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                          </div>
                          <button type="submit" class="btn btn-default">
                            <span class="glyphicon glyphicon-search"></span>
                          </button>
                        </form>
                      </div>
                      </span>
                  </div>

                  <div class="col-md-12">
                    <div class="col-md-8">
                      <h2 class="page-header">SONGS
                    </div>
                    <div class="col-md-4">
                      <span class="pull-right">
                      <nav>
                        <ul class="pagination">
                          <li>
                            <a href="#"><span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                          </li>
                          <li>
                            <a href="#"><span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                    </span>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="col-sm-6 col-md-4">
                      <div class="thumbnail">
                        <img src="http://localhost/folksbeat-dev/resources/assets/image/album_unravel.jpg" alt="...">
                        <div class="caption">
                         <h3>Coldplay</h3>
                          <h4>Hymn Fot The Weekend</h4>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="thumbnail">

                        <img src="http://localhost/folksbeat-dev/resources/assets/image/album_unravel.jpg" alt="...">
                        <div class="caption">
                          <h3>Coldplay</h3>
                          <h4>Hymn Fot The Weekend</h4>
                        </div>
                      </div>
                    </div>
                      <div class="col-sm-6 col-md-4">
                      <div class="thumbnail">
                        <img src="http://localhost/folksbeat-dev/resources/assets/image/album_unravel.jpg" alt="...">
                        <div class="caption">
                          <h3>Coldplay</h3>
                          <h4>Hymn Fot The Weekend</h4>
                        </div>
                      </div>
                    </div>
                  </div>
              </div> -->

              <div>
            		<ul class="nav-custom nav-tabs-custom" style="z-index: 1; top: 45%; margin-top:18px;">
            	  		<li class="active"><a data-toggle="tab" href="#tab-popular">POPULAR</a></li>
            	 		<li><a data-toggle="tab" href="#menu1">NEW</a></li>
            	  		<li><a data-toggle="tab" href="#menu2">FEATURED</a></li>
            		</ul>

            		<div class="tab-content" style=" z-index: 0; position: fixed; margin-top:68px; top: 45%; height:40%; overflow-y: auto;">
            		  <div id="tab-popular" class="tab-pane fade in active">
            		    <div class="row content-title-container row-content">
            		    	<div class="col-md-11 content-title">
            		    		<h5>SONGS</h5>
            		    	</div>
            		    	<div class="col-md-1"></div>
            		    </div>
            		    <div class="row row-content">
            		    	<div class="col-md-3">
            		    		<img class="song-art" src="http://placehold.it/350x350">
            		    		<h5 class="song-title">Judul Lagu</h5>
            		    		<h6 class="song-artist">Artist</h6>
            		    	</div>
            		    	<div class="col-md-3">
            		    		<img class="song-art" src="http://placehold.it/350x350">
            		    		<h5 class="song-title">Judul Lagu</h5>
            		    		<h6 class="song-artist">Artist</h6>
            		    	</div>
            		    	<div class="col-md-3">
            		    		<img class="song-art" src="http://placehold.it/350x350">
            		    		<h5 class="song-title">Judul Lagu</h5>
            		    		<h6 class="song-artist">Artist</h6>
            		    	</div>
            		    	<div class="col-md-3">
            		    		<img class="song-art" src="http://placehold.it/350x350">
            		    		<h5 class="song-title">Judul Lagu</h5>
            		    		<h6 class="song-artist">Artist</h6>
            		    	</div>
            		    </div>
            		    <div class="row content-title-container row-content">
            		    	<div class="col-md-11 content-title">
            		    		<h5>ALBUMS</h5>
            		    	</div>
            		    	<div class="col-md-1"></div>
            		    </div>
            		    <div class="row row-content">
            		    	<div class="col-md-3">
            		    		<img class="song-art" src="http://placehold.it/350x350">
            		    		<h5 class="song-title">Judul Lagu</h5>
            		    		<h6 class="song-artist">Artist</h6>
            		    	</div>
            		    	<div class="col-md-3">
            		    		<img class="song-art" src="http://placehold.it/350x350">
            		    		<h5 class="song-title">Judul Lagu</h5>
            		    		<h6 class="song-artist">Artist</h6>
            		    	</div>
            		    	<div class="col-md-3">
            		    		<img class="song-art" src="http://placehold.it/350x350">
            		    		<h5 class="song-title">Judul Lagu</h5>
            		    		<h6 class="song-artist">Artist</h6>
            		    	</div>
            		    	<div class="col-md-3">
            		    		<img class="song-art" src="http://placehold.it/350x350">
            		    		<h5 class="song-title">Judul Lagu</h5>
            		    		<h6 class="song-artist">Artist</h6>
            		    	</div>
            		    </div>
            		  </div>
            		  <div id="menu1" class="tab-pane fade">
            		  	<div class="row">
            		  		<h1>SOMETHING!!</h1>
            		  	</div>
            		  </div>
            		  <div id="menu2" class="tab-pane fade">
            		    <div class="row">
            		  		<h1>SOMETHING!!</h1>
            		  	</div>
            		  </div>
            		</div>
            	</div>
          </div>
@stop
