<footer id="footer" class="footer-wrapper">
    <section class="section footer-block" id="section_1614445645">
        <div class="bg section-bg fill bg-fill  bg-loaded">
        </div><!-- .section-bg -->
        <div class="section-content relative">
            <div class="row" id="row-774230349">
                <div class="col medium-8 small-12 large-8">
                    <div class="col-inner text-left dark">
                        <h3>Thông tin liên hệ</h3>
                        <p>{!! $info['footer_contact']->value!!}</p>
                        <div class="social-icons follow-icons full-width text-left" style="font-size:77%">
                            <a href="#" target="_blank" data-label="Facebook" rel="nofollow"
                               class="icon primary button circle facebook tooltip"
                               title="Follow on Facebook">
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="mailto:#" data-label="E-mail" rel="nofollow"
                               class="icon primary button circle  email tooltip" title="Send us an email">
                                <i class="icon-envelop"></i>
                            </a>
                            <a href="tel:#" target="_blank" data-label="Phone" rel="nofollow"
                               class="icon primary button circle  phone tooltip" title="Call us">
                                <i class="icon-phone"></i>
                            </a>
                            <a href="#" target="_blank" rel="nofollow"
                               data-label="Pinterest" class="icon primary button circle  pinterest tooltip"
                               title="Follow on Pinterest">
                                <i class="icon-pinterest"></i>
                            </a>
                            <a href="#" target="_blank" rel="nofollow"
                               data-label="Google+"
                               class="icon primary button circle  google-plus tooltip"
                               title="Follow on Google+">
                                <i class="icon-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col medium-4 small-12 large-4">
                    <div class="col-inner dark">
                        <iframe src="{{ $info['footer_ggmap']->value}}"
                                width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div><!-- .section-content -->
    </section>
    <div class="absolute-footer dark medium-text-center small-text-center">
        <div class="container clearfix">
            <div class="footer-primary pull-left">
                <div class="copyright-footer">
                    <div style="padding-top: 15px"><strong>Copyright 2018 © <strong><a href="https://topweb.com.vn">Thiết
                                    kế website Hà Nội</a> bởi Topweb.com.vn</strong></div>
                </div>
            </div><!-- .left -->
        </div><!-- .container -->
    </div><!-- .absolute-footer -->
    <a href="#top" class="back-to-top button invert plain is-outline hide-for-medium icon circle fixed bottom z-1"
       id="top-link"><i class="icon-angle-up"></i></a>
</footer><!-- .footer-wrapper -->