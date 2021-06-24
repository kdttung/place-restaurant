<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sua Địa điểm</title>
	<link rel="stylesheet" type="text/css" href="{{asset('CSS/Admim/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('CSS/Admim/css/datepicker3.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('CSS/Admim/css/styles.css')}}">
	<script src="{{ asset('JS/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('JS/js/lumino.glyphs.js') }}"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Admin</a>
				<ul class="user-menu">
					<?php  
					if( Session::get('TenNVSS')!=null ){
						?>

						<li class="dropdown pull-right">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg>
								{{Session::get('TenNVSS')}}	
								<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">

									<li>
										<a href="{{URL::to('DangXuat')}}"> 
											<svg class="glyph stroked cancel">
												<use xlink:href="#stroked-cancel">
												</use>
											</svg>Đăng xuất</a>
										</li>
									</ul>
								</li>
							<?php  } ?>
						</ul>
					</div>

				</div><!-- /.container-fluid -->
			</nav>


			<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
				<ul class="nav menu">
					<li role="presentation" class="divider"></li>
					<li >

					</li>
					<li class="active">
						<a href="{{ URL('DSDiaDiem') }}">
							<svg class="glyph stroked calendar">
								<use xlink:href="#stroked-calendar">

								</use>
							</svg> Địa điểm
						</a>
					</li>
					<li>
						<a href="{{ URL('DSMonAn') }}">
							<svg class="glyph stroked line-graph">
								<use xlink:href="#stroked-line-graph">

								</use>
							</svg> Món ăn
						</a>
					</li>
					<li>
						<a href="{{ URL('Admim/TaiKhoan/DanhSach') }}">
							<svg class="glyph stroked male-user">
								<use xlink:href="#stroked-male-user"/>
							</svg> Tài khoản
						</a>
					</li>
					<li>
				<a href="{{ URL('QuanLyDon') }}">
					<svg class="glyph stroked male-user">
						<use xlink:href="#stroked-male-user"/>
					</svg> Quản lý đơn đặt
				</a>
			</li>
					<li role="presentation" class="divider"></li>
				</ul>
			</div><!--/.sidebar-->

			<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Địa Điểm</h1>
					</div>
				</div><!--/.row-->

				<div class="row">
					<div class="col-xs-12 col-md-12 col-lg-12">
						<div class="panel panel-primary">
							<div class="panel-heading">Sửa địa điểm</div>
							<div class="panel-body">
								@foreach ($DSDiaDiem as $key)
								<form action="{{url('DSDiaDiem/SuaDiaDiem')}}" method="post" enctype="multipart/form-data">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<input type="hidden" name="id_diadiem" value="{{$key->id_diadiem}}">
									<div class="row" style="margin-bottom:40px">
										<div class="col-xs-8">

											<img width="80px" src="{{ asset('/ANHDD/'.$key->avt_diadiem)}}" class="thumbnail">
											
											<div class="form-group" >
												<label>Tên Anh</label>
												<input required type="text" name="ten" class="form-control" value="{{$key->ten}}" >
											</div>
											
											<div class="form-group" >
												<label>Danh giá</label>
												<input required type="text" name="danhgia" class="form-control" value="{{$key->danhgia}}" >
											</div>
											<div class="form-group" >
												<label>Thể loại</label>
												<select required name="theloai" class="form-control">
													<option value="1">Đồ ăn</option>
													<option value="2">Nước uống</option>
													<option value="3">Ăn vặt</option>
												</select>
											</div>
											<div class="form-group" >
												<label>Anh</label>
												<input required type="text" name="avt_diadiem" class="form-control" value="{{$key->avt_diadiem}}" >
											</div>
											<div class="form-group" >
												<label>Địa Chỉ</label>
												<input required type="text" name="diachi" class="form-control" value="{{$key->diachi}}" >
											</div>
											<div class="form-group" >
												<label>Vùng</label>
												<input required type="text" name="vung" class="form-control" value="{{$key->vung}}">
											</div>
											<div class="form-group" >
												<label>Liên hệ</label>
												<input required type="text" name="lienhe" class="form-control"
												value="{{$key->lienhe}}"  >
											</div>
											<div class="form-group" >
												<label>Giờ mở cửa</label>
												<input required type="text" name="open" class="form-control"
												value="{{$key->open}}" >
											</div>
											<div class="form-group" >
												<label>Giờ đóng cửa</label>
												<input required type="text" name="close" class="form-control"
												value="{{$key->close}}" >
											</div>

											<div class="form-group" >
												<label>Bản đồ</label>
												<textarea rows="6" cols="97" required name="bando">{!!html_entity_decode($key->bando)!!}
												</textarea>
											</div>
											
											@endforeach
											<input type="submit" name="submit" value="Sua" class="btn btn-primary">
										</div>
									</div>

								</form>
							</div>
						</div>
					</div>
				</div><!--/.row-->
			</div>	<!--/.main-->
			<script src="js/jquery-1.11.1.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
			<script src="js/chart.min.js"></script>
			<script src="js/chart-data.js"></script>
			<script src="js/easypiechart.js"></script>
			<script src="js/easypiechart-data.js"></script>
			<script src="js/bootstrap-datepicker.js"></script>
			<script>
				$('#calendar').datepicker({
				});
				!function ($) {
					$(document).on("click","ul.nav li.parent > a > span.icon", function(){          
						$(this).find('em:first').toggleClass("glyphicon-minus");      
					}); 
					$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
				}(window.jQuery);

				$(window).on('resize', function () {
					if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
				})
				$(window).on('resize', function () {
					if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
				});
				function changeImg(input){
		    //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
		    if(input.files && input.files[0]){
		    	var reader = new FileReader();
		        //Sự kiện file đã được load vào website
		        reader.onload = function(e){
		            //Thay đổi đường dẫn ảnh
		            $('#avatar').attr('src',e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		$(document).ready(function() {
			$('#avatar').click(function(){
				$('#img').click();
			});
		});
	</script>	
</body>

</html>