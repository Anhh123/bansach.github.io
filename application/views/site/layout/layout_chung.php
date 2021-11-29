        <div class="newsletter_bg">
            <?php $this->load->view('site/letter',$this->data);?>
        </div>
        <footer class="footer_bg">
            <?php $this->load->view('site/footer', $this->data); ?>
        </footer>
        <script>
            $(function () {
              $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        <div class="copyright">
            <?php $this->load->view('site/footer-bottom', $this->data); ?>
        </div>
    </div>
    <!--Scroll to Top-->
    <a href="" class="scrollToTop">
        <i class="fa fa-chevron-up"></i>
    </a>
    <script>
      $(document).ready(function() {
        //Check to see if the window is top if not then display button
        $('#mmenu').slicknav({
          label:'',
          prependTo:'#header-mobile-menu'
        });
        $(window).scroll(function() {
          if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
          } else {
            $('.scrollToTop').fadeOut();
          }
        });
      
        //Click event to scroll to top
        $('.scrollToTop').click(function() {
          $('html, body').animate({
            scrollTop: 0
          }, 600);
          return false;
        });
      
      });
    </script>
    <script src="<?php echo public_url('site/bookstore')?>/library/owl.carousel.min.js" type='text/javascript'></script>
    <script>
      $(document).ready(function() {
        $("#owl-index").owlCarousel({
          navigation : false, // Show next and prev buttons
          slideSpeed : 300,
          paginationSpeed : 400,
          singleItem:true,
          autoPlay: 3000
        });
        $("#sale-off").owlCarousel({
          navigation : true, // Show next and prev buttons
          navigationText:["<i class=\"fa fa-angle-left fa-2x\"><\/i>","<i class=\"fa fa-angle-right fa-2x\"><\/i>"],
          slideSpeed : 300,
          paginationSpeed : 400,
          singleItem:true,
          pagination: false,
          autoPlay: 5000
        });
        $("#owl-product-new").owlCarousel({
          navigation : true,
          pagination: false,
          itemsCustom: [
            [0, 1],
            [480, 2],
            [768, 2],
            [992, 3]
          ],
          itemsScaleUp : true,
          slideSpeed : 300,
          paginationSpeed : 400,
          navigationText:["<i class=\"fa fa-angle-left fa-2x\"><\/i>","<i class=\"fa fa-angle-right fa-2x\"><\/i>"]
        });
        $("#owl-blog").owlCarousel({
          navigation : true,
          pagination: false,
          itemsCustom: [
            [0, 1],
            [480, 2],
            [768, 2],
            [992, 3]
          ],
          itemsScaleUp : true,
          slideSpeed : 300,
          paginationSpeed : 400,
          navigationText:["<i class=\"fa fa-angle-left fa-2x\"><\/i>","<i class=\"fa fa-angle-right fa-2x\"><\/i>"]
        });
        $("#sliderproduct").owlCarousel({
          navigation : true,
          pagination: false,
          itemsCustom: [
            [0, 1],
            [480, 2],
            [768, 3],
            [992, 4],
          ],
            itemsScaleUp : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            navigationText:["<i class=\"fa fa-angle-left fa-2x\"><\/i>","<i class=\"fa fa-angle-right fa-2x\"><\/i>"],
          transitionStyle:'fadeIn'
        });
        $("#sliderproduct-mobile").owlCarousel({
          navigation : false,
          pagination: true,
          itemsCustom: [
            [0, 1],
            [480, 2],
          ],
            itemsScaleUp : true,
            slideSpeed : 300,
            paginationSpeed : 400,
            transitionStyle:'fadeIn'
            });
            });
    </script>
    <script>
      $(document).ready(function(){
        $('.add-to-cart').click(function(){
          var quantity = 1;
          var variant_id = $(this).attr('data-variantid');
          var params = {
            type: 'POST',
            url: '/cart/add.js',
            data: 'quantity=' + quantity + '&id=' + variant_id,
            dataType: 'json',
            success: function(line_item) {
              window.location = 'cart.html';
            },
            error: function(XMLHttpRequest, textStatus) {
              BookStore.onError(XMLHttpRequest, textStatus);
            }
          };
          jQuery.ajax(params);
        });
      })
    </script>
    <script>
      $(document).ready(function(){
        $('.add-to-links a.quick-view').click(function(e){
          e.preventDefault();
          var handle = $(this).data('handle');
          $.ajax({
            url : '/products/'+handle+'?view=quickview',
            success: function(data){
              $('body').addClass('modal-open');
              $('body').append(data);
            }
          })
        })
        $('body').on('click','#quick-shop-modal .close',function(){
          $('body').removeClass('modal-open');
          $('body #quick-shop-modal').remove();
          $('body .modal-backdrop').remove();
        })
      
      })
    </script>
    <script src="<?php echo public_url('dathang')?>/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("input[name$='type']").click(function(){
                var value = $(this).val();
                if(value=='Individual') {
                    $("#Individual_box").show();
                    $("#Company_box").hide();
                }
                else if(value=='Company') {
                    $("#Company_box").show();
                    $("#Individual_box").hide();
                }
            });
            $("#Individual_box").show();
            $("#Company_box").hide();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
          $("input[name$='type1']").click(function(){
          var value = $(this).val();
          if(value=='Individual1') {
            $("#Individual_box1").show();
             $("#Company_box1").hide();
          }
          else if(value=='Company1') {
           $("#Company_box1").show();
            $("#Individual_box1").hide();
           }
          });
          $("#Individual_box1").show();
          $("#Company_box1").hide();
        });
    </script>
    
    <!-- Button -->
    <script>
      (function() {
        var isSafari = !!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/);
        if(isSafari) {
          document.getElementById('support-note').style.display = 'block';
        }
      })();
    </script>

    <!-- Button màu mè -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/TweenMax.min.js"></script>
  <script src="<?php echo public_url('site/bookstore')?>/library/js/ripple-config.js"></script>
</body>
</html>