

function showCalc(str) {
    var loc = window.location.pathname;
    var dir = loc.substring(0, loc.lastIndexOf('/'));
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var myArr = JSON.parse(xmlhttp.responseText);
            document.getElementById("result_calc").innerHTML = myArr.screen;
            document.getElementById("op").value = myArr.oper;
            document.getElementById("mnt").value = myArr.mount;
        }
    }
    if (str == '+') {
        str = 'sum';
    }
    var screen1 = document.getElementById("result_calc").innerHTML;
    var op = document.getElementById("op").value;
    var mnt = document.getElementById("mnt").value;
    xmlhttp.open("GET", dir + "/servers/calculate.php?btn=" + str + "&str=" + screen1 + "&mnt=" + mnt + "&op=" + op, true);
    xmlhttp.send();
}


function sortArray(str) {
    var loc = window.location.pathname;
    var dir = loc.substring(0, loc.lastIndexOf('/'));
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var myArr = JSON.parse(xmlhttp.responseText);
            document.getElementById("result_sort").innerHTML = myArr;
        }
    }
    var flag = document.getElementsByName("sort");
    var flag2 = flag[0].checked ? "desc" : "asc";
    xmlhttp.open("GET", dir + "/servers/sort.php?entrada=" + str + "&flag=" + flag2, true);
    xmlhttp.send();
}

function generateSquare(str) {
    var loc = window.location.pathname;
    var dir = loc.substring(0, loc.lastIndexOf('/'));
    console.log("dir :" + dir);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            var myArr = JSON.parse(xmlhttp.responseText);
           
            console.log(myArr);
            for (var x = 0; x < myArr.length; x++) {
                for (var y = 0; y < myArr.length; y++) {
                      console.log(myArr[x][y]);
                }
                console.log("***************");
            }
            $(document).ready(function() {
                $("#cube").empty();
                makeTable($("#cube"), myArr);
            });
        }
    }
    xmlhttp.open("GET", dir + "/servers/square.php?str=" + str, true);
    xmlhttp.send();
}


function sayHello() {
    alert("Hello world");
}



function makeTable(container, data) {
    var table = $("<table/>").addClass('table');
    $.each(data, function(rowInd, r) {
        var row = $("<tr/>");
        $.each(r, function(colInd, c) {
            row.append($("<td/>").text(c));
        });
        table.append(row);
    });
    return container.append(table);
}