<?php
$loadingSource = "admin";
require "includes/initialize.php";
require "includes/utils/header.php";
?>
<div class="widget">
    <div class="pageHeader">
        registraties
    </div>
    <div class="toolbar">
        <div class="topSearch">
            <input type="text" name="search" id="searchBar" placeholder="Zoeken" autofocus />
            <input type="button" id="searchDB" value="Zoek!" />
            <input type="button" id="clear" value="Legen" />
            <input type="button" id="prev" value="Vorige 50" />
            <input type="button" id="next" value="Volgende 50" />
<!--            <input type="button" id="test" value="Test" />-->
        </div>
        <div class="selectSearch formItem">
            <label><input type="radio" id="changeName" name="typeSearch" checked> Naam</label>
            <label><input type="radio" id="changeTag" name="typeSearch"> Product</label>
        </div>
    </div>
    <div class="formSpace"></div>
    <div class="registerWrapper">
        <?php
        $row = $db->receiveQuery("SELECT `ID`,`Name`,`Initals`,`CallName`,`checked` FROM `Clients` ORDER BY `ID` DESC LIMIT 0,50");
        foreach ($row as $register) :
            $tags = $db->receiveQuery("SELECT `Tags`.`Name`,`Tags`.`ID` FROM `Tags`" .
                "RIGHT JOIN `ClientToTag`" .
                "ON `ClientToTag`.`TagID` = `Tags`.`ID`" .
                "WHERE `ClientToTag`.`ClientID` = " . $register['ID']);
            ?>
            <div class="registerCollection clearfix<?= $register['checked'] == 1 ? '' : ' unchecked' ?>" data-show="true" data-name="<?= strtolower($register['CallName'] . "_" . $register['Name']) ?>" data-tags="<?php foreach($tags as $tag) { echo strtolower($tag['Name'] . "_"); } ?>">
                <a href="?page=6&id=<?= $register['ID'] ?>" class="clearfix">
                    <div class="registerName"><?= ucfirst($register['Name']) ?>, <?= strtoupper($register['Initals']) ?></div>
                </a>

                <div class="tags">
                    <?php
                    foreach ($tags as $tag) :
                        ?>
                        <div class="tag" data-tag="<?= $tag['Name'] ?>">
                            <?= $tag['Name'] ?>
                        </div>
                        <?php
                    endforeach;

                    ?>
                </div>

            </div>
        <?
        endforeach;
        ?>
    </div>

</div>
<div class="staticFooter">
    <p>
        De rode namen zijn registraties die nog niet bekeken zijn. De witte namen zijn wel bekeken. || Druk op zoeken of enter om in de database te zoeken
    </p>
</div>
<script>
    //check db for person
    function searchDatabase(input, off)
    {
        if($("#changeName").prop("checked")) {
            var option = "name";
        } else {
            var option = "tag"
        }
        $.ajax({
            url: "searchDatabase.php",
            method: "POST",
            data: {
                search: input,
                offset: off,
                option: option
            },
            dataType: "html"
        })
            .done(function (html){
                $('.registerCollection')
                    .hide(300);

                $('.registerWrapper')
                    .delay(300)
                    .empty()
                    .append(html)
                    .children()
                    .show(300);
            });
    }

    function recolor()
    {
        var selector = $('.registerCollection').filter(function() {return $(this).attr("data-show") == "true"});
        var odd = selector.filter(":odd");
        var even = selector.filter(":even");

        odd.not('.unchecked').css({
            backgroundColor: "#eee"
        });
        even.not('.unchecked').css({
            backgroundColor: "#fff"
        });

        odd.filter('.unchecked').css({
            backgroundColor: '#FF2400'
        });
        even.filter('.unchecked').css({
            backgroundColor: '#FF6100'
        });
    }

    //check page for person
    function searchOnPageNames(input, type)
    {
        if (input.length > 0) {
            input = input.replace(" ", "_").toLowerCase();
            console.log("Input: "+input);
            console.log("Type: "+type);
            $(".registerCollection")
                .not("[data-"+type+"*="+input+"]")
                .attr("data-show","false")
                .hide({
                    queue: false,
                    duration: 300
                });
            $(".registerCollection[data-"+type+"*="+input+"]")
                .filter(function() {
                    return $(this).css("display") === "none"
                })
                .attr("data-show","true")
                .show({
                    queue: false,
                    duration: 300
                });
        } else {
            $(".registerCollection")
                .filter(function() {
                    return $(this).css("display") === "none"
                })
                .attr("data-show","true")
                .show({
                    queue: false,
                    duration: 300
                });
        }
        setInterval(function() { recolor() }, 150);
    }

    var offset = 0;
    var searchType = "name";

    $('#searchBar').keyup(function() {
        //Check on page
        searchOnPageNames($(this).val(),searchType);

        //Check for db search
        if(event.keyCode == 13) {
            searchDatabase($(this).val());
        }
    });

    //check if searchType has been changed
    $('#changeName').click(function() {
        searchType = "name";
    });

    $('#changeTag').click(function () {
        searchType = "tags";
    })

    //check for search click
    $('#searchDB').click(function() {
        offset = 0;
        searchDatabase($('#searchBar').val(), offset);
    });

    //check for clear
    $('#clear').click(function() {
        offset = 0;
        searchDatabase("", offset);
        $('#searchBar').val("");
    });

    $('#prev').click(function() {
        if(offset >= 50) {
            offset = offset - 50;
        }
        searchDatabase($('#searchBar').val(), offset);
    });

    $('#next').click(function() {
        offset = offset + 50;
        searchDatabase($('#searchBar').val(), offset);
    });

    $(document).on('click', '.tag', function() {
        $("#searchBar").val($(this).attr("data-tag"));
        $('#changeTag').trigger('click');
        $('#searchDB').trigger('click');
    });

//    $("#test").click(function() {
//        console.log($(".registerCollection[data-tags*="+$('#searchBar').val()+"]").each().html());
//        searchOnPageNames('Jong','tags');
//    });
</script>