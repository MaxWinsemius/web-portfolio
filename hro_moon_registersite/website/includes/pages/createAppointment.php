<?php
global $db;
?>
<div class="widget">
    <div class="pageHeader">
        Hulp
    </div>
    <div class="registrationForm">
        <form>
            <div class="formSpace"></div>
            <h3>Afspraakmomenten</h3>
            <div class="formItem">
                U kunt hier aangeven welke momenten in de week voor u uitkomen.
            </div>
            <div class="formItemCollection" id="momentInput">
                <input type="button" id="momentAdd" value="Voeg ander moment toe" />
                <div class="formItem">
                    <select name="day[0]">
                        <option value="0">Maandag</option>
                        <option value="1">Dinsdag</option>
                        <option value="2">Woensdag</option>
                        <option value="3">Donderdag</option>
                        <option value="4">Vrijdag</option>
                    </select>
                    <select name="dayPart[0]">
                        <option id="dayPart00" value="0" disabled>Ochtend</option>
                        <option id="dayPart01" value="1" selected>Middag</option>
                        <option id="dayPart02" value="2" disabled>Avond</option>
                    </select>
                </div>
            </div>

            <div class="formSpace"></div>

            <h3>Hulpvorm</h3>
            <div class="formItem">
                U kunt hier aangeven welke momenten in de week voor u uitkomen.
            </div>
            <?php
            $tags = $db->receiveQuery("SELECT `Name`,`ID` FROM `Tags`");
            foreach($tags as $tag) {
                ?>
                <div class="formItem"><label><input type="checkbox" name="Tags[]" value="<?= $tag['ID'] ?>"><?= $tag['Name'] ?></label></div>
            <?php
            }
            ?>
            <div class="formSpace" style="border-bottom: none;"></div>

            <div class="formItem"><input type="button" name="submit" id="submit" value="Verzenden"></div>

            <div id="ajaxResponse"></div>
        </form>
        <script>
            var iMoments = 1;
            var dayHTML = ' <div class="formItem">'+
                '<select name="day['+iMoments+']">'+
                '<option value="0">Maandag</option>'+
                '<option value="1">Dinsdag</option>'+
                '<option value="2">Woensdag</option>'+
                '<option value="3">Donderdag</option>'+
                '<option value="4">Vrijdag</option>'+
                '</select>'+
                '<select name="dayPart['+iMoments+']">'+
                '<option value="0">Ochtend</option>'+
                '<option value="1">Middag</option>'+
                '<option value="2">Avond</option>'+
                '</select>' +
                '<input type="button" id="momentDelete" value="Verwijder moment">' +
                '</div>';
            var script = '$("[name=\'day['+iMoments+']\']").change(function() {'+
                'var value = $(this).find("option:selected").attr("value");'+
                'switch (value) {'+
                '    case \'0\':'+
                '        $("#dayPart'+iMoments+'0").prop("disabled", true).removeAttr("selected");'+
                '        $("#dayPart'+iMoments+'1").removeAttr("disabled").prop("selected", true);'+
                '        $("#dayPart'+iMoments+'2").prop("disabled", true).removeAttr("selected");'+
                '        break;'+
                '    case \'1\':'+
                '        $("#dayPart'+iMoments+'0").removeAttr("disabled").prop("selected", true);'+
                '        $("#dayPart'+iMoments+'1").removeAttr("disabled");'+
                '        $("#dayPart'+iMoments+'2").removeAttr("disabled");'+
                '        break;'+
                '    case \'2\':'+
                '        $("#dayPart'+iMoments+'0").removeAttr("disabled").prop("selected", true);'+
                '        $("#dayPart'+iMoments+'1").removeAttr("disabled");'+
                '        $("#dayPart'+iMoments+'2").removeAttr("disabled");'+
                '        break;'+
                '    case \'3\':'+
                '        $("#dayPart'+iMoments+'0").removeAttr("disabled").prop("selected", true);'+
                '        $("#dayPart'+iMoments+'1").removeAttr("disabled");'+
                '        $("#dayPart'+iMoments+'2").prop("disabled", true).removeAttr("selected");'+
                '        break;'+
                '    case \'4\':'+
                '        $("#dayPart'+iMoments+'0").removeAttr("disabled").prop("selected", true);'+
                '        $("#dayPart'+iMoments+'1").prop("disabled", true).removeAttr("selected");'+
                '        $("#dayPart'+iMoments+'2").prop("disabled", true).removeAttr("selected");'+
                '        break;'+
                '    default:'+
                '        $("#dayPart'+iMoments+'0").prop("disabled", true).removeAttr("selected");'+
                '        $("#dayPart'+iMoments+'1").prop("disabled", true).removeAttr("selected");'+
                '        $("#dayPart'+iMoments+'2").prop("disabled", true).removeAttr("selected");'+
                '        break;'+
                '}'+
                '});';

            $(document).on("click","#momentAdd",function() {
                dayHTML = '<div class="formItem">'+
                '<select name="day['+iMoments+']">'+
                '<option value="0">Maandag</option>'+
                '<option value="1">Dinsdag</option>'+
                '<option value="2">Woensdag</option>'+
                '<option value="3">Donderdag</option>'+
                '<option value="4">Vrijdag</option>'+
                '</select>' +
                '<select name="dayPart['+iMoments+']">'+
                '<option id="dayPart'+iMoments+'0" value="0" disabled>Ochtend</option>'+
                '<option id="dayPart'+iMoments+'1" value="1" selected>Middag</option>'+
                '<option id="dayPart'+iMoments+'2" value="2" disabled>Avond</option>'+
                '</select>' +
                '<input type="button" id="momentDelete" value="Verwijder moment">' +
                '</div>';
                script = '$("[name=\'day['+iMoments+']\']").change(function() {'+
                'var value = $(this).find("option:selected").attr("value");'+
                'switch (value) {'+
                '    case \'0\':'+
                '        $("#dayPart'+iMoments+'0").prop("disabled", true).removeAttr("selected");'+
                '        $("#dayPart'+iMoments+'1").removeAttr("disabled").prop("selected", true);'+
                '        $("#dayPart'+iMoments+'2").prop("disabled", true).removeAttr("selected");'+
                '        break;'+
                '    case \'1\':'+
                '        $("#dayPart'+iMoments+'0").removeAttr("disabled").prop("selected", true);'+
                '        $("#dayPart'+iMoments+'1").removeAttr("disabled");'+
                '        $("#dayPart'+iMoments+'2").removeAttr("disabled");'+
                '        break;'+
                '    case \'2\':'+
                '        $("#dayPart'+iMoments+'0").removeAttr("disabled").prop("selected", true);'+
                '        $("#dayPart'+iMoments+'1").removeAttr("disabled");'+
                '        $("#dayPart'+iMoments+'2").removeAttr("disabled");'+
                '        break;'+
                '    case \'3\':'+
                '        $("#dayPart'+iMoments+'0").removeAttr("disabled").prop("selected", true);'+
                '        $("#dayPart'+iMoments+'1").removeAttr("disabled");'+
                '        $("#dayPart'+iMoments+'2").prop("disabled", true).removeAttr("selected");'+
                '        break;'+
                '    case \'4\':'+
                '        $("#dayPart'+iMoments+'0").removeAttr("disabled").prop("selected", true);'+
                '        $("#dayPart'+iMoments+'1").prop("disabled", true).removeAttr("selected");'+
                '        $("#dayPart'+iMoments+'2").prop("disabled", true).removeAttr("selected");'+
                '        break;'+
                '    default:'+
                '        $("#dayPart'+iMoments+'0").prop("disabled", true).removeAttr("selected");'+
                '        $("#dayPart'+iMoments+'1").prop("disabled", true).removeAttr("selected");'+
                '        $("#dayPart'+iMoments+'2").prop("disabled", true).removeAttr("selected");'+
                '        break;'+
                '}'+
                '});';

                var scriptEl = document.createElement('script');
                var node = document.createTextNode(script);
                scriptEl.appendChild(node);
                $("#momentInput").append(dayHTML);
                setTimeout($("select[name='dayPart["+iMoments+"]']").after(scriptEl));
                iMoments++;
            });

            $(document).on("click","#momentDelete",function(e) {
                $(e.target).parent().remove();
            });

            $("[name='day[0]']").change(function() {
                var value = $(this).find("option:selected").attr("value");
                switch (value) {
                    case '0':
                        $("#dayPart00").prop("disabled", true).removeAttr("selected");
                        $("#dayPart01").removeAttr("disabled").prop("selected", true);
                        $("#dayPart02").prop("disabled", true).removeAttr("selected");
                        break;
                    case '1':
                        $("#dayPart00").removeAttr("disabled").prop("selected", true);
                        $("#dayPart01").removeAttr("disabled");
                        $("#dayPart02").removeAttr("disabled");
                        break;
                    case '2':
                        $("#dayPart00").removeAttr("disabled").prop("selected", true);
                        $("#dayPart01").removeAttr("disabled");
                        $("#dayPart02").removeAttr("disabled");
                        break;
                    case '3':
                        $("#dayPart00").removeAttr("disabled").prop("selected", true);
                        $("#dayPart01").removeAttr("disabled");
                        $("#dayPart02").prop("disabled", true).removeAttr("selected");
                        break;
                    case '4':
                        $("#dayPart00").removeAttr("disabled").prop("selected", true);
                        $("#dayPart01").prop("disabled", true).removeAttr("selected");
                        $("#dayPart02").prop("disabled", true).removeAttr("selected");
                        break;
                    default:
                        $("#dayPart00").prop("disabled", true).removeAttr("selected");
                        $("#dayPart01").prop("disabled", true).removeAttr("selected");
                        $("#dayPart02").prop("disabled", true).removeAttr("selected");
                        break;
                }
            });


            $(document).ready(function() {
                $("#submit").click(function() {

                    if($('input[name="Tags[]"]:checked').length > 0) {
                        $.ajax({
                            type: "POST",
                            url: "appointmentForm.php",
                            data: $("form").serialize()
                        })
                            .done(function(html) {
                                $("#ajaxResponse").empty().append(html);
                            });
                    } else {
                        alert("Vink aub een hulpvorm aan");
                    }
                });
            });

        </script>
    </div>
</div>