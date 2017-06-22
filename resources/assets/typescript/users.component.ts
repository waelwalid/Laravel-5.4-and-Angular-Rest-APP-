import { Component } from '@angular/core';
import { AppService} from './app.service' ;
import {Router} from "@angular/router";
@Component({
    selector: 'users',
    templateUrl: "/pages/usersComponent.html",
    providers : [AppService]
})
export class UsersComponent {

    hashToken:any;
    users : any ;

    constructor(private __AppService : AppService , private _router:Router){

        //let usersUrl = "/api/users" ;

        this.__AppService.authenticate().subscribe(
            data => {
                if(data.code == 200){
                    this.hashToken = "Bearer " +data.msg.token ;

                    this.__AppService.getUsers(this.hashToken).subscribe(

                            data => {
                                if(data.code == 200){
                                    this.users = data.msg.users;
                                    console.log(this.users);
                                }
                            },
                            err =>{
                                console.log("Error generating users");
                            }
                        );
                }
            },
            err =>{
                console.log("Error generating token");
            }
        );


    }

    goToLink(index:number){
        this._router.navigate(['ng/single/',index]);
    }

}
