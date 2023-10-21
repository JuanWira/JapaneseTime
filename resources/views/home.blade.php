@extends('layouts.main')
<body id="page-top">
    <!-- Masthead-->
    <div class="now">
        <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
      
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="https://images.tokopedia.net/img/cache/1200/BgtCLw/2021/9/30/07f629f7-04c6-46d6-b03d-de15a1fa29c2.jpg.webp?ect=4g" alt="Los Angeles" style="width:100%;">
            </div>
      
            <div class="item">
              <img src="https://images.tokopedia.net/img/cache/1200/BgtCLw/2022/3/25/a81082f6-bc50-4441-bf8c-ca1b2624841a.jpg.webp?ect=4g" alt="Chicago" style="width:100%;">
            </div>
          
            <div class="item">
              <img src="https://images.tokopedia.net/img/cache/1200/BgtCLw/2022/10/19/4655d979-0349-4941-9cfb-15331bdfabc4.jpg.webp?ect=4g" alt="New york" style="width:100%;">
            </div>
          </div>
      
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
    </div>
      </body>
    </section>
    <!-- Portfolio Grid-->
    @if($categories->count() > 3)
        <div class="fourth-content">
            <section class="page-section" id="portfolio">
                <div class="container">
                    <div class="text-center">
                        <h2 class="section-heading text-uppercase">Newest Collection</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 mb-4">
                            <!-- Portfolio item 1-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" href="/items?category={{ $categories[0]->slug }}">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"></div>
                                    </div>
                                    <img class="img-fluid" src="{{ asset('storage/' .$categories[0]->image) }}" alt="..." width="100%"/>
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">{{ $categories[0]->name }}</div>
                                    <div class="portfolio-caption-subheading text-muted">{{ $categories[0]->name }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-4">
                            <!-- Portfolio item 2-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" href="/items?category={{ $categories[1]->slug }}">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"></div>
                                    </div>
                                    <img class="img-fluid" src="{{ asset('storage/' .$categories[1]->image) }}" alt="..." width="100%"/>
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">{{ $categories[1]->name }}</div>
                                    <div class="portfolio-caption-subheading text-muted">{{ $categories[1]->name }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-4">
                            <!-- Portfolio item 3-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" href="/items?category={{ $categories[2]->slug }}">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"></div>
                                    </div>
                                    <img class="img-fluid" src="{{ asset('storage/' .$categories[2]->image) }}" alt="..." width="100%"/>
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">{{ $categories[2]->name }}</div>
                                    <div class="portfolio-caption-subheading text-muted">{{ $categories[2]->name }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-4">
                            <!-- Portfolio item 4-->
                            <div class="portfolio-item">
                                <a class="portfolio-link" href="/items?category={{ $categories[3]->slug }}">
                                    <div class="portfolio-hover">
                                        <div class="portfolio-hover-content"></div>
                                    </div>
                                    <img class="img-fluid" src="{{ asset('storage/' .$categories[3]->image) }}" alt="..." width="100%"/>
                                </a>
                                <div class="portfolio-caption">
                                    <div class="portfolio-caption-heading">{{ $categories[3]->name }}</div>
                                    <div class="portfolio-caption-subheading text-muted">{{ $categories[3]->name }}</div>
                                </div>
                            </div>
                        </div>
                        <h1 class="section-subheading text-center mt-5"><a href="/categories" class="btn btn-dark btn-xl text-uppercase">See More</a>
                    </div>
                </div>
            </div>
    @else

    @endif
    </section>
</body>
</html>