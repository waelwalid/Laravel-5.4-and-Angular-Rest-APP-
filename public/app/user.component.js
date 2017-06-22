System.register(["@angular/core", "@angular/router", './app.service'], function(exports_1, context_1) {
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
    var core_1, router_1, app_service_1;
    var UserComponent;
    return {
        setters:[
            function (core_1_1) {
                core_1 = core_1_1;
            },
            function (router_1_1) {
                router_1 = router_1_1;
            },
            function (app_service_1_1) {
                app_service_1 = app_service_1_1;
            }],
        execute: function() {
            /** include On init this what will start with in angular starting */
            UserComponent = (function () {
                function UserComponent(_route, __AppService) {
                    this._route = _route;
                    this.__AppService = __AppService;
                }
                UserComponent.prototype.ngOnInit = function () {
                    var _this = this;
                    this.id = this._route.snapshot.params['id'];
                    var userUrl = "/api/user/" + this.id;
                    this.__AppService.authenticate().subscribe(function (data) {
                        if (data.code == 200) {
                            _this.hashToken = "Bearer " + data.msg.token;
                            _this.__AppService.getUser(_this.hashToken, userUrl).subscribe(function (data) {
                                if (data.code == 200) {
                                    _this.user = data.msg.user;
                                    console.log("user data!!!");
                                    alert(data.msg.user);
                                }
                            }, function (err) {
                                console.log("Error generating users");
                            });
                        }
                    }, function (err) {
                        console.log("Error generating token");
                    });
                };
                UserComponent = __decorate([
                    core_1.Component({
                        selector: "singleUser",
                        templateUrl: "/pages/userComponent.html"
                    }), 
                    __metadata('design:paramtypes', [router_1.ActivatedRoute, app_service_1.AppService])
                ], UserComponent);
                return UserComponent;
            }());
            exports_1("UserComponent", UserComponent);
        }
    }
});

//# sourceMappingURL=user.component.js.map
