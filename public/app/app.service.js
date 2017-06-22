System.register(['@angular/core', '@angular/http', 'rxjs/add/operator/map', 'rxjs/add/operator/catch'], function(exports_1, context_1) {
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
    var core_1, http_1;
    var AppService;
    return {
        setters:[
            function (core_1_1) {
                core_1 = core_1_1;
            },
            function (http_1_1) {
                http_1 = http_1_1;
            },
            function (_1) {},
            function (_2) {}],
        execute: function() {
            AppService = (function () {
                function AppService(_http) {
                    this._http = _http;
                    this.tokenParams = { email: "wael.walid91@gmail.com", password: '123456' };
                    this.users = "wael";
                }
                // Make Api Authorization (Get Token)
                AppService.prototype.authenticate = function () {
                    var headers = new http_1.Headers();
                    headers.append('Content-Type', 'application/json');
                    headers.append('Access-Control-Allow-Origin', '*');
                    return this._http.post('/api/token_auth', JSON.stringify(this.tokenParams), { headers: headers }).map(function (res) { return res.json(); });
                };
                AppService.prototype.creatAuthHeader = function (headers, token) {
                    headers.append('Content-Type', 'application/json');
                    headers.append('Access-Control-Allow-Origin', '*');
                    headers.append('Authorization', token);
                };
                AppService.prototype.getUsers = function (token) {
                    var headers = new http_1.Headers();
                    this.creatAuthHeader(headers, token);
                    return this._http.get('/api/users', { headers: headers }).map(function (res) { return res.json(); });
                };
                AppService.prototype.getUser = function (token, url) {
                    var headers = new http_1.Headers();
                    this.creatAuthHeader(headers, token);
                    return this._http.get(url, { headers: headers }).map(function (res) { return res.json(); });
                };
                AppService = __decorate([
                    core_1.Injectable(), 
                    __metadata('design:paramtypes', [http_1.Http])
                ], AppService);
                return AppService;
            }());
            exports_1("AppService", AppService);
        }
    }
});

//# sourceMappingURL=app.service.js.map
