  <div class="col-md-12  clearfix" >
      <ol class="breadcrumb breadcrumb-arrow hidden-sm hidden-xs">
            <li><a href="<?php echo base_url()?>" target="_self">Trang chủ</a></li>
            <li>Giỏ hàng</li>
      </ol>
  </div>
    <div class="blog-index">
        <div class="row">
            <?php if($total_items > 0):?>
            <div class="w_cart">
                <form action="<?php echo base_url('order/checkout')?>" method="post">
                    <div class="col1cart box_grcart">
                        <h2 class="info-customer">Thông tin nhận hàng</h2>
                        <div class="form_gr">
                        <label for="firstname">Họ &amp; Tên: <span class="required">*</span></label>
                        <input type="text" name="name" class="input-text" placeholder="Nhập tại đây..." value="<?php echo isset($user->name) ? $user->name: ''?>" required>
                        </div>
                        <div class="form_gr">
                            <label>Điện thoại: <span class="required">*</span></label>
                            <input type="text" name="phone" class="input-text" placeholder="Nhập tại đây..." value="<?php echo isset($user->phone) ? $user->phone: ''?>" required>
                        </div>
                        <div class="form_gr">
                            <label>Email đăng nhập: <span class="required">*</span></label>
                            <input type="text" name="email" class="input-text" placeholder="Nhập tại đây..." value="<?php echo isset($user->email) ? $user->email: ''?>" required>
                        </div>
                        <h2 class="info-customer">phương thức giao hàng</h2>
                        <div class="container_tabs">
                            <div class="tabsradio">
                                <label><input name="type1" value="Individual1" checked="checked" type="radio">Giao tận nơi</label>
                                <div id="Individual_box1" class="tab-contentcart1">
                                    <div class="form_gr">
                                        <label>Địa chỉ: <span class="required">*</span></label>
                                        <input type="text" name="address" class="input-text" placeholder="Nhập tại đây..." id="firstname" value="<?php echo isset($user->address) ? $user->address: ''?>" required>
                                    </div>
                                    <div class="form_gr">
                                    <label>Tỉnh/Thành phố:</label>
                                    <select class="frm_gr" name="thanh_pho">
                                        <option value="">Vui lòng chọn vùng</option>
                                        <option value="Nội Thành Hà Nội" title="Hà Nội (Nội Thành)">Hà Nội (Nội Thành)</option>
                                        <option value="Ngoại thành hà nội" title="Hà Nội (Ngoại Thành)">Hà Nội (Ngoại Thành)</option>
                                        <option value="Thành phố Hồ Chí Minh" title="Thành phố Hồ Chí Minh">Thành phố Hồ Chí Minh</option>
                                        <option value="Bắc Cạn" title="Bắc Cạn">Bắc Cạn</option>
                                        <option value="Bắc Giang" title="Bắc Giang">Bắc Giang</option>
                                        <option value="Bắc Ninh" title="Bắc Ninh">Bắc Ninh</option>
                                        <option value="Bến Tre" title="Bến Tre">Bến Tre</option>
                                        <option value="Bình Dương" title="Bình Dương">Bình Dương</option>
                                        <option value="Bình Định" title="Bình Định">Bình Định</option>
                                        <option value="Bình Phước" title="Bình Phước">Bình Phước</option>
                                        <option value="Bình Thuận" title="Bình Thuận">Bình Thuận</option>
                                        <option value="Cà Mau" title="Cà Mau">Cà Mau</option>
                                        <option value="Cao Bằng" title="Cao Bằng">Cao Bằng</option>
                                        <option value="Cần Thơ" title="Cần Thơ">Cần Thơ</option>
                                        <option value="Đà Nẵng" title="Đà Nẵng">Đà Nẵng</option>
                                        <option value="Đắk Lắk" title="Đắk Lắk">Đắk Lắk</option>
                                        <option value="Đắk Nông" title="Đắk Nông">Đắk Nông</option>
                                        <option value="Điện Biên" title="Điện Biên">Điện Biên</option>
                                        <option value="Đồng Nai" title="Đồng Nai">Đồng Nai</option>
                                        <option value="Đồng Tháp" title="Đồng Tháp">Đồng Tháp</option>
                                        <option value="Gia Lai" title="Gia Lai">Gia Lai</option>
                                        <option value="Hà Giang" title="Hà Giang">Hà Giang</option>
                                        <option value="Hà Nam" title="Hà Nam">Hà Nam</option>
                                        <option value="An Giang" title="An Giang">An Giang</option>
                                        <option value="Bà Rịa-Vũng Tàu" title="Bà Rịa-Vũng Tàu">Bà Rịa-Vũng Tàu</option>
                                        <option value="Hà Tĩnh" title="Hà Tĩnh">Hà Tĩnh</option>
                                        <option value="Hải Dương" title="Hải Dương">Hải Dương</option>
                                        <option value="Hải Phòng" title="Hải Phòng">Hải Phòng</option>
                                        <option value="Hậu Giang" title="Hậu Giang">Hậu Giang</option>
                                        <option value="Hòa Bình" title="Hòa Bình">Hòa Bình</option>
                                        <option value="Bạc Liêu" title="Bạc Liêu">Bạc Liêu</option>
                                        <option value="Hưng Yên" title="Hưng Yên">Hưng Yên</option>
                                        <option value="Khánh Hoà" title="Khánh Hoà">Khánh Hoà</option>
                                        <option value="Kiên Giang" title="Kiên Giang">Kiên Giang</option>
                                        <option value="Kon Tum" title="Kon Tum">Kon Tum</option>
                                        <option value="Lai Châu" title="Lai Châu">Lai Châu</option>
                                        <option value="Lạng Sơn" title="Lạng Sơn">Lạng Sơn</option>
                                        <option value="Lào Cai" title="Lào Cai">Lào Cai</option>
                                        <option value="Lâm Đồng" title="Lâm Đồng">Lâm Đồng</option>
                                        <option value="Long An" title="Long An">Long An</option>
                                        <option value="Nam Định" title="Nam Định">Nam Định</option>
                                        <option value="Nghệ An" title="Nghệ An">Nghệ An</option>
                                        <option value="Ninh Bình" title="Ninh Bình">Ninh Bình</option>
                                        <option value="Ninh Thuận" title="Ninh Thuận">Ninh Thuận</option>
                                        <option value="Phú Thọ" title="Phú Thọ">Phú Thọ</option>
                                        <option value="Phú Yên" title="Phú Yên">Phú Yên</option>
                                        <option value="Quảng Bình" title="Quảng Bình">Quảng Bình</option>
                                        <option value="Quảng Nam" title="Quảng Nam">Quảng Nam</option>
                                        <option value="Quảng Ngãi" title="Quảng Ngãi">Quảng Ngãi</option>
                                        <option value="Quảng Ninh" title="Quảng Ninh">Quảng Ninh</option>
                                        <option value="Quảng Trị" title="Quảng Trị">Quảng Trị</option>
                                        <option value="Sóc Trăng" title="Sóc Trăng">Sóc Trăng</option>
                                        <option value="Sơn La" title="Sơn La">Sơn La</option>
                                        <option value="Tây Ninh" title="Tây Ninh">Tây Ninh</option>
                                        <option value="Thái Bình" title="Thái Bình">Thái Bình</option>
                                        <option value="Thái Nguyên" title="Thái Nguyên">Thái Nguyên</option>
                                        <option value="Thanh Hoá" title="Thanh Hoá">Thanh Hoá</option>
                                        <option value="Thừa Thiên-Huế" title="Thừa Thiên Huế">Thừa Thiên-Huế</option>
                                        <option value="Tiền Giang" title="Tiền Giang">Tiền Giang</option>
                                        <option value="Trà Vinh" title="Trà Vinh">Trà Vinh</option>
                                        <option value="Tuyên Quang" title="Tuyên Quang">Tuyên Quang</option>
                                        <option value="Vĩnh Long" title="Vĩnh Long">Vĩnh Long</option>
                                        <option value="Vĩnh Phúc" title="Vĩnh Phúc">Vĩnh Phúc</option>
                                        <option value="Yên Bái" title="Yên Bái">Yên Bái</option>
                                    </select>
                                </div>
                                    <div class="cart_ptnh">
                                        <p><strong>Giao hàng : + 20.000 VND</strong></p>
                                        <p style="font-style:italic">(Nhận hàng trong 1-2 giờ)</p>
                                    </div>
                                </div>
                                <label><input name="type1" value="Company1" type="radio">Nhận tại cửa hàng</label>
                                <div id="Company_box1" class="tab-contentcart1"> </div>
                            </div>
                        </div>
                    </div>
                    <!-- /col1 -->
                    <div class="col2cart box_grcart">
                        <h2 class="info-customer">Phương thức thanh toán</h2>
                        <div class="container_tabs">
                            <div class="tabsradio">
                                <label>
                                    <input type="radio" name="type" value="Individual" id="type_0" checked="checked" /> Thanh toán khi nhận hàng
                                </label>
                                <label>
                                    <input type="radio" name="type" value="Company" id="type_1" /> Chuyển khoản (thẻ ATM hoặc Internet Banking)
                                </label>
                                <label>
                                    <input type="radio" name="type" value="Company" id="type_2" /> Thanh toán qua
                                </label>
                            </div>
                            <div id="Company_box" class="tab-contentcart">
                                <div class="w_cttabs">
                                    Bạn vui lòng chuyển tiền tới tài khoản sau:
                                    <div class="item_cttabs">
                                        <strong>Ngân hàng Agribank (Huế)</strong>
                                        <p>Tên tài khoản: Phan Văn Quí</p>
                                        <p>Số tài khoản: 01234567899876</p>
                                    </div>
                                </div>
                            </div>
                            <div id="Company_box" class="tab-contentcart">
                                <div class="w_cttabs">
                                    Bạn vui lòng chuyển tiền tới tài khoản sau:
                                    <div class="item_cttabs">
                                        <strong>Ngân hàng Agribank (Huế)</strong>
                                        <p>Tên tài khoản: Phan Văn Quí</p>
                                        <p>Số tài khoản: 01234567899876</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- container -->
                        <div class="form_gr">
                            <label>Ghi chú</label>
                            <textarea class="input-text" name="message" placeholder="Yêu cầu đặc biệt của bạn. Ví dụ: Giao hàng trong giờ hành chính, người nhận hàng thay,..." rows="3" required=""></textarea>
                        </div>
                        <button class="btn_cartgr1" type="submit">Hoàn tất mua hàng</button>
                    </div>
                    <!-- /col2 -->
                </form>
                <form action="<?php echo base_url('cart/update')?>" method="post">
                    <div class="col3cart box_grcart">
                        <h2 class="info-customer">Thông tin đơn hàng</h2>
                        <?php $total_amount = 0;?>
                        <?php if(count($carts) > 0):?>
                            <?php foreach ($carts as $row) : ?>
                        <?php $total_amount = $total_amount + $row['subtotal']?>
                        <div class="dh012_w">
                            <div class="img_dh0112">
                                <img src="<?php echo $row['image_link']?>" alt="<?php echo $row['slug']?>">
                            </div>
                            <div class="txt_dh0112">
                                <p><strong>Tên sách:&nbsp;</strong> <?php echo $row['name']?></p>
                                <p><strong>Tác giả:&nbsp;</strong> <?php echo $row['tac_gia']?></p>
                                <p><strong>Xuất bản:&nbsp;</strong> <?php echo $row['xuat_ban']?></p>
                                <p><strong>Nhà xuất bản:&nbsp;</strong> <?php echo $row['nxb']?></p>
                                <p><strong>Nhà phát hành:&nbsp;</strong> <?php echo $row['nph']?></p>
                                <p><strong>Khối lượng:&nbsp;</strong> <?php echo $row['khoi_luong']?></p>
                                <p><strong>Số trang:&nbsp;</strong> <?php echo $row['so_trang']?></p>
                                <p><strong>Đơn giá:&nbsp;</strong> <?php echo number_format($row['price'])?> vnđ</p>
                                <p style="height: 34px;" ><strong style="float: left; padding-top: 6px">Số lượng:</strong>
                                    <input type="text" name="qty_<?php echo $row['id']?>" id="<?php echo $row['rowid']?>" placeholder="" value="<?php echo $row['qty']?>" class="qty_cart form-control w_50" id="number" size="5" style="float: left; margin-left: 5px" />
                                </p>
                                <a href="<?php echo base_url('cart/delete/'.$row['id'])?>" class="btn_cartgr1"><strong>Xóa sản phẩm</strong></a>
                            </div>
                        </div>
                            <?php endforeach;?>
                        <?php endif;?>
                        <div class="gr_btnform3011">
                            <div class="gr_sumform">
                                <p><strong>Tổng tiền:</strong><span><?php echo number_format($total_amount)?> vnđ</span></p>
                            </div>
                            <div class="btnform3011_gr">
                                <a href="<?php echo base_url()?>" class="btnform3011_1 btn_cartgr">Tiếp tục mua hàng</a>
                                <button class="btn_cartgr" type="submit">Cập nhật đơn hàng</button>
                                <a href="<?php echo base_url('cart/delete')?>" class="btn_cartgr">Xóa hết</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <script language="javascript">
                $(document).ready(function(){
                    $(".qty_cart").change(function(){
                        var rowid = $(this).attr('id');
                        var qty = $(this).parent().find('.qty_cart').val();
                        $.ajax({
                            url : "<?php echo base_url('cart/update')?>",
                            type : "post",
                            dateType:"text",
                            data : {
                                "rowid":rowid,"qty":qty
                            },
                            success : function (result){
                                $('.wrapper').html(result);
                            }
                        });
                        init_reload();
                        function init_reload(){
                            setInterval( function() {
                                window.location.reload();
                            },500);
                        }
                    });
                });
            </script>
            <?php else:?>
                <h4 style="color: red; margin:10px 160px; text-align: center; line-height: 24px">Không có sản phẩm nào trong giỏ hàng vui lòng quay lại trang chủ để thêm sản phẩm vào giỏ hàng</h4>
            <?php endif;?>
        </div>
    </div>