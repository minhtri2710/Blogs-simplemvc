<!-- Main Container -->
<div class="main-container col2-right-layout bounceInUp animated">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-9">
        <div class="page-title">
          <h2>Bài Viết</h2>
        </div>
        <div class="blog-wrapper" id="main">
          <div class="site-content" id="primary">
            <div role="main" id="content">
              <article class="blog_entry clearfix" >
                <header class="blog_entry-header clearfix">
                  <div class="blog_entry-header-inner">
                    <h2 class="blog_entry-title"><?php echo $data['title']; ?></h2>
                  </div>
                  <!--blog_entry-header-inner--> 
                </header>
                <!--blog_entry-header clearfix-->
                <div class="entry-content">
                  <div class="featured-thumb"><a href="#"><img alt="Ảnh Bài Viết" src="images/<?php echo $data['url_image']; ?>"></a></div>
                  <div class="entry-content">
                    <?php echo $data['content']; ?>
                  </div>
                </div>
                <footer class="entry-meta"> Bài viết này đăng vào
                  <time datetime="<?php echo $data['created']; ?>" class="entry-date"><?php echo $data['created']; ?></time>
                </footer>
              </article>
            </div>
          </div>
        </div>
      </div>
      <aside class="col-right sidebar col-sm-3">
        <div role="complementary" class="widget_wrapper13" id="secondary">
          <div class="popular-posts widget widget__sidebar" id="recent-posts-4">
            <h3 class="widget-title">Xem nhiều nhất</h3>
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
</div>
<!-- Main Container End -->