<div class="order">
<h4 class="ct">線上訂票</h4>
    <form>
        <table style="width: 400px;margin:auto">
            <tr>
                <td width="15%">電影</td>
                <td>
                    <select name="movie" id="movie" style="width:98%" onchange="getDays()"></select>
                </td>
            </tr>
            <tr>
                <td>日期</td>
                <td><select name="date" id="date" style="width:98%" onchange="getSessions()"></select></td>
            </tr>
            <tr>
                <td>場次</td>
                <td><select name="session" id="session" style="width:98%"></select></td>
            </tr>
        </table>
        <div class="ct">
            <input type="button" value="訂票" onclick="booking()">
            <input type="reset" value="重置">
        </div>
    </form>
</div>
<div class="booking" style="display:none">
    <!-- <button onclick="javascript:$('.order,.booking').toggle()">上一步</button> -->
</div>

<script>
    //前端JS取得
    // let query={};
    // document.location.search.replace("?","").split("&").forEach(function(item,idx){
    //     query[item.split("=")[0]]=item.split("=")[1]
    // })
    // console.log(query)
    // if(query.id==undefined){
    //     getMovies();
    // }else{
    //     getMovies(query.id);
    // }
    getMovies(<?= $_GET['id'] ?? ''; ?>);

    function getMovies(id) {
        let movie;
        if (id != undefined) {
            movie = id
        } else {
            movie = 'all';
        }
        console.log(movie)
        $.get("api/get_movies.php", {
            movie
        }, function(movies) {
            $("#movie").html(movies)
            getDays()
        })
    }

    function getDays() {
        let movie = $("#movie").val()
        // console.log(movie)

        $.get("api/get_days.php", {
            movie
        }, function(days) {
            $("#date").html(days)
            getSessions()
            // console.log(days)
        })
    }

    function getSessions() {
        let movie = $("#movie").val()
        let date = $("#date").val()
        $.get("api/get_session.php", {
            movie,
            date
        }, function(sessions) {
            $("#session").html(sessions)
        })
    }

    function booking(){
        $(".order,.booking").toggle()
        let movie=$("#movie").val()
        let date=$("#date").val()
        let session=$("#session").val()
        
        $.get("api/get_booking.php",{movie,date,session},function(a){
            $(".booking").html(a)
        })
    }
</script>