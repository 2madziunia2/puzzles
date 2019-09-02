
jqJigsawPuzzle = new Object();


/*jqJigsawPuzzle.pieceSizes = {
    small : {
        logical: 25,
        real: 43
    },
    normal : {
        logical: 50, 
        real: 86
    },
    big : {
        logical: 100, 
        real: 170 
    }
};
*/
jqJigsawPuzzle.pieceSizes = {
    small : {
        logical: 100,
        real: 170
    },
    normal : {
        logical: 125, 
        real: 215
    },
    big : {
        logical: 250, 
        real: 430 
    }
};

jqJigsawPuzzle.randomPieceTypes = function(rows, columns) {
    var res = new Array();
    
   
    for(var i=0; i<rows; i++)
        {
        res[i] = new Array();
        for(var j=0; j<columns; j++)
            {
            if( (i+j)%2 == 0)
                {
               
                var rand = Math.floor(Math.random()*16); 

                
                if(i == 0) { rand = rand | 8; }            
                if(i == rows-1) { rand = rand | 2; }       
                if(j == 0) { rand = rand | 4; }            
                if(j == columns-1) { rand = rand | 1; }    

                
                res[i][j] = rand;
                }
            }
        }

    
    for(i=0; i<rows; i++)
    for(j=0; j<columns; j++)
        {
        if( (i+j)%2 == 1)
            {
            var det = 0;
		
            if(i != 0) { det = det | (res[i-1][j] & 2)<<2; }           
            if(i != rows-1) { det = det | (res[i+1][j] & 8)>>2; }      
            if(j != 0) { det = det | (res[i][j-1] & 1)<<2; }          
            if(j != columns-1) { det = det | (res[i][j+1] & 4)>>2; }   

            res[i][j] = 15 - det;
            }
        }

   
    for(i=0; i<rows; i++)
    for(j=0; j<columns; j++)
        {
        var value = '';
        value += ((res[i][j] & 8) != 0)? '1' : '0';
        value += ((res[i][j] & 4) != 0)? '1' : '0';
        value += ((res[i][j] & 2) != 0)? '1' : '0';
        value += ((res[i][j] & 1) != 0)? '1' : '0';
        res[i][j] = value;
        }

    return res;
}


jqJigsawPuzzle.shufflePieces = function(containerSelector, options) {
    
    var divPuzzle = jQuery(containerSelector).find('div.puzzle');
    var rightLimit = (options != null && !isNaN(options.rightLimit))? options.rightLimit : 0;
    var leftLimit = (options != null && !isNaN(options.leftLimit))? options.leftLimit : 0;
    var topLimit = (options != null && !isNaN(options.topLimit))? options.topLimit : 0;
    var bottomLimit = (options != null && !isNaN(options.bottomLimit))? options.bottomLimit : 0;
    var puzzleWidth = divPuzzle.width() + leftLimit + rightLimit;
    var puzzleHeight = divPuzzle.height() + topLimit + bottomLimit;
 
   
    jQuery(containerSelector).find('div.piece').each(function(index, piece) {
        var pieceWidth = jQuery(this).width();
        var pieceHeight = jQuery(this).height();
        
        jQuery(this).css('left', Math.floor(Math.random()*(puzzleWidth - pieceWidth)) - leftLimit);
        jQuery(this).css('top', Math.floor(Math.random()*(puzzleHeight - pieceHeight)) - topLimit);
    });
}



jqJigsawPuzzle.createPuzzleFromImage = function(imageSelector, options) {
    
    if(jQuery(imageSelector).size() > 0) {   
       
        if(jQuery(imageSelector).width() > 0 && jQuery(imageSelector).height() > 0) {
            
            jqJigsawPuzzle.imageToPuzzle(imageSelector, options);
        } else {
           
            var puzzleCreated = false;

           
            jQuery(imageSelector).load(function() {
                if(!puzzleCreated) {
                    puzzleCreated = true;
                    jqJigsawPuzzle.imageToPuzzle(imageSelector, options);
                }
            });
            
            
            if(jQuery(imageSelector).width() > 0 && jQuery(imageSelector).height() > 0) {
                puzzleCreated = true;
                
                jqJigsawPuzzle.imageToPuzzle(imageSelector, options);
            }            
        }
    }
   
}


