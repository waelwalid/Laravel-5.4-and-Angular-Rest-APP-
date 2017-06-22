System.register(['@angular/core', './app.service', "@angular/router"], function(exports_1, context_1) {
    "use strict";
    var __moduleName = context_1 && context_1.id;
    var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
        var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
        if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
        else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
        return c > 3 && r && Object.defineProperty(target, key, r), r;
    };
    var __metadata = (this && this.__metadata) || function (k, v) {
        if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
    };
    var core_1, app_service_1, router_1;
    var UsersComponent;
    return {
        setters:[
            function (core_1_1) {
                core_1 = core_1_1;
            },
            function (app_service_1_1) {
                app_service_1 = app_service_1_1;
            },
            function (router_1_1) {
                router_1 = router_1_1;
            }],
        execute: function() {
            UsersComponent = (function () {
                function UsersComponent(__AppService, _router) {
                    //let usersUrl = "/api/users" ;
                    var _this = this;
                    this.__AppService = __AppService;
                    this._router = _router;
                    this.__AppService.authenticate().subscribe(function (data) {
                        if (data.code == 200) {
                            _this.hashToken = "Bearer " + data.msg.token;
                            _this.__AppService.getUsers(_this.hashToken).subscribe(function (data) {
                                if (data.code == 200) {
                                    _this.users = data.msg.users;
                                    console.log(_this.users);
                                }
                            }, function (err) {
                                console.log("Error generating users");
                            });
                        }
                    }, function (err) {
                        console.log("Error generating token");
                    });
                }
                UsersComponent.prototype.goToLink = function (index) {
                    this._router.navigate(['ng/single/', index]);
                };
                UsersComponent = __decorate([
                    core_1.Component({
                        selector: 'users',
                        templateUrl: "/pages/usersComponent.html",
                        providers: [app_service_1.AppService]
                    }), 
                    __metadata('design:paramtypes', [app_service_1.AppService, router_1.Router])
                ], UsersComponent);
                return UsersComponent;
            }());
            exports_1("UsersComponent", UsersComponent);
        }
    }
});

//# sourceMappingURL=users.component.js.map
