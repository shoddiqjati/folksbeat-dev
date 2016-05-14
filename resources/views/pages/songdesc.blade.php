@extends('layout.default')
@section('title') halaman home @endsection
@section('content')
          <div class="container-fluid">
              <div class="row">
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
               <div class="row">
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
                      <p class="navbar-text">SONG
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
              </div>
          </div>

@stop
