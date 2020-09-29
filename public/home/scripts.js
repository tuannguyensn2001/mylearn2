$(document).ready(function(){

    function hightlight(){
        let child = document.querySelectorAll('.child-lesson');
        let slug=window.location.href.split('/')[5];
        child.forEach(item=>{
           let class_current=item.className;
           if (class_current.includes(slug)) item.classList.add('active-lesson');
        })
    }
    hightlight();

    $('.menu').click(function(){
        $('.responsive-lesson').removeClass('menu-active');
        $('.menu-lesson').removeClass('menu-content-active');
        $('.menu').removeClass('menu-active');
        $(this).addClass('menu-active');
        $('.menu-content').removeClass('menu-content-active');
        $('.menu-content-'+$(this).attr('number-menu')).addClass('menu-content-active');

    })
    $('.responsive-lesson').click(function(){
        $('.menu').removeClass('menu-active');
        $(this).addClass('menu-active');
        $('.menu-content').removeClass('menu-content-active');
        $('.menu-lesson').addClass('menu-content-active');
    })
    $("input").focus(function(){
        $(".wrapper-my-comment-action").css('display','block');
    })
    // $("input").blur(function(){
    //     $(".wrapper-my-comment-action").css('display','none');
    // })
    $(".my-comment-cancel").click(function(){
        $('.wrapper-my-comment-action').css('display','none');

    })
    $('.my-comment-comment').click(function(){

        let comment=$("input[name='comment']").val();
        let lesson_id=$("input[name='lesson_id']").val();

        $.ajax({
            url: '/khoa-hoc/binh-luan',
            type: 'post',
            data:{
                lesson_id,comment
            },
            success:function(data){
                    $("input[name='comment']").val('');
                    let first = document.querySelector(".other-comment");
                    let element=` <div class="other-comment d-flex">
                                        <img src="${data['avatar']}" alt="">
                                        <div>
                                            <div>
                                                <div class="other-comment-username"><p>${data['name']}</p></div>
                                                <div class="other-comment-comment"><p>${comment}</p></div>
                                            </div>
                                        </div>
                                    </div>`;
            $(".comment").prepend(element);

            }
        })

    })
    $('.hide-list-lesson').click(function(event){
        event.preventDefault();
        $(this).css('display','none');

        $('.responsive-lesson').addClass('lesson-active');
        $('.btn-direction').addClass('hide');
        $('.menu-lesson').css('display','none');
        $('.content').addClass('col-lg-12');
        $('video').css('width','100%')
        $('.show-list-lesson').css('display','block');
        $('.section-course').css('margin-left','40px');
        $('.menu').removeClass('menu-active');
        $('.responsive-lesson').addClass('menu-active');
        $('.menu-content').removeClass('menu-content-active');
        $('.menu-lesson').addClass('menu-content-active');
        $('.menu-lesson').addClass('col-lg-8')
        $('.menu-lesson').css('margin-left','127px');
    })
    $('.show-list-lesson').click(function(event){
        event.preventDefault();
        $('.menu-main').addClass('menu-active');
        $('.menu-content-1').addClass('menu-content-active');
        $('.hide-list-lesson').css('display','block');
        $('.btn-direction').removeClass('hide');
        $('.menu-lesson').css('display','block');
        $('iframe').css('height','700');
        $('.content').removeClass('col-lg-12');
        $('.responsive-lesson').removeClass('menu-active lesson-active');
        $('.menu-lesson').css('margin-left','0');
        $('.menu-lesson').removeClass('col-lg-8');
        $('.show-list-lesson').css('display','none');
        $('.section-course').css('margin-left','20px');
    })
    $('.child-lesson').click(function(){
        let base_url=window.location.origin;
        let url=$(this).attr('data-text');
        window.location.href=window.location.origin+'/khoa-hoc/'+url;
        // console.log(window.location.origin+'/khoa-hoc/'+url);
    })
})
