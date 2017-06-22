import { Component } from '@angular/core';
import { AppService} from './app.service' ;
@Component({
    selector: 'my-app',
    templateUrl: "/pages/appComponent.html",
    providers : [AppService]
})
export class AppComponent {

    constructor(private __AppService : AppService){


    }

}
