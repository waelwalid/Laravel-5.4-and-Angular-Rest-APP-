System.register(["@angular/router", "./insteadOfLaravel.component", "./users.component", "./single.component"], function(exports_1, context_1) {
    "use strict";
    var __moduleName = context_1 && context_1.id;
    var router_1, insteadOfLaravel_component_1, users_component_1, single_component_1;
    var Route, routers;
    return {
        setters:[
            function (router_1_1) {
                router_1 = router_1_1;
            },
            function (insteadOfLaravel_component_1_1) {
                insteadOfLaravel_component_1 = insteadOfLaravel_component_1_1;
            },
            function (users_component_1_1) {
                users_component_1 = users_component_1_1;
            },
            function (single_component_1_1) {
                single_component_1 = single_component_1_1;
            }],
        execute: function() {
            Route = [
                {
                    path: "ng",
                    component: insteadOfLaravel_component_1.insteadOfLaravel
                },
                {
                    path: "ng/users",
                    component: users_component_1.UsersComponent
                },
                {
                    path: "ng/single/:id",
                    component: single_component_1.SingleComponent
                }
            ];
            exports_1("routers", routers = router_1.RouterModule.forRoot(Route));
        }
    }
});

//# sourceMappingURL=app.routing.js.map