jqJigsawPuzzle.imageToPuzzle = function(imageSelector, options) {
    
    var img = jQuery(imageSelector);
    if(img.size() > 1) img = img.find(':first');   
    var piecesSize = (options != null && options.piecesSize != null)? options.piecesSize : 'normal';
    if(piecesSize != 'normal' && piecesSize != 'small' && piecesSize != 'big') piecesSize = 'normal';
    var borderWidth = (options != null && !isNaN(options.borderWidth))? parseInt(options.borderWidth, 10) : 5;
    var puzzleId = 'puzzle_' + new Date().getTime();

   
    var imgWidth = img.width();
    var imgHeight = img.height();
    var imgPosX = img.position().left;
    var imgPosY = img.position().top;
    var imgSrc = img.attr("src");

    var html = '<div class="jigsaw" id="'+puzzleId+'" style="left:'+(imgPosX-borderWidth)+'px; top:'+(imgPosY-borderWidth)+'px; width:'+(imgWidth)+'px; min-height:'+(imgHeight)+'px; border-width:'+borderWidth+'px;">' +
                   '<div class="puzzle" style="width:'+imgWidth+'px; height:'+imgHeight+'px; background-image:url(\''+imgSrc+'\');"></div>' +
                   '<div class="menu" style="width:'+(imgWidth)+'px;">' + 
                        '<table class="menu"><tr>' + 
                           // '<td><a href="#" class="button" id="'+puzzleId+'_shuffle" title="Shuffle">Mieszaj</a></td>' + 
                            '<td>Ruchy: <span class="movement_compter" id="'+puzzleId+'_movements"></span></td>' + 
                            '<td>Czas: <span class="time_compter" id="'+puzzleId+'_time"></span></td>' + 
                        '</tr></table>' + 
                   '</div>' +
               '</div>';
    jQuery('body').append(html);
    var piecesContainer = jQuery("#" + puzzleId);

    
    var logicalSize = jqJigsawPuzzle.pieceSizes[piecesSize].logical;
    var realSize = jqJigsawPuzzle.pieceSizes[piecesSize].real;
    var offset = (realSize - logicalSize)/2;
        
    
    var columns = parseInt(imgWidth / logicalSize);
    if(imgWidth % logicalSize != 0) columns++;
    var rows = parseInt(imgHeight / logicalSize);
    if(imgHeight % logicalSize != 0) rows++;
    
   
    piecesContainer.data('pieces-number', columns*rows);
    piecesContainer.data('pieces-located', 0);
    
    
    var pieceTypes = jqJigsawPuzzle.randomPieceTypes(rows, columns);

    
    piecesContainer.data('last-z-index', rows*columns);
    piecesContainer.find('div.menu').css("z-index", rows*columns);

  
    for(var r=0; r<rows; r++) {
        for(var c=0; c<columns; c++) {
           
            var posX = -offset + c*logicalSize;
            var posY = -offset + r*logicalSize;
            var backgroundPosX = offset - c*logicalSize;
            var backgroundPosY = offset - r*logicalSize;
            var id = puzzleId + '_piece_'+r+'x'+c;
            var clase = 'piece_' + pieceTypes[r][c];

            
            html = '<div id="' + id + '" ' +
                            'class="piece ' + piecesSize + ' ' + clase + '" ' +
                            'data-posX="' + posX + '" ' +
                            'data-posY="' + posY + '" ' +
                            'style="background-image: url(\''+imgSrc+'\');' + 
                                   'background-position: ' + backgroundPosX + 'px ' + backgroundPosY + 'px;' +
                                   'left: ' + posX + 'px; ' +
                                   'top: ' + posY + 'px; ' +
                                   'width: ' + realSize + 'px; ' +
                                   'height: ' + realSize + 'px;">' +
                        '</div>';
            piecesContainer.append(html);

            
            jQuery("#" + id).css("z-index", rows*columns-1);

            
            jQuery("#" + id).draggable({
                start: function(event, ui) {
                    
                    var posX = parseInt(jQuery(this).attr('data-posX'), 10);
                    var posY = parseInt(jQuery(this).attr('data-posY'), 10);
                    if(posX == ui.position.left && posY == ui.position.top)
                        { return false; }
                    
                    
                    jqJigsawPuzzle.startTimerCounter(piecesContainer);
                    
                   
                    var zIndex = parseInt(piecesContainer.data('last-z-index'), 10);
                    jQuery(this).css("z-index", zIndex);
                    piecesContainer.data('last-z-index', zIndex+1);
                    
                    return true;
                },
                stop: function(event, ui) {
                   
                    var posX = parseInt(jQuery(this).attr('data-posX'), 10);
                    var posY = parseInt(jQuery(this).attr('data-posY'), 10);
                    var difX = ui.position.left - posX;
                    var difY = ui.position.top - posY;
                    if( difX > -offset && difX < offset && difY > -offset && difY < offset ) {
                        
                        jQuery(this).css('left', posX);
                        jQuery(this).css('top', posY);
                        jQuery(this).css("z-index", rows*columns-2);


                        
                       // piecesContainer.addClass('highlight');
                       // setTimeout(function() { piecesContainer.removeClass('highlight'); }, 250);
                        
                       
                        var piecesLocated = parseInt(piecesContainer.data('pieces-located'), 10);
                        piecesContainer.data('pieces-located', piecesLocated + 1);
                        
                        
                        if(piecesLocated+1 >= parseInt(piecesContainer.data('pieces-number'), 10)) {
                            piecesContainer.addClass('resolved');
                            jqJigsawPuzzle.stopTimerCounter(piecesContainer);
                            FinText();
                           
                            piecesContainer.remove();
                          //  piecesContainer.show('div.menu');
                            jQuery("div.puzzle").css("opacity","1.0");
                           
                           // if(jqJigsawPuzzle.finishSound != null) jqJigsawPuzzle.finishSound.play();
                        }
                        
                    }

                  
                    jqJigsawPuzzle.increaseMovementCounter(piecesContainer);
                    
                }
            });
        }
    }

    
    jqJigsawPuzzle.shufflePieces(piecesContainer, options!=null? options.shuffle : null);
    jqJigsawPuzzle.resetCounters(piecesContainer);
    
  
    jQuery("#" + puzzleId + "_shuffle").click(function() {
        piecesContainer.data('pieces-located', 0);
        piecesContainer.removeClass('highlight');
        piecesContainer.removeClass('resolved');
        jqJigsawPuzzle.shufflePieces(piecesContainer, options!=null? options.shuffle : null);
        jqJigsawPuzzle.resetCounters(piecesContainer);
    });
};



