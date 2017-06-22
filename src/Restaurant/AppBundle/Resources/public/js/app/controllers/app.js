var isRedirect = true;
function redirect() {
    isRedirect = false;
    window.location.replace("/#/")


}
app.controller("MenuController", function($scope) {
    
});
app.controller("IndexController", function($scope) {
    
});
app.controller('ClickedController', function($location){
    ctrl = this;
    ctrl.allTypes = types;
    
    ctrl.total = 0;
    ctrl.item = 0;
    ctrl.prod = 0;
    ctrl.veg = 'veg';
    ctrl.non_veg = 'non_veg';
    if(localStorage.getItem("totalItem")==null) {
        localStorage.setItem("totalItem", 0);
    } else {
      ctrl.item=parseInt(localStorage.getItem("totalItem"));
    }
    if(localStorage.getItem("totalPrice")==null) {
        localStorage.setItem("totalPrice", 0);
    } else {
      ctrl.total=parseInt(localStorage.getItem("totalPrice"));
    }
    if(localStorage.getItem("totalProd")==null) {
        localStorage.setItem("totalProd", 0);
    } else {
      ctrl.prod=parseInt(localStorage.getItem("totalProd"));
    }

    if (typeof(Storage) === 'undefined' || typeof(localStorage.getItem('localityId')) === 'undefined' ||
        !localStorage.getItem('localityId') ) {
        $location.path('/');
    } else {
        $.ajax({
            url: '/menulist?id='+localStorage.getItem('localityId'),
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(jsonData) {
                ctrl.products = jsonData;
                $.each(ctrl.products, function(index, element) {
                    element.count = 0;
                    if(localStorage.getItem("Itemcount"+element.id) == null) {
                        localStorage.setItem("Itemcount"+element.id, 0); 

                    } else {
                      element.count=localStorage.getItem("Itemcount"+element.id);
                    }
                });
            },
            error: function() {
                alert('Some thing went Wrong. Please Try Again...');
            }
        });
    }
    this.incrCount = function(id) {
        $.each(ctrl.products, function(index, element) {
            if(element.id == id) {
                ctrl.item++;
                localStorage.setItem("totalItem",ctrl.item);
                console.log(element.count);
                if (element.count == 0) {
                    console.log('jai mata di');
                    ctrl.prod ++;
                    localStorage.setItem("totalProd",ctrl.prod);
                }
                element.count++;
                localStorage.setItem("Itemcount"+element.id, parseInt(localStorage.getItem("Itemcount"+element.id)) + 1); 
                ctrl.total += parseInt(element.price);
                localStorage.setItem("totalPrice",ctrl.total);
            }

        });      
    }
    this.descCount = function(id) {
        $.each(ctrl.products, function(index, element) {
            
            if(element.id == id) {
                element.count--;
                ctrl.total -= parseInt(element.price);
                localStorage.setItem("totalPrice",ctrl.total);
                ctrl.item--;
                localStorage.setItem("totalItem",ctrl.item);
                if (element.count == 0) {
                    ctrl.prod --;
                    if(ctrl.prod == 0) {
                        ctrl.prod = 0;
                    }

                    localStorage.setItem("totalProd",ctrl.prod);
                }
                localStorage.setItem("Itemcount"+element.id, parseInt(localStorage.getItem("Itemcount"+element.id)) - 1); 

            }
        });      
    }

    this.applyType = function(itemType) {
        $("#Veg").css({'background':'none'});
        $("#Non-Veg").css({'background':'none'});
        $("#All").css({'background':'none'});
        ctrl.veg = 'veg';
        ctrl.non_veg = 'non_veg';


        if (itemType == 'Veg') {
            ctrl.non_veg = 'veg';
            $("#Veg").css({'background-color':'#E97770'});
        } else if (itemType == 'Non-Veg') {
            ctrl.veg = 'non_veg';
            ctrl.price=0;
            $("#Non-Veg").css({'background-color':'#E97770'});
        }
        else if(itemType == 'All'){
            $("#All").css({'background-color':'#E97770'});
        }
    }
    this.show = function(type) {
        return type === ctrl.veg || type === ctrl.non_veg;
    }
});


app.controller('TypeController',function(){
    this.products = types;
});
var types = [
    {
      id : 1,
      type: 'All'      
    },
    {
      id : 2,
      type: 'Veg'      
    },
    {
      id : 1,
      type: 'Non-Veg'      
    }
];

 app.controller('OutletController', function($location){
    if (typeof(Storage) !== 'undefined' && typeof(localStorage.getItem('localityId')) !== 'undefined' &&
        localStorage.getItem('localityId') && isRedirect ) {
        $location.path('/menu');
    } else {
        ctrl = this;
        $.ajax({
            url: '/outletlocations',
            type: 'GET',
            dataType: 'json',
            async: false,
            success: function(jsonData) {
                ctrl.products = jsonData;
            },
            error: function() {
                console.log('Errored!');
            }
        });
        this.selectTab = function(id,name) {
            if (typeof(Storage) !== "undefined") {
                localStorage.setItem("localityId", id);
                if(localStorage.getItem('localityName')!=name || localStorage.getItem('localityName')==null || localStorage.getItem('totalItem') == 0 ) {
                    if(localStorage.getItem('localityName')==null || localStorage.getItem('totalItem') == 0 ) {
                            localStorage.setItem("Itemcount"+id,0);
                            localStorage.setItem("totalPrice", 0);
                            localStorage.setItem("Itemcount"+id,0);
                            $.each(ctrl.products, function(index, element) {
                                element.count = 0;
                            });
                            localStorage.setItem("totalProd", 0);
                            localStorage.setItem("localityName", name);
                            window.location = "#/menu";
                            var tempTxt = localStorage.getItem('localityName');
                            if(tempTxt.length > 10) {
                                tempTxt = tempTxt.substring(0,8)+"...";
                            }
                            $("#locality-text").html(tempTxt);
                    } else {
                        if (confirm('Your cart will be emptied on changing the outlet...Do you want to continue ?')) {
                            localStorage.setItem("totalPrice", 0);
                            localStorage.setItem("totalItem", 0);
                            localStorage.setItem("totalProd", 0);
                            localStorage.setItem("Itemcount"+id,0);
                            $.each(ctrl.products, function(index, element) {
                                element.count = 0;
                            });
                            localStorage.setItem("localityName", name);
                            window.location = "#/menu";
                            var tempTxt = localStorage.getItem('localityName');
                            if(tempTxt.length > 10) {
                                tempTxt = tempTxt.substring(0,8)+"...";
                            }
                            $("#locality-text").html(tempTxt);
                         }   
                    }
                     
                } else {
                    
                    window.location = "#/menu";
                }                
            }
        }
            
        
    }
  });
 app.controller('ChangelocationController', function($location){
     this.setIndex = function() {
         localStorage.setItem("localityId", "");   
        }
});

$(document).ready(function() {
    var tempTxt = localStorage.getItem('localityName');
    var w= $(window).width();
    if(w > 400) {
        if(tempTxt.length > 10) {
            tempTxt = tempTxt.substring(0,8)+"...";
        }
    } else {
        if(tempTxt.length > 8) {
        tempTxt = tempTxt.substring(0,8)+"...";
        }
    }
    
    $("#locality-text").html(tempTxt);
});












