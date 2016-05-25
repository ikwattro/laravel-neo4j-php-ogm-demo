<!DOCTYPE html>
<html>
    <head>
        <title>Bellavilla - @yield('title')</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <script type="text/javascript">
            var lastScrolled = 0;
            function getDocHeight() {
                var D = document;
                return Math.max(
                        D.body.scrollHeight, D.documentElement.scrollHeight,
                        D.body.offsetHeight, D.documentElement.offsetHeight,
                        D.body.clientHeight, D.documentElement.clientHeight
                );
            }

            function amountscrolled(){
                var winheight= window.innerHeight || (document.documentElement || document.body).clientHeight;
                var docheight = getDocHeight();
                var scrollTop = window.pageYOffset || (document.documentElement || document.body.parentNode || document.body).scrollTop;
                var trackLength = docheight - winheight;
                var pctScrolled = Math.floor(scrollTop/trackLength * 100); // gets percentage scrolled (ie: 80 or NaN if tracklength == 0)

                return pctScrolled;
            }

            window.addEventListener("scroll", function(){
                var pctScrolled = amountscrolled();
                if (pctScrolled - 10 > lastScrolled) {
                    lastScrolled = pctScrolled;
                    console.log(pctScrolled + '% scrolled');
                }
            }, false)
        </script>
        <script type="text/javascript">
            var _ycq = _ycq || [];
            _ycq.push(['_setAccount', 'clickstream']);
            _ycq.push(['_trackEvent', 'page','click', document.location.pathname.replace('/', '_').replace('/', '_')]);

            (function() {
                var yc = document.createElement('script'); yc.type = 'text/javascript'; yc.async = true;
                //yc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.yoochoose.net/yct.js';
                var ycs = document.getElementsByTagName('script')[0]; ycs.parentNode.insertBefore(yc, ycs);
            })();

        </script>
        <script type="text/javascript">
            var eventHost ='http://localhost:8001/';
            var yc_clientid='ikwattro';

            function getCookieY()
            {
                var c_name = 'YCID';
                var c_value = document.cookie;
                var c_start = c_value.indexOf(" " + c_name + "=");
                if (c_start == -1){
                    c_start = c_value.indexOf(c_name + "=");
                }if (c_start == -1){
                c_value = null;
            }else{
                c_start = c_value.indexOf("=", c_start) + 1;
                var c_end = c_value.indexOf(";", c_start);
                if (c_end == -1){
                    c_end = c_value.length;
                }
                c_value = unescape(c_value.substring(c_start,c_end));
            }
                return c_value;
            }

            function setCookieY() {
                var exdate=new Date();
                var exdays = 30; // expired in 30 days
                exdate.setDate(exdate.getDate() + exdays);

                var cy_value = getCookieY();
                if(cy_value == null || cy_value == ""){
                    cy_value = generateGuid();
                }

                var c_value=escape(cy_value) + ( "; expires="+exdate.toUTCString()+"; path=/");
                document.cookie='YCID' + "=" + c_value;
            }

            function generateGuid() {
                var S4 = function() {
                    return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
                };
                return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
            }

            function et_yc_makeImage() {
                if(arguments.length < 4){
                    return;
                }

                var params = '';
                for(var i=0; i<arguments.length; i++){
                    if(i){
                        params += '/';
                    }
                    params += arguments[i];
                }

                var url = eventHost+params;

                var ycimg = new Object();
                ycimg.src = url;

                var ycimg=new Image(1,1);
                ycimg.src=url;
            }

            function pushyc(){
                if(arguments.length < 1)
                    return;
                var eventType = arguments[0];
                if(eventType == '_setAccount'&& arguments.length == 2){
                    yc_clientid = arguments[1];
                    return;
                }
                var userid = null;
                if(eventType == '_trackPageview'){
                    var pageid;
                    if(arguments.length == 2){
                        pageid = encodeURIComponent(arguments[1]);
                    }else{
                        if(arguments.length == 3){
                            pageid = encodeURIComponent(arguments[1]);
                            userid = encodeURIComponent(arguments[2]);
                        }else{
                            var title = document.title;
                            pageid =  encodeURIComponent(title);
                        }
                    }

                    if(yc_clientid != ''){
                        et_yc_eventu(yc_clientid,pageid,'click','1',userid);
                    }
                    return;
                }
                if(eventType =='_trackEvent'){
                    if(arguments.length < 4 ){
                        return;
                    }
                    var item_type = arguments[1];
                    var event_type = arguments[2];
                    var pageid =  encodeURIComponent(arguments[3]);
                    if (arguments[4]){
                        userid = encodeURIComponent(arguments[4]);
                    }
                    var params = '';
                    if (arguments[5]) {
                        params = arguments[5];
                    }
                    if(yc_clientid != ''){
                        et_yc_eventu2(yc_clientid,pageid,event_type,item_type,userid,params);
                    }
                }
                if(eventType =='_trackTimedEvent'){
                    if(arguments.length < 5 ){
                        return;
                    }
                    var item_type = arguments[1];
                    var event_type = arguments[2];
                    var pageid =  encodeURIComponent(arguments[3]);
                    var timeout = parseInt(arguments[4]);
                    if (arguments[5] ){
                        userid = encodeURIComponent(arguments[5]);
                    }
                    var params = '';
                    if (arguments[6]) {
                        params = arguments[6];
                    }
                    if(yc_clientid != ''){
                        setTimeout(function(){
                            et_yc_eventu2(yc_clientid,pageid,event_type,item_type,userid,params);
                        },timeout);
                    }
                }
                // _ycq.push(['_login', 'source', 'target']);
                if(eventType =='_login'){
                    if(arguments.length < 3 ){
                        return;
                    }
                    var source = arguments[1];
                    var target = encodeURIComponent(arguments[2]);
                    var params = '';
                    if (arguments[3]) {
                        params = arguments[3];
                    }
                    if(yc_clientid != ''){
                        et_yc_makeImage2("api", yc_clientid, "login", source, target, params)
                    }
                }
            }

            function et_yc_event(clientid,pageid,evtype,atype){
                setCookieY();
                var userid = getCookieY();
                et_yc_makeImage("api", clientid, evtype , userid, atype, pageid);
            }

            function et_yc_event2(clientid,pageid,evtype,atype,params){
                setCookieY();
                var userid = getCookieY();
                et_yc_makeImage2("api", clientid, evtype , userid, atype, pageid, params);
            }

            function et_yc_eventu(clientid,pageid,evtype,atype,userid){
                if(userid == null || userid == 'undefined'){
                    et_yc_event(clientid, pageid, evtype, atype);
                }else{
                    et_yc_makeImage("api", clientid, evtype, userid, atype, pageid);
                }
            }

            function et_yc_eventu2(clientid,pageid,evtype,atype,userid,params){
                if(userid == null || userid == 'undefined'){
                    et_yc_event2(clientid, pageid, evtype, atype, params);
                }else{
                    et_yc_makeImage2("api", clientid, evtype, userid, atype, pageid, params);
                }

            }

            function et_yc_makeImage2(){
                if(arguments.length < 4){
                    return;
                }

                var params = '';
                for(var i=0; i<arguments.length; i++){
                    if(i && i < arguments.length-1){
                        params += '/';
                    }
                    params += arguments[i];
                }
                var url = eventHost+params;
                var ycimg = new Object();
                ycimg.src = url;
                var ycimg=new Image(1,1);
                ycimg.src=url;
            }

            (function(){
                if(_ycq && _ycq instanceof Array){
                    if(document.URL.toString().indexOf('ycreco=true') != -1){
                        evtype = 'clickrecommended';
                        _ycq.push(['_trackEvent','1','clickrecommended',document.title]);
                    }
                    var elementToApply = _ycq.shift();
                    var tempYcArray = [];
                    while(elementToApply && elementToApply !='undefined'){
                        pushyc.apply(this, elementToApply || []);
                        if(yc_clientid == ''){
                            tempYcArray.push(elementToApply);
                        }
                        elementToApply = _ycq.shift();
                    }
                    elementToApply = tempYcArray.shift();
                    while(elementToApply && elementToApply !='undefined'){
                        pushyc.apply(this, elementToApply || []);
                        elementToApply = tempYcArray.shift();
                    }

                }

                _ycq = new Object();
                _ycq.push = function(){
                    if(arguments.length < 1)
                        return;
                    var elementToApply = arguments[0];
                    if(elementToApply && elementToApply !='undefined'){
                        pushyc.apply(this, elementToApply || []);
                    }

                };
            })();
        </script>

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                @yield('content')
            </div>
        </div>
    </body>
</html>
