 @extends('frontend.app')
 @section('style')

 <style>

  .services .item-list {
    height: calc(100% - 15px);
  }
  .search-item{
    display: none;
  }

</style>
@endsection
@section('content')
<section class="ss-section pt-4">
  <div class="search">
    <form action="{{url('search-result')}}" method="get">
      <div class="row ml-0">
        <div class="col-sm-6 col-lg-5 pad-l-0 pop-body">
          <div class="form-group position-relative">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1"><img src="{{ asset('assets/img/search1.svg') }}" class="search-img" alt="lt flag"></span>
              </div>
              <input name="title" type="text" class="form-control search-i" placeholder="@lang('frontend.button.search')" aria-label="title" aria-describedby="basic-addon1" onkeyup="serachTitle(event,this.value)" autocomplete="off">



            </div>
            <div class="pop-up pop-dctr">
              <img class="loading" src="{{asset('assets/img/loading.gif')}}" alt="">
              <ul class="pop-rslt pl-0 m-0 doc_show" id="">
               <!-- title suggestion -->
             </ul>
           </div>
         </div>
       </div>
       <div class="col-sm-6 col-lg-2  pad-l-0">
        <div class="form-group">
          <div class="ctm-select">
            <span class="select-icon"><img src="{{ asset('assets/img/category.svg') }}" alt="lt flag"></span>
            <div class="ctm-select-txt">
              <span class="select-txt" id="category">@lang('frontend.label.category')</span>
            </div>
            <span class="select-arr"><img src="{{ asset('assets/img/down-ar.svg') }}" alt="lt flag"></span>
            <input type="hidden" name="category" class="catBox">
            <div class="ctm-option-box">
              <div class="ctm-option" onclick="setCategory(' ')" >Category</div>
              @foreach($s_cats as $m_category)
              <?php
              $str = $m_category->category_name;
              if ($str == 'house') {
                $url = 'realestate-browse';
              }elseif($str == 'cars'){
                $url = 'car-browse';
              }elseif($str == 'job'){
                $url = 'job-browse';
              }elseif($str == 'buy / sale'){
                $url = 'buy-sale-browse';
              }elseif($str == 'services'){
                $url = 'services-browse';
              }else{
                $url = $str;
              }
              ?>
              <div class="ctm-option" onclick="setCategory('<?= $m_category->cat_key ?>')" >{{$m_category->category_name}}</div>
              @endforeach

            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-2 pad-l-0">
        <div class="form-group">
          <div class="ctm-select">
            <span class="select-icon"><img src="{{ asset('assets/img/map-pin.svg') }}" alt="lt flag"></span>
            <div class="ctm-select-txt">
              <span class="select-txt" id="category">@lang('frontend.label.city')</span>
            </div>
            <span class="select-arr"><img src="{{ asset('assets/img/down-ar.svg') }}" alt="lt flag"></span>
            <input type="hidden" name="city" class="cityBox">
            <div class="ctm-option-box">
              <div class="ctm-option" onclick="srchCity('city',' ')"  >City</div>
              <div class="ctm-option" onclick="srchCity('city','Plats')"  >Plats</div>
              <div class="ctm-option" onclick="srchCity('city','Stockholm')"  >Stockholm</div>
              <div class="ctm-option" onclick="srchCity('city','Skåne')"  >Skåne</div>
              <div class="ctm-option" onclick="srchCity('city','Göteborg')" >Göteborg</div>
              <div class="ctm-option" onclick="srchCity('city','Östergötland')" >Östergötland</div>
              <div class="ctm-option" onclick="srchCity('city','Norrbotten')" >Norrbotten</div>
              <div class="ctm-option" onclick="srchCity('city','Uppsala')" >Uppsala</div>
              <div class="ctm-option" onclick="srchCity('city','Jönköping')" >Jönköping</div>
              <div class="ctm-option" onclick="srchCity('city','Älvsborg')" >Älvsborg</div>
              <div class="ctm-option" onclick="srchCity('city','Västerbotten')" >Västerbotten</div>
              <div class="ctm-option" onclick="srchCity('city','Västmanland')" >Västmanland</div>
              <div class="ctm-option" onclick="srchCity('city','Dalarna')" >Dalarna</div>
              <div class="ctm-option" onclick="srchCity('city','Örebro')" >Örebro</div>
              <div class="ctm-option" onclick="srchCity('city','Södermanland')" >Södermanland</div>
              <div class="ctm-option" onclick="srchCity('city','Västernorrland')" >Västernorrland</div>
              <div class="ctm-option" onclick="srchCity('city','Gävleborg')" >Gävleborg</div>
              <div class="ctm-option" onclick="srchCity('city','Skaraborg')" >Skaraborg</div>
              <div class="ctm-option" onclick="srchCity('city','Halland')" >Halland</div>
              <div class="ctm-option" onclick="srchCity('city','Utomlands')" >Utomlands</div>
              <div class="ctm-option" onclick="srchCity('city','Blekinge')" >Blekinge</div>
              <div class="ctm-option" onclick="srchCity('city','Kronoberg')" >Kronoberg</div>
              <div class="ctm-option" onclick="srchCity('city','Kalmar')" >Kalmar</div>
              <div class="ctm-option" onclick="srchCity('city','Norge')" >Norge</div>
              <div class="ctm-option" onclick="srchCity('city','Jämtland')" >Jämtland</div>
              <div class="ctm-option" onclick="srchCity('city','Gotland')" >Gotland</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-lg-3 pad-l-0 search-btn">
        <button type="submit" class="btn">@lang('frontend.button.search')</button>
      </div>
    </div>
  </form>
