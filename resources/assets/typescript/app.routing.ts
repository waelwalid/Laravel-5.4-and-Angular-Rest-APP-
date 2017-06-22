import {ModuleWithProviders} from "@angular/core";
import {Routes,RouterModule} from "@angular/router";
import {insteadOfLaravel} from "./insteadOfLaravel.component";
import {UsersComponent} from "./users.component";
import {SingleComponent} from "./single.component";
import {AppComponent} from "./app.component";



const Route : Routes = [

    {
      path: "ng",
        component: insteadOfLaravel
    },
    {
        path: "ng/users",
        component : UsersComponent
    },
    {
        path:"ng/single/:id",
        component: SingleComponent
    }

];

export const routers : ModuleWithProviders = RouterModule.forRoot(Route);