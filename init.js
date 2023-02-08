$(document).ready(function(){
    $("#registerForm").submit(function() {
        event.preventDefault();
        var email = $('input[name="email"]').val();
        var password = $('input[name="password"]').val();
        var username = $('input[name="username"]').val();
        let sendingDatas = {
            data: {
                email:email,
                password:password,
                username:username,
            },
            action: "registerUser"
        };

        $.ajax({
            type: "POST",
            url: "/ajax.php",
            dataType:'html',
            data: sendingDatas,
            success: function(response) {
                var res = JSON.parse(response);
                console.log(res);
                if(!res.status) {
                    if (res.msg) {
                        $('#error').text(res.msg);
                        $('#error').show();
                    }
                } else {
                    window.location = "/auth/login.php"
                }
            }
        });
    });

    $("#logInForm").submit(function() {
        event.preventDefault();
        var email = $('input[name="email"]').val();
        var password = $('input[name="password"]').val();
        let sendingDatas = {
            data: {
                email:email,
                password:password,
            },
            action: "logInUser"
        };

        $.ajax({
            type: "POST",
            url: "/ajax.php",
            dataType:'html',
            data: sendingDatas,
            success: function(response) {
                var res = JSON.parse(response);
                if(!res.status) {
                    if (res.msg) {
                        $('#error').text(res.msg);
                        $('#error').show();
                    }
                }else {
                    window.location = "/"
                }
            }
        });
    });
    $("#buyCow").click(function() {
        event.preventDefault();
        let sendingDatas = {
            action: "buyCow"
        };

        $.ajax({
            type: "POST",
            url: "/ajax.php",
            dataType:'html',
            data: sendingDatas,
            success: function(response) {
                var res = JSON.parse(response);
                if(!res.status) {
                    if (res.msg) {
                        $('#error').text(res.msg);
                        $('#error').show();
                    }
                } else  {
                    $('#buyCow').hide();
                    $('#thankYou').show();
                }
            }
        });
    });

    $("#downloadFile").click(function() {
        event.preventDefault();
        let sendingDatas = {
            action: "downloadFile"
        };

        $.ajax({
            type: "POST",
            url: "/ajax.php",
            dataType:'html',
            data: sendingDatas,
            success: function(response) {
                var res = JSON.parse(response);
                if(!res.status) {
                    if (res.msg) {
                        $('#error').text(res.msg);
                        $('#error').show();
                    }
                }
            }
        });
    });
});
function searchDate() {

    // Объявить переменные
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("inputDate");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Перебирайте все строки таблицы и скрывайте тех, кто не соответствует поисковому запросу
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
function searchName() {
    // Объявить переменные
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("inputName");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Перебирайте все строки таблицы и скрывайте тех, кто не соответствует поисковому запросу
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}

