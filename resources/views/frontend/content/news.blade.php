<div class="include-allwrapper-news">
    <div class="all-wrapper-news container">
        <div class="aligncenter border-title type3 ">
            <h2>Tin tức</h2>
        </div>
        <div class="dt-sc-margin65"></div>

        <div class="slick_carousels row">
            @foreach ($news as $val)
                <div class="component__carousel-item col-md-3">
                    <article
                        class="blog-post post-21 post type-post status-publish format-quote has-post-thumbnail hentry category-ink-paint tag-realism post_format-post-format-quote">

                        <div class="entry-thumb-meta">
                            <div class="entry-thumb">
                                <a href="#" title="Ideas For Kitchen Renovation"><img width="1170" height="800"
                                        src="assets/image/img_news/{{ $val['image'] }}"
                                        class="attachment-painting-1170x800 size-painting-1170x800 wp-post-image" alt=""
                                        loading="lazy" sizes="(max-width: 1170px) 100vw, 1170px"></a>
                                <div class="blog-overlay"><a
                                        href="https://dtpainting.wpengine.com/ideas-for-kitchen-renovation/"
                                        title="Ideas For Kitchen Renovation" class="entry_format"></a></div>
                            </div>
                        </div>
                        <div class="entry-detail">
                            <div class="entry-title">
                                <h4><a href="#" title="Ideas For Kitchen Renovation">{{ $val['title'] }}</a></h4>
                            </div>
                            <div class="entry-body">
                                <p>Painting has been the industry's standard dummy text ever since the 1500s, when
                                    an...</p>
                            </div>
                            <div class="entry-meta">
                                <div class="date">
                                    <i class="fas fa-clock"></i> {{ $val['created_at'] }}
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            @endforeach
        </div>
    </div>
</div>
</body>

</html>
