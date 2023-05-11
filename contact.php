
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/styles.css">

    <title>Liên hệ</title>
</head>
<body>
    <section>
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-9">
                    <hr>
                    <div class="row">
                        <div class="col-md-2">
                            <a href="index.php" class="btn btn-success">Trang chủ</a>
                        </div>
                        <div class="col-md-8">
                        <h3 class="text-center myTitle">Liên hệ với chúng tôi!</h3>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                    <hr>
                    <p>Chúng tôi mong muốn lắng nghe từ bạn. Hãy liên hệ với chúng tôi và một thành viên của chúng tôi sẽ
                        liên lạc với bạn trong thời gian sớm nhất. Chúng tôi yêu thích việc nhận được email của bạn mỗi ngày
                        <em>mỗi ngày</em>.</p>
                    <form>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Tên của bạn</label>
                            <div class="col-sm-10 form-control-lg">
                                <input type="text" placeholder="Tên của bạn" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email của bạn</label>
                            <div class="col-sm-10 form-control-lg">
                                <input type="email" placeholder="Email của bạn" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nội dung</label>
                            <div class="col-sm-10 form-control-lg">
                                <textarea rows="3"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3">
                    <h5 class="myTitle">Bản đồ</h5>
                    <p>
                        <a href="#">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62860.63928560475!2d105.71637042356998!3d10.034184408540408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0629f6de3edb7%3A0x527f09dbfb20b659!2zQ-G6p24gVGjGoSwgTmluaCBLaeG7gXUsIEPhuqduIFRoxqEsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1681404236107!5m2!1svi!2s"
                                width="250" height="200" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe> <br />
                        </a>
                        <br />
                        <a href="#">Xem bản đồ</a>
                    </p>
                    <p>
                        Đại chỉ 1.
                        <br /> Địa chỉ 2.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <br>
    <hr>
</body>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
<?php
include 'inc/footer.php';

?>