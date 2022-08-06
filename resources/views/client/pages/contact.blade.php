@extends('client.home')
@section('index')


<section class="contact-section padding_top">
  <div class="container">
    <div class="d-none d-sm-block mb-5 pb-4">
      <div id="map" style="height: 480px;"></div>
      <script>
        function initMap() {
          var uluru = {
            lat: -25.363,
            lng: 131.044
          };
          var grayStyles = [{
              featureType: "all",
              stylers: [{
                  saturation: -90
                },
                {
                  lightness: 50
                }
              ]
            },
            {
              elementType: 'labels.text.fill',
              stylers: [{
                color: '#ccdee9'
              }]
            }
          ];
          var map = new google.maps.Map(document.getElementById('map'), {
            center: {
              lat: -31.197,
              lng: 150.744
            },
            zoom: 9,
            styles: grayStyles,
            scrollwheel: false
          });
        }
      </script>
      <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpfS1oRGreGSBU5HHjMmQ3o5NLw7VdJ6I&callback=initMap">
      </script>

    </div>


    <div class="row">
      <div class="col-12">
        <h2 class="contact-title">Thông tin liên hệ của bạn</h2>
      </div>
      <div class="col-lg-8">
        <form class="form-contact contact_form" action="#" method="post" id="contactForm"
          novalidate="novalidate">
          <div class="row">
            <div class="col-12">
              <div class="form-group">

                <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Lời nhắn'"
                  placeholder='Lời nhắn'></textarea>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                  onblur="this.placeholder = 'Nhập họ tên'" placeholder='Nhập họ tên'>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                  onblur="this.placeholder = 'Email'" placeholder='Email'>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''"
                  onblur="this.placeholder = 'Tiêu đề'" placeholder='Tiêu đề'>
              </div>
            </div>
          </div>
          <div class="form-group mt-3">
            <a href="#" class="btn_3 button-contactForm">Gửi</a>
          </div>
        </form>
      </div>
      <div class="col-lg-4">
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-home"></i></span>
          <div class="media-body">
            <h3>Địa chỉ.</h3>
            <p>Số 10 Chương Dương Độ, Quận Hoàn Kiếm, TP. Hà Nội</p>
          </div>
        </div>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-tablet"></i></span>
          <div class="media-body">
            <h3>Điện thoại: 024 3932 9696</h3>
            <p>T2 - T6: 9h - 18h</p>
          </div>
        </div>
        <div class="media contact-info">
          <span class="contact-info__icon"><i class="ti-email"></i></span>
          <div class="media-body">
            <h3>Email: info@aconcept-vn.com</h3>
            <p>Hỗ trợ 24/7</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection