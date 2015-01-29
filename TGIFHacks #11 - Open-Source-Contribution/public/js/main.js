(function(window, undefined){
    var _onload = window.onload;

    window.onload = function(){
        if(_onload){ _onload(); }

        impress().init();
        prettyPrint();
    };
}(this));

