@extends('welcome')
@section('content')
<div>
	<div class="breadcrumbs position-relative pl-4 pr-4 pt-4 pb-4 lazy_bg loaded">
		<div class="inner position-relative text-center">
			<h1 class="cat-heading d-none d-md-block">Tin tức</h1>
			<ul class="breadcrumb align-items-center justify-content-center m-0">
				<!-- <li class="home">
                        <a href="/" title="Mew BS">Trang chủ</a>						
                        <img src="#" alt="Mew BS">
                    </li>
                    <li>
                        <a href="#">Sách kĩ năng sống</a>						
                        <img src="#" alt="Mew BS">
                    </li> -->
				<li class="font-weight-bold"><span>Tin tức</span></li>
				<li>
				</li>
			</ul>
		</div>
	</div>


	<div class="main container blogs col-12">
		<div class="row">
			<div class="col-main col-md-8 col-12 p-3 p-md-4">
				<article class="blog_entry clearfix">
					<div class="entry-content text-justify rte">
						@foreach($news as $key => $value)
						<?php
						echo $value->Description;
						?>
						@endforeach
						</div>
				</article>
			</div>
			<aside class="sidebar col-md-4 col-12 p-3 p-md-4">
				<!-- <div class="widget_b mb-3">

					<a href="/tin-tuc" title="Bài viết liên quan: ">
						<h3 class="widget-title">Bài viết liên quan: </h3>
					</a>
					<div class="widget-content latest-blog">





						<div class="item_bl mt-2 mb-2">
							<h3 class="title_blo"><a href="/review-sach-vo-cung-tan-nhan-vo-cung-yeu-thuong" title="Review sách Vô cùng tàn nhẫn vô cùng yêu thương">Review sách Vô cùng tàn nhẫn vô cùng yêu thương</a></h3>
						</div>



						<div class="item_bl mt-2 mb-2">
							<h3 class="title_blo"><a href="/review-sach-luat-hap-dan-bi-mat-toi-cao" title="Review sách Luật hấp dẫn bí mật tối cao">Review sách Luật hấp dẫn bí mật tối cao</a></h3>
						</div>



						<div class="item_bl mt-2 mb-2">
							<h3 class="title_blo"><a href="/review-sach-binh-tinh-khi-e-manh-me-khi-yeu-all-the-rules" title="Review sách Bình tĩnh khi ế, mạnh mẽ khi yêu - All The Rules">Review sách Bình tĩnh khi ế, mạnh mẽ khi yêu - All The Rules</a></h3>
						</div>



						<div class="item_bl mt-2 mb-2">
							<h3 class="title_blo"><a href="/an-mang-muoi-mot-chu-higashino-keigo" title="Án mạng mười một chữ: Higashino Keigo">Án mạng mười một chữ: Higashino Keigo</a></h3>
						</div>



						<div class="item_bl mt-2 mb-2">
							<h3 class="title_blo"><a href="/cuong-vong-phi-nhan-tinh" title="Cuồng vọng phi nhân tính">Cuồng vọng phi nhân tính</a></h3>
						</div>


					</div>

				</div> -->
				<div class="widget_b mb-3">
					<a href="#" title="Mew BS">
						<img alt="Mew BS" src="//bizweb.dktcdn.net/100/415/471/themes/804607/assets/bn_article.png?1638811310335" width="100%">
					</a>
				</div>

				<div class="comment-content widget_b" id="comments">
					<div class="comments-wrapper">
						<h3 class="widget-title"> Bình luận </h3>

						<div class="media mb-2">
							<img class="mr-3 align-self-start" width="60" height="60" alt="avatar" src="https://www.gravatar.com/avatar/799f6f9e787a3a5e032f9c2d518279e0?d=identicon&amp;s=60">
							<div class="media-body">
								<h5 class="mt-0 mb-0 small font-weight-bold">Nguyen Lanh</h5>
								<span class="d-block small font-italic">28/04/2021</span>
								hiiiiiiiiiiiiiiiiii
							</div>
						</div>



					</div>

					<div class="comments-form-wrapper clearfix">
						<h3 id="add-comment-title" class="widget-title">Viết bình luận</h3>

						<form accept-charset="utf-8" action="/posts/review-sach-xa-ngoai-kia-noi-loai-tom-hat-cua-delia-owens/comments" id="article_comments" method="post" class="comment-form">
							<input name="FormType" type="hidden" value="article_comments">
							<input name="utf8" type="hidden" value="true">

							<div class="row">
								<div class="col-12 form-group">
									<input type="text" class="form-control" placeholder="Tên*" title="Tên" id="user" name="Author" value="">
								</div>
								<div class="col-12 form-group">
									<input class="form-control" title="Email" id="email" type="email" placeholder="Email*" name="Email" value="">
								</div>
							</div>
							<div class="field aw-blog-comment-area form-group">
								<textarea rows="5" cols="50" class="form-control" title="Bình luận" placeholder="Bình luận*" id="comment" name="Body"></textarea>
							</div>
							<div style="width:96%" class="button-set">
								<input type="hidden" value="1" name="blog_id">
								<button type="submit" class="book-submit btn btn-primary text-center d-flex align-items-center font-weight-boldt">Gửi bình luận</button>
							</div>
						</form>
					</div>
				</div>

			</aside>
		</div>

	</div>
</div>
</div>

@endsection