
<style>html,body{margin:0;}</style>
<style> .video-js {width: 100%; height: 100%;} #videojs {width: 100%; height: 100%;}</style>
<meta name="referrer" content="no-referrer">
<link href="{{ URL::asset('frontEnd/css/video-js.min.css') }}" rel="stylesheet">
<script src="{{ URL::asset('frontEnd/js/videojs-ie8.min.js') }}"></script>
<script src="{{ URL::asset('frontEnd/js/video.min.js') }}"></script>
<script src="{{ URL::asset('frontEnd/js/videojs-contrib-hls.min.js') }}"></script>
<script src="{{ URL::asset('frontEnd/js/vvjs-hls.min.js') }}"></script>
<body onLoad="init()">
    <div id="videojs">
        <video id="restre" autoplay preload="auto" height="100%" width="100%" class="video-js" controls data-setup='{"language": "vi"}'></video>
    </div>
    <script>
        function play(link){
            if(link.indexOf('.php')!=-1){
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.open("GET",link,!1);
                xmlhttp.send();
                src=xmlhttp.responseText;
            }else 
                src=link;
            
            player=videojs("restre");

            player.ready(function(){
                player.src({src:src,type:"application/x-mpegURL"})
            });

            player.play()
        }
        function reload(i){
            if(player.paused()&&player.error_!=null){
                if(i<link.length){
                    play(link[i])
                }else{
                    clearInterval(interval);
                    document.write('<iframe id="Myiframe" src="/truc-tiep" scrolling="no" height="100%" allowfullscreen="true" width="100%" frameborder="0"></iframe>')
                }
            }
        }

        function init(){
            var i=0;

            var sites = {!! json_encode($WebsiteSettings->toArray()) !!};

            link=[sites['link_livetv']];
            
            play(link[i]);

            interval=setInterval(function(){
                i++;reload(i)
            },2000)
            
        }

    </script>
</body>
<!-- <span style='position:absolute;top:10px;right:10px;font-size: 13px; font-weight: bold;color: #ff0;'><em>www.dungthinh.com</em></span> -->