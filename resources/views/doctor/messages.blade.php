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
        <div class=" white-3 settings ">
            <div class="clearfix">
                <div class="col-md-4">
                    <h1><i class="fas fa-envelope "></i>messages</h1>
                </div>

            </div>
        </div>
        <div class="white-3">
            <table class="table table-striped w-auto mt00">
                
                <!--Table head-->
                <thead>
                    <tr>
                        <th>sender name</th>
                        <th>message title</th>
                        <th>date / time</th>
                    </tr>
                </thead>
                <!--Table head-->

                <!--Table body-->
                <tbody>
                    @if(isset($messages))
                        @foreach ($messages as $msg)
                            <tr class="table-info">
                                <th scope="row"><?php echo getSenderName($msg->patient_id)->fullname ;  ?></th>
                                <td><a href="/doctor/message-body/{{$msg->id}}">{{$msg->title}}</a></td>
                                <td>{{$msg->created_at}}</td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
                <!--Table body-->


            </table>
            <!--Table-->

        </div>














    </div>
</div>














</div>
</div>















<!-- end tabs section -->

<!-- JS
============================================ -->


<script>
    [{
            supported: 'Symbol' in window,
            fill: 'https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.6.15/browser-polyfill.min.js'
        },
        {
            supported: 'Promise' in window,
            fill: 'https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js'
        },
        {
            supported: 'fetch' in window,
            fill: 'https://cdn.jsdelivr.net/npm/fetch-polyfill@0.8.2/fetch.min.js'
        },
        {
            supported: 'CustomEvent' in window && 'log10' in Math && 'sign' in Math && 'assign' in Object && 'from' in
                Array && ['find', 'findIndex', 'some', 'includes'].reduce(function (previous, prop) {
                    return (prop in Array.prototype) ? previous : false;
                }, true),
            fill: 'https://unpkg.com/filepond-polyfill/dist/filepond-polyfill.js'
        }
    ].forEach(function (p) {
        if (p.supported) return;
        document.write('<script src="' + p.fill + '"><\/script>');
    });

</script>
<script src="js/filepond.js"></script>

<script>
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[type="file"]');

    // Create the FilePond instance
    const pond = FilePond.create(inputElement, {
        allowMultiple: true,
        allowReorder: true,
        allowRemove: false
    });

    // Easy console access for testing purposes
    window.pond = pond;

</script>

<script>
    $('input[type="button"]').click(function (e) {
        $(this).closest('tr').remove()
    })

</script>
<script>
    $('#addInputs-4').click(function () {
        var zzz = $(
            ' <div class="row"><div class="col-md-4"><label for="exampleInputEmail1"> state</label><select class="form-control"><option >giza</option><option >alexandria</option><option >daqahlya</option><option  selected>cairo</option></select></div><div class="col-md-4"><label for="exampleInputEmail1"> city</label><select class="form-control"><option >mansoura</option><option >belqas</option><option >mahalla</option><option  selected>tanta</option></select></div></div><div class="row"><div class="col-md-8"><input type="email" class="form-control width" id="exampleInputEmail1" placeholder=" address"></div></div>'
        );
        $('#inputList-4').append(zzz);


    });

</script>
<script>
    $('#addInputs-2').click(function () {
        var zzz = $(
            '  <div class="row repeat"><div class="col-md-4"><input type="email" class="form-control" id="exampleInputEmail1" placeholder=" title"></div><div class="col-md-4"><input type="email" class="form-control" id="exampleInputEmail1" placeholder=" price"></div></div> '
        );
        $('#inputList-2').append(zzz);


    });

</script>

<script>
    $('#addInputs-3').click(function () {
        var zzz = $(
            '   <div class="row repeat"><div class="col-md-4"><input type="text" class="form-control" id="example" ></div><div class="col-md-2"><div class="input-group clockpicker"><input type="text" class="form-control" value="09:30"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div></div><div class="col-md-2"><div class="input-group clockpicker"><input type="text" class="form-control" value="09:30"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span></div></div></div> '
        );
        $('#inputList-3').append(zzz);


    });

</script>
<script src="js/quill.active.js"></script>
<script src="js/quill.min.js"></script>
<script>
    var quill = new Quill('.quill', {
        theme: 'snow'
    });

</script>
<script src="js/the-datepicker.js"></script>
<script>
    (function () {
        const input = document.getElementById('example');
        const datepicker = new TheDatepicker.Datepicker(input);
        datepicker.render();
    })();

</script>
<script>
    (function () {
        const input = document.getElementById('example-2');
        const datepicker = new TheDatepicker.Datepicker(input);
        datepicker.render();
    })();

</script>
<script>
    try {
        fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", {
            method: 'HEAD',
            mode: 'no-cors'
        })).then(function (response) {
            return true;
        }).catch(function (e) {
            var carbonScript = document.createElement("script");
            carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CE7DC2JW&placement=wwwcssscriptcom";
            carbonScript.id = "_carbonads_js";
            document.getElementById("carbon-block").appendChild(carbonScript);
        });
    } catch (error) {
        console.log(error);
    }

</script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-46156385-1', 'cssscript.com');
    ga('send', 'pageview');

</script>


<script type="text/javascript" src="js/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript">
    $('.clockpicker').clockpicker()
        .find('input').change(function () {
            console.log(this.value);
        });
    var input = $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });

    $('.clockpicker-with-callbacks').clockpicker({
            donetext: 'Done',
            init: function () {
                console.log("colorpicker initiated");
            },
            beforeShow: function () {
                console.log("before show");
            },
            afterShow: function () {
                console.log("after show");
            },
            beforeHide: function () {
                console.log("before hide");
            },
            afterHide: function () {
                console.log("after hide");
            },
            beforeHourSelect: function () {
                console.log("before hour selected");
            },
            afterHourSelect: function () {
                console.log("after hour selected");
            },
            beforeDone: function () {
                console.log("before done");
            },
            afterDone: function () {
                console.log("after done");
            }
        })
        .find('input').change(function () {
            console.log(this.value);
        });

    // Manually toggle to the minutes view
    $('#check-minutes').click(function (e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show')
            .clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }

</script>
@endsection
