let topBottomMargin = 20;
var rows = [];

for (var i = 0; i < 4; i++) {
    rows.push({
        dom: $("#row" + i),
        items: [],
        getBottomHeight: function() {
            var height = 0;
            for (var j = 0; j < this.items.length; j++) {
                height += this.items[j].getBottomHeight();
            }

            return height;
        }
    })
}

var items = [];

{
    //create items
    var amnt = Math.floor(Math.random()*20) + 10;
    for (var i = 0; i < amnt; i++) {
        items[i] = newItem(i);
    }

    function newItem(id) {
        var item = {
            index: id,
            height: getRandomHeight(),
            color: getRandomColor(),
            getBottomHeight: function() {
                return this.height + topBottomMargin;
            }
        }

        return item;
    }

    function getRandomHeight()
    {
        return Math.floor(Math.random() * 140) + 50;
    }

    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        
        return color;
    }

}

//Add every item to a row where it hangs best
for (var i = 0; i < items.length; i++) {
    //Check which row has the lowest (absolute) y-position
    var lowestRow = 0;
    for (var j = 1; j < 4; j++) {
        if(rows[j].getBottomHeight() < rows[lowestRow].getBottomHeight()) {
            lowestRow = j;
        }
    }

    //add item to row
    rows[lowestRow].items.push(items[i]);
}

//Fill rows
for (var i = 0; i < rows.length; i++) {
    //With items
    for (var j = 0; j < rows[i].items.length; j++) {
        //Add item to dom 
        $(rows[i].dom).append($("<div>")
            .addClass("item")
            .css("background-color", rows[i].items[j].color)
            .css("height", rows[i].items[j].height)
            .append($("<img>")
                .attr('src', 'http://via.placeholder.com/190x' + rows[i].items[j].height + '/' + rows[i].items[j].color.substr(1) + '/ffffff/?text=Item ' + rows[i].items[j].index)
                )
            );
    }
}