</div>
<div class="services">
  <div class="row">
    <div class="col-12 col-md-6">
      <div class="row mar-0 justify-content-center">
        @foreach($categories as $m_category)
        <?php
        $url = $m_category->slug;
        ?>
        <div class="col-6 col-sm-4 col-lg-4 pad-l-0">
          <a href="{{url($url)}}">
            <div class="item-list">
              <div class="item-icon">
                <img src="{{ asset('assets/img/mainCatIcon/'.$m_category->icon1)}}" alt="category-icon">
              </div>
              <div class="item-txt">{{$m_category->category_name}}</div>
            </div>
          </a>
        </div>
        @endforeach
      </div>
    </div>
    <div class="col-12 col-md-6">
      <div class="row mar-0">
        <div class="col-12 pad-0">
          <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              @php $n = 1 @endphp
              @if($sliders->count())
              @foreach($sliders as $slider)
              <div class="carousel-item <?= $n == 1 ? 'active': '' ?>">
                <a target="_blank" href="{{$slider->url}}">
                  <div class="home-slider-img">
                    <img class="cover" src="{{asset('assets/img/Sliders/'. $slider->slider)}}" alt="product">
                  </div>
                </a>
              </div>
              @php ++$n @endphp
              @endforeach
              @else
              <div class="carousel-item active">
                <a href="#">
                  <div class="home-slider-img">
                    <img class="cover" src="{{asset('assets/img/Sliders/demo_1.jpg')}}" alt="slider">
                  </div>
                </a>
              </div>
              @endif
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
<section class="slider-section">
  <div class="row mar-0">
    <div class="col-12 pad-0">
      <div class="section-tlt"><svg xmlns="http://www.w3.org/2000/svg" width="22.416" height="22.027" viewBox="0 0 22.416 22.027">
        <g id="check-circle" transform="translate(-0.998 -0.982)">
          <path id="Path_93" data-name="Path 93" d="M22,11.08V12a10,10,0,1,1-5.93-9.14" fill="none" stroke="#6200ee" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
          <path id="Path_94" data-name="Path 94" d="M22,4,12,14.01l-3-3" fill="none" stroke="#6200ee" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
        </g>
      </svg>
    @lang('frontend.home.heading.feature')</div>
  </div>
