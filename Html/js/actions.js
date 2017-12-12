          (function() {
              var pic = document.getElementById('background');
              pic.onload = controls();
          })()
            function controls() {
                var bgContainer = document.getElementById('container');
                var bg = document.getElementById('background');
                items = {
                    wid: 400,
                    hei: 680,
                    sec_1: 1000/41,
                    sec_2: 1000/20,
                    width: window.innerWidth,
                    height: window.innerHeight,
                    imgContainer: document.getElementsByClassName('bg-img')[0]
                };

                function lok() {
                    if(items.width===414){
                        items.wid = 425;
                        items.hei = 760;
                    }else if(items.width===375){
                        items.wid = 420;
                        items.hei = 750;
                    }
                }
                lok()
                function action() {
                    var firstAct = setInterval(function() {
                        items.wid--;
                        if (items.wid===items.width){
                            clearInterval(firstAct);
                            
                        }
                        bg.style.width = items.wid; 
                    },items.sec_2);
                    var secondAct = setInterval(function() {
                        items.hei--;
                        if (items.hei===items.height){
                            clearInterval(secondAct);
                            console.log(items.width)
                        }
                        bg.style.height = items.hei; 
                    },items.sec_1); 
                    bg.setAttribute('class','acter')
                };
                action();
                return items;
                bgContainer.style.width = items.width;
                bgContainer.style.height = items.height;       
            }
            