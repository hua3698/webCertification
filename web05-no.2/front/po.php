<style>
    .cur {
        cursor: pointer;
        color: blue;
        margin: 10px 0;
    }

    .cur:hover {
        text-decoration: underline;
    }
</style>
<div>目前位置：首頁 > 分類網誌 > <span id="nav"></span></div>
<fieldset style="display: inline-block; width:20%">
    <legend>分類網誌</legend>

    <div class="cur" id="t1" onclick="nav(this)">健康新知</div>
    <div class="cur" id="t2" onclick="nav(this)">菸害防治</div>
    <div class="cur" id="t3" onclick="nav(this)">癌症防治</div>
    <div class="cur" id="t4" onclick="nav(this)">慢性病防治</div>
</fieldset>
<fieldset style="display: inline-block; width:60%;vertical-align:top;">
    <legend>文章列表</legend>
    <div class="ts"></div>
</fieldset>

<script>
    $("#nav").text($("#t1").text());
    getTitle(1)

    function nav(type) {
        let str = $(type).text() //拿到文字
        $("#nav").text(str)
        let t=$(type).attr('id').replace("t","");
        getTitle(t)

    }

    function getTitle(type){
        $.get("api/getTitle.php",{type},function(ts){
            $(".ts").html(ts)
        })
    }

    function getNews(id){
        $.get("api/getNews.php",{id},function(news){
            $(".ts").html(news)
        })
    }
</script>