</div>
<div class="row mar-0">
  <div class="col-12 pad-0">
    <div class="swiper-container ctm-container">
      <div class="swiper-wrapper">
        @if(@$features->count())
        @foreach($features as $post)
        <div class="swiper-slide">
          <div class="product-list">
            <div class="product">
              <div class="product-img-p">
                <div class="product-img">
                  @if($post->cat == 'house')
                  @php $category = 'realestate'; @endphp
                  @elseif($post->cat == 'cars')
                  @php $category = 'transport'; @endphp
                  @elseif($post->cat == 'job')
                  @php $category = 'job'; @endphp
                  @elseif($post->cat == 'services')
                  @php $category = 'services' @endphp
                  @elseif($post->cat == 'buy-sale')
                  @php $category = 'buy-sale' @endphp
                  @endif
                  <img class="cover" src="{{asset('ad_thumbnail/'.@$post->coverImage->image) }}" alt="{{@$post->coverImage->type}}" alt="{{$post->image}}">
                </div>
                <span class="img-txt">@ {{$post->cat == 'buy-sale'?'Buy/Sale': ucfirst($post->cat)}}</span>
              </div>
              <div class="product-txt">
                <span class="fav" onclick="addToFavourite('<?= $post->_id ?>')" style="position: absolute;right: 12px;"><i class="far fa-heart"></i></span>
                <div class="product-price">$ {{$post->price}}</div>
                <div class="product-tlt">{{ucfirst($post->title)}}</div>
                <div class="product-time">{{$post->created_at->diffForHumans()}}</div>
                <a onclick="addToLastVisit('<?= $post->_id ?>')" href="{{url('advertisement-details',['cat' => @$category,'form_type' => @$post->form_type,'post_id' => @$post->_id])}}">
                  <div class="view-btn">@lang('frontend.button.view')
                    <i class="fas fa-arrow-right"></i>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <h4>No Featured Advertisement was listed</h4>
        @endif
      </div>
    </div>

    <div class="swiper-button-next">
      <svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" viewBox="0 0 53.499 53.499">
        <g id="Group_139" data-name="Group 139" transform="translate(54.499 54.499) rotate(180)">
          <path id="Path_97" data-name="Path 97" d="M27.75,1A26.75,26.75,0,1,0,54.5,27.75,26.781,26.781,0,0,0,27.75,1Zm0,48.636A21.886,21.886,0,1,1,49.636,27.75,21.911,21.911,0,0,1,27.75,49.636Z" fill="#cacaca"/>
          <path id="Path_98" data-name="Path 98" d="M28.884,16.727H15.3l5.576-5.576a2.431,2.431,0,1,0-3.439-3.439L7.711,17.44a2.439,2.439,0,0,0,0,3.441l9.725,9.725a2.431,2.431,0,1,0,3.439-3.439L15.3,21.591H28.884a2.432,2.432,0,1,0,0-4.864Z" transform="translate(8.592 8.59)" fill="#cacaca"/>
        </g>
      </svg>
    </div>
    <div class="swiper-button-prev">
      <svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" viewBox="0 0 53.499 53.499">
        <g id="Group_138" data-name="Group 138" transform="translate(-1 -1)">
          <path id="Path_97" data-name="Path 97" d="M27.75,1A26.75,26.75,0,1,0,54.5,27.75,26.781,26.781,0,0,0,27.75,1Zm0,48.636A21.886,21.886,0,1,1,49.636,27.75,21.911,21.911,0,0,1,27.75,49.636Z" fill="#cacaca"/>
          <path id="Path_98" data-name="Path 98" d="M28.884,16.727H15.3l5.576-5.576a2.431,2.431,0,1,0-3.439-3.439L7.711,17.44a2.439,2.439,0,0,0,0,3.441l9.725,9.725a2.431,2.431,0,1,0,3.439-3.439L15.3,21.591H28.884a2.432,2.432,0,1,0,0-4.864Z" transform="translate(8.592 8.59)" fill="#cacaca"/>
        </g>
      </svg>
    </div>
  </div>