jqJigsawPuzzle.resetCounters = function(piecesContainer) {
   
    jqJigsawPuzzle.stopTimerCounter(piecesContainer);
    jqJigsawPuzzle.setTimerCounter(piecesContainer, 0);
    
    
    jQuery(piecesContainer).find(".movement_compter").html('0');
};


jqJigsawPuzzle.increaseMovementCounter = function(piecesContainer) { 
    var count = parseInt(jQuery(piecesContainer).find(".movement_compter").html(), 10);
    jQuery(piecesContainer).find(".movement_compter").html((count+1) + '');
};


jqJigsawPuzzle.startTimerCounter = function(piecesContainer) { 
   
    if(jQuery(piecesContainer).data('timer-status') != 'running') {
       
        jQuery(piecesContainer).data('timer-status', 'running');
        jQuery(piecesContainer).data('timer-value', new Date().getTime());
        
       
        var interval = setInterval(function(){
            jqJigsawPuzzle.refreshTimerCounter(piecesContainer);
        }, 1000);
        jQuery(piecesContainer).data('timer-interval', interval);
    }
};


jqJigsawPuzzle.stopTimerCounter = function(piecesContainer) { 
    
    if(jQuery(piecesContainer).data('timer-status') != 'stopped') {
        jQuery(piecesContainer).data('timer-status', 'stopped');
        clearInterval(jQuery(piecesContainer).data('timer-interval'));
    }
};


jqJigsawPuzzle.refreshTimerCounter = function(piecesContainer) { 
    var currentTime = new Date().getTime();
    jqJigsawPuzzle.setTimerCounter(piecesContainer, currentTime - jQuery(piecesContainer).data('timer-value'));
};


jqJigsawPuzzle.setTimerCounter = function(piecesContainer, time) {    
    time = (time>0)? time/1000 : 0;
    var seconds = parseInt(time%60, 10);
    var minutes = parseInt((time/60)%60, 10);
    var hours = parseInt(time/3600, 10);
    if(seconds < 10) seconds = '0' + seconds;
    if(minutes < 10) minutes = '0' + minutes;
    if(hours < 10) hours = '0' + hours;
    jQuery(piecesContainer).find(".time_compter").html(hours + ':' + minutes + ':' + seconds);
};




function FinText() {
    alert("Gratulacje! ułożyłeś puzzle")};



