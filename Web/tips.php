<!DOCTYPE html>
<html>
    <head>
        <?php include "header.php" ?>
        <script>
            $(document).ready(function () {
                buildMenu(function () {
                    var xhr = new XMLHttpRequest();
                    xhr.onload = function() {
                        if (xhr.status == 200) {
                            var row = xhr.responseText.split("\n");
                            var ul = $("#tips");

                            for (var i = 0; i < row.length; i++)
                            {
                                var li = $("<li>");
                                var r = row[i].split(",");
                                var badge = $("<span>",{ class: "badge"});
                                
                                if(r[0].indexOf("v3") != -1) {
                                    badge.addClass("bg-success");
                                }else if(r[0].indexOf("v1") != -1) {
                                    badge.addClass("bg-info");
                                }else if(r[0].indexOf("v2") != -1) {
                                    badge.addClass("bg-info");
                                }else if(r[0].indexOf("Hardware") != -1) {
                                    badge.addClass("bg-danger");
                                }else if(r[0].indexOf("Firmware") != -1) {
                                    badge.addClass("bg-primary");
                                }else{
                                    badge.addClass("bg-secondary");
                                }
                                badge.append(r[0]);

                                for (var x = 1; x < r.length; x++)
                                {
                                    li.append(r[x]);
                                }
                               
                                li.append(" ");
                                li.append(badge);
                                ul.append(li);
                            }
                        }
                    };
                    xhr.open('GET', 'tips.csv', true);
                    xhr.send();
                });
            });
        </script>
    </head>
    <body>
    	<div class="navbar navbar-expand-lg fixed-top navbar-light bg-light" id="mainMenu"></div>
        <div class="row mt-5"></div>
        <div class="row mt-5"></div>
        <div class="container">
             <div class="row">
                <div class="col" align="center">
                    <div class="text-dark"><h1 id="text_title">Tips</h1></div>
                    <table class="table table-active bg-light table-bordered table-striped" width="100%">
                        <tr>
                            <td><ul id="tips"></ul></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>