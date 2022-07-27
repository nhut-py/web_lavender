<?php
$title="Liên Hệ";
$link="css/contact.css";
include 'inc/header_full.php';
?>
            <article>
                <!-- form liên hệ -->
                <div class="form">
                    <form action="" onsubmit="return kiem_tra()">
                        <h1 style="color: #283943 ;font-size: 37px;"> Liên hệ</h1>

                        <div class="form-group">
                            <label for="" class="fullname">Họ Và Tên</label>
                            <input type="text" name="fullname" id="fullname" placeholder="VD: Phan Minh Nhựt" onkeyup="kiem_tra()" required>
                            <span class="form-massage"></span>
                        </div>
                        <!--form-group-->

                        <div class="form-group">
                            <label for="" class="enail">Email</label>
                            <input type="email" name="email" id="email" placeholder="VD:nhutnhut.pip@gmail.com" onkeyup="kiem_tra()" required>
                            <span class="form-massage"></span>
                        </div>
                        <!--form-group-->

                        <div class="form-group">
                            <label for="" class="sex">Giới Tính</label>
                            <div class="boc">
                                <input type="radio" name="sex" id="nam" onclick="kiem_tra()"><label for="nam">
                                    Nam</label>
                                <input type="radio" name="sex" id="nu" onclick="kiem_tra()"><label for="nu"> Nữ</label>
                            </div>
                            <!--bọc-->
                            <span class="form-massage"></span>
                        </div>
                        <!--form-group-->

                        <div class="form-group">
                            <!--bọc-->
                            <span class="form-massage"></span>
                        </div>

                        <div class="form-group">
                            <label for="" class="">Quốc Gia</label>

                            <select name="quocTich" id="quocTich" name="TenDanhSach">
                                <option value="">Chọn Quốc Gia</option>
                                <option value="1">Lào</option>
                                <option value="2">Việt nam</option>

                                <option value="3">Thái Lan</option>
                                <option value="4">Singapo</option>
                                <option value="5">Campuchia</option>
                                <option value="6">Angola</option>
                                <option value="7">Japan</option>
                                <option value="8">Koria</option>
                                <option value="9">Hong Kong</option>
                                <option value="10">TaiWan</option>
                                <option value="11">Russia</option>
                                <option value="12">Dubai</option>
                            </select>

                            <span class="form-massage"></span>
                        </div>
                        <!--form-group-->


                        <div class="form-group">
                            <label for="" class="ghi-chu">Ghi Chú</label>
                            <textarea name="note" id="note" cols="20" rows="4" style="border: 1px solid #d6d6d6;" placeholder="ghi chú không quá 200 ký tự"></textarea>
                            <span class="form-massage"></span>
                        </div>
                        <button class="bt-submit">Gửi Thông Tin</button>
                        <span class="dk_thanhcong" style="display: none;"> Đăng Ký Thành Công</span>
                    </form>
                </div>           
            </article>

            <!-- aside bar -->
            <aside>
                <!-- side bar -->
                <?php include_once 'inc/sidebar.php' ?>
            </aside>
 <?php
    include 'inc/footer_full.php';
 ?>