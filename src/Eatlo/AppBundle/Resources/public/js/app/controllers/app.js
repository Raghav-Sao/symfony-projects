app.controller("AboutusController", function($scope) {
    
});
app.controller("ContactusController", function($scope) {
    
});
app.controller("ServicesController", function($scope) {
    
});
app.controller("VendorRegistrationController", function($scope) {
    
});
app.controller("CareerController", function($scope) {
    
});
app.controller("MenuController", function($scope) {
    
});
app.controller("IndexController", function($scope) {
    
});
app.controller("PanelController",function($scope, $location) {
	this.isActive = function (viewLocation) { 
        return viewLocation === $location.path();
    };
});
var currentTab;
app.controller('ClickedController', function($location){
    ctrl = this;
    ctrl.allTypes = types;
    if (typeof(Storage) !== "undefined") {
            localStorage.setItem("total", 0);
    }
    if (typeof(Storage) !== "undefined") {
            localStorage.setItem("item", 0);
    }
    if (typeof(Storage) !== "undefined") {
            localStorage.setItem("prod", 0);
    }
    ctrl.total = 0;
    ctrl.item = 0;
    ctrl.prod = 0;
    ctrl.veg = 'veg';
    ctrl.non_veg = 'non_veg';   
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
                });
            },
            error: function() {
                alert('Some thing went Wrong. Please Try Again...');
            }
        });
    }
    this.incrCount = function(id) {
        $.each(ctrl.products, function(index, element) {
            if(element.id === id) {
                ctrl.item++;
                if (element.count === 0) {
                    ctrl.prod ++;
                }
                element.count++;
                ctrl.total += parseInt(element.price);
            }

        });      
    }
    this.descCount = function(id) {
        $.each(ctrl.products, function(index, element) {
            
            if(element.id === id) {
                element.count--;
                ctrl.total -= parseInt(element.price);
                ctrl.item--;
                if (element.count === 0) {
                    ctrl.prod --;
                }

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

 app.controller('OutletController', function(){
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
            localStorage.setItem("localityName", name);
        }
        $("#locality-text").html(localStorage.getItem('localityName'));
    }
  });

$(document).ready(function() {
    $("#locality-text").html(localStorage.getItem('localityName'));
});










