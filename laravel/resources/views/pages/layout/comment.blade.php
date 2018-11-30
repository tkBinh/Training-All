<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
    .red-start {
        color: red;
    }
    .message {
        color: white;
        border-radius: 5px;
    }
    .message-success {
        background-color: darkgreen;
    }
    .message-error {
        background-color: darkred;
    }
</style>
<div id="comments" class="comments-area">
    <div id="respond" class="comment-respond">
        <h3 id="reply-title" class="comment-reply-title">Trả lời
            <small><a rel="nofollow" id="cancel-comment-reply-link"
                      href=""
                      style="display:none;">Hủy</a></small>
        </h3>
        <form action="{{ route('add.comment') }}" method="post" id="commentform" class="comment-form">
            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            @if(count($errors) > 0)
                <div class="message message-error" style="color: white; padding: 15px;">
                    @foreach($errors->all() as $error)
                        {{$error}}
                        <br/>
                    @endforeach
                </div>
            @endif
            @if(\Illuminate\Support\Facades\Session::has('successComment'))
                <div class="message message-success" style="color: white; padding: 15px;">{{\Illuminate\Support\Facades\Session::get('successComment')
                }}</div>
            @endif
            <p class="comment-notes"><span id="email-notes">Email của bạn sẽ không được hiển thị công khai.</span>
                Các trường bắt buộc được đánh dấu <span class="required red-start">*</span></p>
            <p class="comment-form-comment">
                <label for="comment">Bình luận</label>
                <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525"></textarea>
            </p>
            <p class="comment-form-author">
                <label for="author">Tên <span class="required red-start">*</span></label>
                <input id="author" name="author" type="text" @if(Session::has('userName')) value="{{ session('userName') }}" @endif
                size="30" maxlength="245"/>
            </p>
            <p class="comment-form-email">
                <label for="email">Email <span class="required red-start">*</span></label>
                <input id="email" name="email" type="email" @if(Session::has('userEmail')) value="{{ session('userEmail') }}" @endif size="30" maxlength="100"
                       aria-describedby="email-notes" />
            </p>
            <p class="comment-form-url"><label for="url">Trang web</label>
                <input id="url" name="url" type="url"
                       @if(Session::has('userWebsite')) value="{{ session('userWebsite') }}" @endif size="30" maxlength="200"/>
            </p>
            <p class="comment-form-cookies-consent">
                <input id="wp-comment-cookies-consent"
                       name="saveInfo" type="checkbox" value="yes"/>
                <label for="wp-comment-cookies-consent">Lưu tên của tôi, email, và trang
                    web trong trình duyệt này cho lần bình luận kế tiếp của tôi.</label>
            </p>
            <input type='hidden' name='comment_post_ID' value='{{ $news->id }}' id='comment_post_ID' />
            <p class="form-submit">
                <input name="submit" type="submit" id="submit" class="submit" value="Phản hồi" />
            </p>
        </form>
    </div><!-- #respond -->
</div><!-- #comments -->
<script>
    $(document).ready(function () {
        if ($('.message').length >0) {
            $.scrollTo($('#comments'), 100);
        }
    })
</script>