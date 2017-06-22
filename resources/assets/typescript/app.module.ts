///<reference path="../../../typings/index.d.ts"/>

import { NgModule }      from '@angular/core';
import { HttpModule }      from '@angular/http';
import { BrowserModule } from '@angular/platform-browser';
import { AppComponent }   from './app.component';
import { UsersComponent }   from './users.component';
import {SingleComponent} from "./single.component";
import {insteadOfLaravel} from "./insteadOfLaravel.component";

import {routers} from "./app.routing";


@NgModule({
    imports:      [
        BrowserModule ,
        HttpModule ,
        routers
    ]
    ,
    declarations: [ AppComponent , UsersComponent , insteadOfLaravel , SingleComponent],
    bootstrap:    [ AppComponent ]
})
export class AppModule { }