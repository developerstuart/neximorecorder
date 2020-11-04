var $anchors;
var currentAnchorIndex;
var scriptCheck;
var theAudio;
var anchorData;
anchorData = {};
$(document).ready(function() {
    $anchors = $('.script b');
    $anchors.filter(":eq(0)").addClass("highlight");
    currentAnchorIndex = 0;
    console.log('firing');

    theAudio = $('audio').get(0);

    scriptCheck = setInterval(function() {
        check_script();
        check_mp3();
    }, 500)

    $('.start').on('click', function() {
        console.log('getting ' + startLoc)
        $.get(startLoc, function() {
            alert('Call Started. Close this alert when both picked up.');
            set_script_position(0, true);
        });
    });

    setInterval(function() {
            currentT = theAudio.currentTime;
            console.log(currentT);
            for(i=0; i<anchorData.length; i++) {
                row = anchorData[i];
                if(row.reltime < currentT && (i == anchorData.length-1 || currentT < anchorData[i+1].reltime)) {
                    set_script_position(row.anchorindex, false);
                    return;
                }
            }
        }, 500);
});


$(window).on('keyup', function(e) {
    console.log(e.keyCode);
    if(e.keyCode == 13){
        e.preventDefault();
        e.stopPropagation();
        $anchorSelected = $anchors.filter(".highlight");
        newIndex = $anchors.index($anchorSelected)+1;
        
        set_script_position(newIndex, true);
        
        return false;

    }
});

function set_script_position(index, update) {
    $anchors.removeClass("highlight");
    $newAnchor = $anchors.filter(":eq(" + index + ")");
    $newAnchor.addClass("highlight");

     $('.script').scrollTo($newAnchor, 200);

     currentAnchorIndex = index;
     if(update) {
         $.get("record.php", {
                data: { anchor: currentAnchorIndex }
            });
    }
}

function check_script() {
    $.get("scriptPosition.json", function(responseData) {
        console.log("script check");
        console.log(responseData);
        anchorData = responseData.anchors;
        newAnchorIndex = responseData.anchors[responseData.anchors.length-1].anchorindex;
        if(currentAnchorIndex < newAnchorIndex) {
            set_script_position(newAnchorIndex, false);
        }
    });
}

var startLoc = "https://nexmocreator.glitch.me/call";
var mp3Loc = "https://nexmocreator.glitch.me/test.mp3";
var mp3Loc_check = "https://nexmocreator.glitch.me/mp3";

function check_mp3() {
    $.get(mp3Loc_check, function(responseData) {
        if(responseData != "") {
            mp3Loc = responseData;
            window.clearInterval(scriptCheck);
            scriptCheck = false;
            $('.js_mp3').text("YES");

           // $('audio').attr("controls", "controls");
            $('audio').attr("src", mp3Loc);

            

        }
        

    });
}