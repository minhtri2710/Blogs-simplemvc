 <!-- Main Container -->
  
  <section class="main-container col2-right-layout bounceInUp animated">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-9">
          <div class="page-title">
            <h2>Bài Viết</h2>
          </div>
          <div class="blog-wrapper" id="main">
            <div class="site-content" id="primary">
              <div role="main" id="content">
                <?php foreach ($data as $key => $value): ?>
                  <article class="blog_entry clearfix">
                    <header class="blog_entry-header clearfix">
                      <div class="blog_entry-header-inner">
                        <h2 class="blog_entry-title"> <a rel="bookmark" href="index.php?c=blog&m=detail&id=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a> </h2>
                      </div>
                      <!--blog_entry-header-inner--> 
                    </header>
                    <div class="entry-content">
                      <div class="featured-thumb"><a href="index.php?c=blog&m=detail&id=<?php echo $value['id']; ?>"><img src="images/<?php echo $value['url_image']; ?>" alt="Ảnh Bài Viết"></a></div>
                      <div class="entry-content">
                        <?php echo $value['description']; ?>
                      </div>
                      <p> <a class="btn"  href="index.php?c=blog&m=detail&id=<?php echo $value['id']; ?>">Đọc Thêm</a> </p>
                    </div>
                    <footer class="entry-meta"> Bài viết đăng vào ngày 
                      <time datetime="<?php echo $data['created']; ?>" class="entry-date"><?php echo $value['created']; ?></time>
                    </footer>
                  </article>
                <?php endforeach ?>
              </div>
            </div>
            <div class="pager">
                <?php echo $page; ?>
            </div>
          </div>
        </div>
        <aside class="col-right sidebar col-sm-3">
          <div role="complementary" class="widget_wrapper13" id="secondary">
            <div class="popular-posts widget widget__sidebar" id="recent-posts-4">
              <h3 class="widget-title">Xem Nhiều</h3>
              <div class="widget-content">
                <ul class="posts-list unstyled clearfix">
                  <?php foreach ($news_most as $key => $value): ?>
                    <li>
                      <figure class="featured-thumb"> <a href="index.php?c=blog&m=detail&id=<?php echo $value['id']; ?>"> <img width="80" height="53" alt="Ảnh Bài Viết" src="images/<?php echo $value['url_image']; ?>"> </a> </figure>
                      <!--featured-thumb-->
                      <h4><a title="<?php echo $value['title']; ?>" href="index.php?c=blog&m=detail&id=<?php echo $value['id']; ?>"><?php echo $value['title']; ?></a></h4>
                      <p class="post-meta"><i class="icon-calendar"></i>
                        <time datetime="<?php echo $value['created']; ?>" class="entry-date"><?php echo $value['created']; ?></time>
                        .</p>
                    </li>
                  <?php endforeach ?>
                </ul>
              </div>
              <!--widget-content--> 
            </div>
          </div>
        </aside>
      </div>
    </div>
  </section>
  <!-- Main Container End --> 