</div>
</section>
<section class="product-wrapper">
  <div class="row mar-0">
    <div class="col-10 pad-0">
      <div class="row mar-0">
        <div class="col-12 pad-l-0">
          <div class="home-slider">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
               @php $num = 1 @endphp
               @if($sliders_two->count())
               @foreach($sliders_two as $slider)
               <div class="carousel-item <?= $num == 1 ? 'active': '' ?>">
                <div class="home-slider-img">
                  <img class="cover" src="{{ asset('assets/img/Sliders/'.$slider->slider) }}" alt="product">
                </div>
                <div class="view-btn"><a href="{{$slider->url}}" target="_blank" class="text-light">view</a></div>
              </div>
              @php ++$num @endphp
              @endforeach
              @else
              <div class="carousel-item active">
                <div class="home-slider-img">
                  <img class="cover" src="{{ asset('assets/img/Sliders/demo_2.jpg') }}" alt="product">
                </div>
              </div>
              @endif
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    @foreach($cat_features as $category)
    <div class="posted">
      <div class="row mar-0">
        <div class="col-12 pad-0">
          <div class="section-tlt">
            <img style="height: 30px; margin-right: 7px;" src="{{ asset('assets/img/mainCatIcon/'.$category->icon1)}}" alt="category-icon">{{$category->category_name}}
          </div>
        </div>
      </div>
      <div class="row mar-0">
        @foreach($category->advertisement->take(4) as $post)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 pad-l-0">
          <div class="product-list">
            <div class="product">
              <div class="product-img-p">
                <div class="product-img">
                  @if($post->cat == 'cars')
                  @php $cat = 'transport'; @endphp
                  @elseif($post->cat == 'house')
                  @php $cat = 'realestate'; @endphp
                  @elseif($post->cat == 'job')
                  @php $cat = 'job'; @endphp
                  @elseif($post->cat == 'services')
                  @php $cat = 'services'; @endphp
                  @elseif($post->cat == 'buy-sale')
                  @php $cat = 'buy-sale'; @endphp
                  @endif
                  <img class="cover" src="{{asset('ad_thumbnail/'.@$post->coverImage->image) }}" alt="{{$post->image}}">
                </div>
                <span class="img-txt">{{str_replace("-"," ",ucfirst($post->form_type))}}</span>
              </div>
              <div class="product-txt">
                <div class="product-price">${{$post->price}} <span class="fav" onclick="addToFavourite('<?= $post->_id ?>')"><i class="far fa-heart"></i></span></div>
                <div class="product-tlt">{{$post->title}}</div>
                <div class="product-time">{{$post->created_at->diffForHumans()}}</div>
                <a onclick="addToLastVisit('<?= $post->_id ?>')" href="{{url('advertisement-details',['cat' => @$cat,'form_type' => @$post->form_type,'post_id' => @$post->_id])}}">
                  <div class="view-btn">@lang('frontend.button.view') <i class="fas fa-arrow-right"></i></div>
                </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>

      <div class="row mar-0">
        <div class="col-12 pad-l-0">
          <div class="all-view">
            <div class="view-btn">
              <a class="text-light" href="{{$category->slug}}">
                <i class="fas fa-list"></i>@lang('frontend.button.view.all.news')
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    <div class="posted">
      <div class="row mar-0">
        <div class="col-12 pad-0">
          <div class="section-tlt">@lang('frontend.menu.last.visit')</div>
        </div>
      </div>
      <div class="row mar-0">
        @if(@$histories)
        @foreach($histories as $post)
        @if($post->cat == 'cars')
        @php $category = 'transport';@endphp
        @elseif($post->cat == 'house')
        @php $category = 'realestate';@endphp
        @elseif($post->cat == 'job')
        @php $category = 'job';@endphp
        @elseif($post->cat == 'services')
        @php $category = 'services';@endphp
        @elseif($post->cat == 'buy-sale')
        @php $category = 'buy-sale';@endphp
        @endif
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 pad-l-0">
          <div class="product-list">
            <div class="product">
              <div class="product-img-p">
                <div class="product-img">
                  <img class="cover" src="{{asset('ad_thumbnail/'.@$post->coverImage->image) }}" alt="{{@$post->coverImage->type}}">
                </div>
                <span class="img-txt">@ {{ucfirst($post->cat)}}</span>
                <span class="img-txt1">@ {{str_replace("-"," ",ucfirst($post->form_type))}}</span>
              </div>
              <div class="product-txt">
                <div class="product-price">
                  @if($post->cat == 'job')
                  ${{@$post->salary_from}} - ${{@$post->salary_to}}
                  @else
                  ${{@$post->price}}
                  @endif
                  <span class="fav" onclick="addToFavourite('<?= $post->_id?>')">
                    <i class="far fa-heart"></i>
                  </span>
                </div>
                <div class="product-tlt">{{@$post->title}}</div>
                <div class="product-time">{{@$post->created_at? @$post->created_at->diffForHumans(): ''}}</div>
                <a onclick="addToLastVisit('<?= $post->_id ?>')" href="{{url('advertisement-details',['cat' => @$category,'form_type' => @$post->form_type,'post_id' => @$post->_id])}}">
                  <div class="view-btn">@lang('frontend.button.view')
                    <i class="fas fa-arrow-right"></i>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        @else
        <h4 style="font-size: 13px">@lang('frontend.lastvisit.heading.history.no')</h4>
        @endif
      </div>
    </div>
  </div>
  <div class="col-2 pad-0">
    <div class="ad">
      ad
    </div>
    <div class="ad">
      ad
    </div>
    <div class="ad">
      ad
    </div>
    <div class="ad">
      ad
    </div>
  </div>
</div>
</section>
@endsection
@section('script')
<script>  
  var swiper = new Swiper('.ctm-container', {
    slidesPerView: 5,
    spaceBetween: 15,
    loop: false,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    breakpoints: {
      1400: {
        slidesPerView: 4,
      },
      1000: {
        slidesPerView: 3,
      },
      700: {
        slidesPerView: 2,
      },
      450: {
        slidesPerView: 1,
      }
    }
  });
</script>
@endsection
