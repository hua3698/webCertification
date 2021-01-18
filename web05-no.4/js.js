// JavaScript Document
function lof(x)
{
	location.href=x
}


function login(table){
    let acc=$("#acc").val()
    let pw=$("#pw").val()
    let ans=$("#ans").val()

    $.get("api/ans.php",{ans},function(res){
        if(parseInt(res)){
            //true => 答案對
            $.get("api/login.php",{table,acc,pw},function(re){
                if(parseInt(re)){
                    //用table區分是一般使用者還是管理者
                    switch(table){
                        case 'mem':
                            location.href="index.php";
                            break;
                        case 'admin':
                            location.href="backend.php";
                            break;
                    }
                }else{
                    alert("帳號或密碼錯誤")
                }
            })
        }else{
            alert("對不起，您輸入的驗證碼有誤，請您重新登入")
        }
    })
}