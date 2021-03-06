import {Component,OnInit} from "@angular/core";
import {ActivatedRoute} from "@angular/router";
import { AppService} from './app.service' ;

/** include On init this what will start with in angular starting */


@Component({
    selector:"singleUser",
    templateUrl:"/pages/userComponent.html"
})

export class UserComponent{
    id:number ;
    user:any;
    hashToken:any;

    constructor(private _route:ActivatedRoute ,private __AppService : AppService){


    }

    ngOnInit(){

        this.id = this._route.snapshot.params['id'] ;

        let userUrl = "/api/user/"+this.id ;

        this.__AppService.authenticate().subscribe(
            data => {
                if(data.code == 200){
                    this.hashToken = "Bearer " +data.msg.token ;

                    this.__AppService.getUser(this.hashToken , userUrl).subscribe(

                        data => {
                            if(data.code == 200){
                                this.user = data.msg.user;
                                console.log("user data!!!");
                                alert(data.msg.user);
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

}