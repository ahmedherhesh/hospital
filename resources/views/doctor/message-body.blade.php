<?php
    use Illuminate\Support\Facades\DB;
    function getSenderName($sender_id){
        $sender = Db::table('patients')->where([
            'id' => $sender_id
        ])->first();
        return $sender;
    }
?>
@extends('doctor.master')
@section('title')
<title>Document</title>
@endsection
@section('content')
<!-- start tabs section -->

<div class="clearfix tabs-section">
    {{ View::make('doctor.sidebar') }}
    <div class="col-md-10">
        {{ View::make('doctor.navbar') }}
        <div class="clearfix mt20">
            <div class="adv">
            </div>
        </div>

        <div class=" white-3  mb30 message">
            <div class="clearfix">
                <div class="col-md-8">
                    <h1><i class="far fa-edit"></i>message title :
                        <span>{{ isset($message)? $message->title : '' }}</span></h1>
                    <h1 class="mt0 pt10"><i class="fas fa-user-edit"></i>message sender :
                        <span><?php echo getSenderName($message->patient_id)->fullname ;  ?></span>
                    </h1>
                </div>
                <div class="col-md-4">
                    <h1><i class="fas fa-calendar-day"></i>date :
                        <span>{{ isset($message)? $message->created_at : '' }}</span>
                    </h1>
                </div>
            </div>
            <div class="clearfix">
                <p>{{ isset($message)? $message->content : '' }}</p>
                <button class="collapsed pull-right add-new mt-30 mb30 " data-toggle="collapse"
                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><a href="#" data-toggle="pill">reply</a></button>
            </div>
            <form action="{{route('reply_message')}}" method="post">
                @csrf
                <div id="collapseThree" class="clearfix edit collapse mb30" aria-labelledby="headingTwo"
                    data-parent="#accordion-3">
                    <div class="clearfix">
                        <div class="quill" id="editor"></div>
                        <input type="hidden"  name="content">
                        <input type="hidden"  name="patient_id" value="{{ isset($message)? $message->patient_id : '' }}">
                        <input type="hidden"  name="message_id" value="{{ isset($message)? $message->id : '' }}">
                        
                    </div>
                    <div class="clearfix">
                        <ul class="links mb30">
                            <li><button type="submit" class="preview">send</button></li>
                        </ul>
                    </div>
                </div>
            </form>

        </div>

    </div>

</div>

</div>

<script>
    var form = document.querySelector('form');
    form.onsubmit = function() {
        var content = document.querySelector('input[name=content]');
            content.value = editor.children[0].textContent;
    }
    //JSON.stringify(quill.getContents());
</script>
















<!-- end tabs section -->

<!-- JS
============================================ -->


<!-- Include all compiled plugins (below), or include individual files as needed -->

<script src="{{ asset('js/quill.active.js') }}"></script>
<script src="{{ asset('js/quill.min.js') }}"></script>
<script>
    var quill = new Quill('.quill', {
        theme: 'snow'
    });

</script>

<script>
    $(document).ready(function () {
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });
        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });
    });

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }

    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
    }

</script>
@endsection
