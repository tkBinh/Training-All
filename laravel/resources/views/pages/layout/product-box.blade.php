<section class="section product-bg @if($key % 3 == 0) green-bg @elseif($key % 3 == 1) blue-bg @else orange-bg @endif">
    <div class="bg section-bg fill bg-fill  bg-loaded">
    </div><!-- .section-bg -->
    <div class="product-box section-content relative">
        <div class="row row-small">
            @if ($key % 2 == 0)
                <div class="col medium-4 small-12 large-4" style="padding-bottom: 0px;" data-animate="fadeInRight">
                    <div class="col-inner">
                        <div class="img has-hover x md-x lg-x y md-y lg-y">
                            <div class="img-inner dark">
                                <img width="359" height="206"
                                     src="{{ $product->photo }}"
                                     class="lazy-load attachment-original size-original" alt=""
                                     sizes="(max-width: 359px) 100vw, 359px"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col medium-5 small-12 large-5" data-animate="fadeInDown">
                    <div class="col-inner dark">
                        <div class="item-cl">
                            <div class="image animated fadeInLeft wow animated">
                                {!! $product->content !!}
                            </div>
                        </div>
                        <div class="wow item-cl animated fadeInRight logo-brf animated">
                            <div class="bifr"></div>
                        </div>
                    </div>
                </div>
                <div class="col medium-3 small-12 large-3" data-animate="fadeInLeft">
                    <div class="col-inner text-right dark">
                        <p class="text-aligin-right">
                        <span class="title">
                            {!! $product->title !!}
                        </span>
                        </p>
                        <a href="#" target="_self" class="button white lowercase border-radius">
                            <span>Liên hệ tư vấn</span>
                        </a>
                    </div>
                </div>
            @else
                <div class="col medium-3 small-12 large-3" data-animate="fadeInLeft">
                    <div class="col-inner text-right dark">
                        <p class="text-aligin-right">
                        <span class="title">
                            {!! $product->title !!}
                        </span>
                        </p>
                        <a href="#" target="_self" class="button white lowercase border-radius">
                            <span>Liên hệ tư vấn</span>
                        </a>
                    </div>
                </div>
                <div class="col medium-5 small-12 large-5" data-animate="fadeInDown">
                    <div class="col-inner dark">
                        <div class="item-cl">
                            <div class="image animated fadeInLeft wow animated">
                                {!! $product->content !!}
                            </div>
                        </div>
                        <div class="wow item-cl animated fadeInRight logo-brf animated">
                            <div class="bifr"></div>
                        </div>
                    </div>
                </div>
                <div class="col medium-4 small-12 large-4" style="padding-bottom: 0px;" data-animate="fadeInRight">
                    <div class="col-inner">
                        <div class="img has-hover x md-x lg-x y md-y lg-y">
                            <div class="img-inner dark">
                                <img width="359" height="206"
                                     src="{{ $product->photo }}"
                                     class="lazy-load attachment-original size-original" alt=""
                                     sizes="(max-width: 359px) 100vw, 359px"/>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div><!-- .section-content -->
</section>